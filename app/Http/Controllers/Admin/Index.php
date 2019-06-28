<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Request;

use App\Http\Controllers\Controller;

use App\Http\Model\Goods;


class Index extends Controller
{
	/**
	 * 后台管理首页界面
	 */
    public function index()
    {
    	return view('admin/index');
    }

    /**
     * 商品管理
     */
    public function goodsCreate()
    {
    	return view('admin/goodsCreate');
    }

    /**
     * 商品入库
     */
    public function goodsSave(Request $request)
    {
    	$data=Request::except('_token','goods_pic');
        $data['add_time']=time();
        $file=Request::file('goods_pic')->store('uploads/goods');
        $path='storage/'.$file;
        $data['goods_pic']=$path;
    	$res=Goods::insert([
            'goods_name' => $data['goods_name'],
            'goods_price' => $data['goods_price'],
            'goods_pic' => $data['goods_pic'],
            'add_time' => $data['add_time']
        ]);
        if ($res) {
            return redirect('admin/index/goodsList');
        }else{
            return redirect('admin/index/goodsCreate');
        }
    } 

    /**
     * 商品列表
     */
    public function goodsList()
    {
        $data=Goods::where('is_delete',1)->paginate(6);
        return view('admin/goodsList',['data'=>$data]);
    }

    /**
     * 商品删除
     */
    public function goodsDel()
    {
        $id = Request::get('id');
        $res = Goods::where('id',$id)->update(['is_delete'=>0]);
        if ($res ) {
            return redirect('admin/index/goodsList');
        }else{
            return redirect('admin/index/goodsList');
        }
    }

    /**
     * 商品修改视图
     */
    public function goodsUpd()
    {
        $id=Request::get('id');
        $data=Goods::where('id',$id)->first();
        return view('admin/goodsUpd',['data'=>$data]);
    }

    /**
     * 商品修改执行
     */
    public function goodsUpd_do()
    {
        $data = Request::except('_token');
        $res = Goods::where('id',$data['id'])->update($data);
        if ($res ) {
            return redirect('admin/index/goodsList');
        }else{
            return redirect('admin/index/goodsUpd');
        }
    }





}

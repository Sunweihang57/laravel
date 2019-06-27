<?php

namespace App\Http\Controllers\Index;


use Illuminate\Support\Facades\Request;

use App\Http\Controllers\Controller;

use App\Http\Model\Goods;


class Index extends Controller
{
    /**
     * 前台首页
     */
    public function index()
    {
    	$data = Goods::where('is_delete', 1)->orderBy('add_time', 'desc')->paginate(4);
    	$info = $this->handle_double($data);
    	// dd($info);
    	
    	return view('index/index', ['goods' => $info]);
    }

    /**
     * 商品二次循环
     */
    protected function handle_double($info,$cart_goods_arr=[]){
        $i = 0;
        $j = 1;
        $tmp = [];
        $key = 0;
        foreach($info as $k=>$v){
            if(in_array($v['id'],$cart_goods_arr)){
                $info[$k]['in_cart'] = 1;
            }else{
                $info[$k]['in_cart'] = 0;
            }
        }
        foreach($info as $k=>$v){
            if($i <= $j){
                $tmp[$key][] = $v;
            }
            if($i >= $j){
                $i = 0;
                $key ++;
            }else{
                $i++;
            }
        }
        return $tmp;
    }



}

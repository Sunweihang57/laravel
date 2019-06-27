<?php

namespace App\Http\Controllers\Index;


use Illuminate\Support\Facades\Request;

use App\Http\Controllers\Controller;

use App\Http\Model\Goods;

use App\Http\Model\User;

use App\Http\Model\Cart as CartModel;

use DB;

class Cart extends Controller
{
    /**
     * 添加购物车
     */
    public function create()
    {
    	$id = Request::get('id');
    	$data = Goods::where('id', $id)->first()->toarray();
    	$u_id = User::where('name', session('user_name'))->first();
    	$data['u_id'] = $u_id['id'];
    	$data['add_time'] = time();
    	$data['goods_id'] = $data['id'];
    	unset($data['is_delete']);
    	unset($data['id']);
    	// dd($data);
    	$res=CartModel::insert($data);
    	if ($res) {
    		return redirect('index/cart/list');
    	}else{
    		echo "添加失败";
    	}
    }

    /**
     * 购物车列表
     */
    public function list()
    {
    	$data = DB::connection('nginx')
    	->table('cart')
    	->join('goods', 'cart.goods_id', '=', 'goods.id')
    	->select('cart.*', 'goods.goods_name')
    	->where('status', 1)
    	->get()
    	->toarray();
    	$total = 0;
    	foreach ($data as $k => $v) {
    		$total += $v->goods_price;
    	}

    	// dd($total);
    	return view('index/cart', ['info' => $data, 'total' => $total]);
    }

    /**
     * 删除购物车
     */
    public function delete()
    {
    	$id = Request::get('id');
    	$res = CartModel::where('id',$id)->update(['status' => 0]);
    	// dd($res);
    	if ($res) {
    		return redirect('index/cart/list');
    	}else{
    		echo "删除失败";
    	}
    }

}

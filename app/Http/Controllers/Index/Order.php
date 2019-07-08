<?php

namespace App\Http\Controllers\Index;


use Illuminate\Support\Facades\Request;

use App\Http\Controllers\Controller;

use App\Http\Model\Order as OrderModel;

use App\Http\Model\User;

use App\Http\Model\Cart;

use DB;

class Order extends Controller
{
    /**
     * 确认结算
     */
    public function order()
    {
    	$money = Request::get('money');
    	DB::connection('nginx')->beginTransaction();//开启事务
    	$cart_info = Cart::where(['u_id'=>session('user_id')])->where('status', 1)->get();
    	if(empty($cart_info)){
            echo "购物车为空！";
            die();
        }
    	$user = User::where('name', session('user_name'))->first();
    	$userId = $user['id'];
    	$oid = time().mt_rand(1000,1111);
    	$data['oid'] = $oid;
    	$data['uid'] = $userId;
    	$data['pay_money'] = $money;
    	$data['add_time'] = time();
    	$data['pay_time'] =  strtotime('+10minute');
    	$res = OrderModel::insert($data);
    	//存储订单详情表
    	$order_detali_result = true;
        foreach($cart_info->toArray() as $v){
            $detail_result = DB::table('order_detail')->insert([
                'oid' => $oid,
                'goods_id' => $v['goods_id'],
                'goods_name' => $v['goods_name'],
                'goods_pic' => $v['goods_pic'],
                'goods_price' => $v['goods_price'],
                'add_time'=>time()
            ]);
            if(!$detail_result){
                $order_detali_result = false;
                break;
            }
        }

        if(!$order_detali_result || !$res){
             DB::connection('nginx')->rollBack();
            die('操作失败!');
        }

        DB::connection('nginx')->commit();
		Cart::where('status', 1)->update(['status' => 2]);
		$orderDetail = DB::table('order_detail')->where('oid',$oid)->get()->toarray();
        // dd($orderDetail[0]->goods_name);
    	return view('index/details',['oid' => $oid, 'detail' => $orderDetail, 'money' => $money]);
    }

    /**
     * 订单详情
     */
    public function details()
    {
    	echo "这里是商品详情页";
    }


    /**
     * 异步支付接口
     */
    public function notify_url()
    {
    	echo "异步通知接口";
    }

    /**
     * 同步支付接口
     */
    public function return_url()
    {
    	echo "同步通知接口";
    }



}

<?php

namespace App\Http\Controllers\Index;


use Illuminate\Support\Facades\Request;

use App\Http\Controllers\Controller;

use App\Http\Model\Goods as GoodsModel;


class Goods extends Controller
{
    /**
     * 商品详情
     */
    public function product()
    {
    	$id = Request::get('id');
    	$data = GoodsModel::where('is_delete', 1)->where('id', $id)->first();

    	return view('index/product',['info'=>$data]);
    }



}

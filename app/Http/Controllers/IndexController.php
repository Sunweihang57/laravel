<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

class IndexController extends Controller
{
	/**商品展示*/
    public function index()
    {

    	return view('index');
    }

    /**
     * 文件上传
     */
    public function file()
    {
        $info=Request::all();
    	$data=Request::file('file')->store('uploads');
    	$info=asset('storage/'.$data);
    	dd($info);
    }

    /**模板继承*/
    public function layout()
    {
    	$str='<script>alrt(666)</script>';
    	return view('layout',$str);
    }

}

<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Request;

use App\Http\Controllers\Controller;

use DB;

use App\Http\Model\User;


class Login extends Controller
{
    //用户登录
    public function login()
    {
    	return view('admin/login');
    }

    /**用户登录执行*/
    public function login_do()
    { 
    	$data=Request::all();
        // DB::connection('nginx')->enableQueryLog();
    	$info=User::where(['name'=>$data['name'],'password'=>$data['password']])->first();
        // $log = DB::connection('nginx')->getQueryLog();
    	if (!empty($info)) {
    		Request::session()->put('user',$data['name']);
    		session(['user_name'=>$data['name']]);
    		return redirect('admin/index/index');
    	}else{
    		echo "用户不存在";
    	}
    }

    /**用户退出*/
    public function logout()
    {
        Request::session()->flush();
    	return redirect('admin/login/login');
    }


}

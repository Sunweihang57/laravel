<?php

namespace App\Http\Controllers\Index;


use Illuminate\Support\Facades\Request;

use App\Http\Controllers\Controller;

use App\Http\Model\User;

class Login extends Controller
{
    /**
     * 用户注册
     */
    public function register()
    {
    	return view('index/register');
    }

    /**
     * 用户入库
     */
    public function save()
    {
    	$data = Request::except('_token');
    	$data['reg_time'] = time();
    	$res = User::insert($data);
    	if ($res) {
            $id = User::insertGetId($data);
            session(['user_name' => $data['name']]);
    		session(['user_id' => $id]);
    		return redirect('index/index/index');
    	}else{
    		return redirect('index/index/register');
    	}

    }

    /**
     * 用户登录
     */
    public function login()
    {
    	return view('index/login');
    }

    /**
     * 用户登录验证
     */
    public function login_do()
    {
    	$data = Request::except('_token');
    	$where=[
    		'name' => $data['name'],
    		'password' => $data['password']
    	];
    	$res = User::where($where)->first();
    	if ($res) {
    		session(['user_name' => $data['name']]);
            session(['user_id' => $res['id']]);
    		return redirect('index/index/index');
    	}else{
    		return redirect('index/login/login');
    	}

    }

    /**
     * 用户登出
     */
    public function logout()
    {
        Request::session()->forget('user_name');
    	Request::session()->forget('user_id');
    	return redirect('index/index/index');
    }


    /**
     * 用户检测专用
     */
    public function session()
    {
    	dd(session('user_name'));
    }





}

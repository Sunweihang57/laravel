<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Http\Model\User;
use DB;

class LoginController extends Controller
{
	// 用户登录
    public function login()
    {
    	return view('login');
    }

    /**用户登录执行*/
    public function login_do()
    { 
    	$data=Request::all();
        // DB::connection('nginx')->enableQueryLog();
    	$info=DB::connection('nginx')->table('user')->where(['name'=>$data['name'],'password'=>$data['password']])->first();
        // $log = DB::connection('nginx')->getQueryLog();
        // dd($log);
    	if (!empty($info)) {
    		Request::session()->put('user',$data['name']);
    		return redirect('/index');
    	}else{
    		echo "用户不存在";
    	}
    	// $user=session('user');
    	// dump($user);
    }

    /**用户退出*/
    public function logout()
    {
        Request::session()->flush();
    	return redirect('/login');
    }

    /**用户注册*/
    public function register()
    {
        return view('register');
    }

    /**用户注册执行*/
    public function register_do()
    {
        $data=Request::except('_token');
        if ($data['password']==$data['confirm_password']) {
            $info=[
                'name'=>$data['name'],
                'password'=>$data['password'],
                'reg_time'=>time(),
            ];
            $res=DB::table('user')->insert($info);
            if (!empty($res)) {
                return redirect('/login');
            }else{
                echo "注册失败";
            }
        }else{
            echo "密码不一致";
        }
        // dd($data);
    }

}

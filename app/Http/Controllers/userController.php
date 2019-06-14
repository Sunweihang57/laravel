<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use DB;
use App\Http\Tools\Tools;

class userController extends Controller
{
	public $tools;

	/**构造函数加载redis连接*/
	public function __construct(Tools $tools)
	{
		$this->tools=$tools;
	}

	/**学生表注册页面*/
    public function index()
    {
    	return view('register');
    }

    /**学生信息保存*/
    public function save()
    {
    	$data=Requset::except('_token','s_id');
    	// dd($data);die;
    	$res=DB::table('student')->insert($data);
    	if (!empty($res)) {
    		return redirect('/list');
    	}else{
    		return redirect('/user');
    	}
    }

    /**列表展示*/
    public function list()
    {
    	//启用redis
    	$redis=$this->tools->getRedis();
    	$redis->incr('num');

    	$search=Request::all();
    	// dd($search);die;
    	$search=implode('', $search);
    	// 分页和信息展示
    	if (isset($search)) {
    		// echo "有值";
    		$student_pege=DB::table('student')->where('s_name','like','%'.$search.'%')->paginate(2);
    	}else{
    		// echo "没有值";
    		$student_pege=DB::table('student')->paginate(2);
    	};

    	return view('list',['student_pege'=>$student_pege,'find_name'=>$search]);
    }

    /**搜索后分页*/
    // public function search()
    // {
    // 	$data=Request::all();
    // 	dd($data);
    // }

    /**修改视图页面*/
    public function update()
    {
    	$id=Request::all();
    	$data=DB::table('student')->where(['s_id'=>$id])->first();
    	// dd($data);die;
    	return view('update',['data'=>$data]);
    }

    /**修改执行方法*/
    public function update_do()
    {
    	$data=Request::except('_token');
    	// dd($data);
    	$res=DB::table('student')->where(['s_id'=>$data['s_id']])->update($data);
    	if (!empty($res)) {
    		return redirect('/list');
    	}else{
    		echo "修改失败";
    	}
    }

    /**删除*/
    public function del()
    {
    	$id=Request::all();
    	$res=DB::table('student')->where(['s_id'=>$id])->delete();
    	if (!empty($res)) {
    		return redirect('/list');
    	}else{
    		echo "删除失败";
    	}
    }


    /**浏览次数记录*/
    public function redis()
    {
    	$redis=$this->tools->getRedis();
    	echo '列表展示页面已经浏览'.$redis->get('num').'次';
    }

}

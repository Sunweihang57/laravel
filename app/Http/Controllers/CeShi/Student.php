<?php

namespace App\Http\Controllers\CeShi;


use Illuminate\Support\Facades\Request;

use App\Http\Controllers\Controller;

use DB;


class Student extends Controller
{
    /**
     * 学生注册
     */
    public function create()
    {
    	return view('ceshi/create');
    }

    /**
     * 学生信息入库
     */
    public function save()
    {
    	$data = Request::except('_token');
    	$res = DB::table('sudent')->insert($data);
    	if ($res) {
    		return redirect('ceshi/student/index');
    	}else{
    		return redirect('ceshi/student/create');
    	}
    }

    /**
     * 学生列表
     */
    public function index()
    {
    	$seach=Request::get('seach');
    	if ($seach) {
    		$data=DB::table('sudent')->where('s_name','like','%'.$seach.'%')->paginate(2);
    	}else{
    		$data=DB::table('sudent')->paginate(2);
    	}
    	
    	return view('ceshi/index',['data'=>$data,'seach'=>$seach]);
    }

    /**
     * 学生信息删除
     */
    public function delete()
    {
    	$id=Request::get('id');
    	$res=DB::table('sudent')->where('s_id',$id)->delete();
    	if ($res) {
    		return redirect('ceshi/student/index');
    	}else{
    		echo "删除失败";
    	}
    }

    /**
     * 学生信息修改视图
     */
    public function update()
    {
    	$id=Request::get('id');
    	$data=DB::table('sudent')->where('s_id',$id)->first();
    	return view('ceshi/update',['data'=>$data]);
    }

    /**
     * 修改执行
     */
    public function upd_do()
    {
    	$data=Request::except('_token');
    	$res=DB::table('sudent')->where('s_id',$data['s_id'])->update($data);
    	if ($res) {
    		return redirect('ceshi/student/index');
    	}else{
    		echo "修改失败";
    	}
    }

}

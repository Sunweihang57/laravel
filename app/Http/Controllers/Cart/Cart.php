<?php

namespace App\Http\Controllers\Cart;


use Illuminate\Support\Facades\Request;

use DB;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redis;

class Cart extends Controller
{
    public function index()
    {

    	return view('cart/index');
    }

    public function login()
    {
    	return view('cart/login');
    }

    public function loginDo()
    {
    	$data = Request::all();
    	$res =  DB::table('cartU')
        ->where('c_user',$data['c_user'])
        ->where('c_pwd',$data['c_pwd'])
        ->first();
        // dd($res);
        if ($res) {
            session(['user' => $data['c_user']]);
            return redirect('cart');
        }else{
            return redirect('login');
        }
    }

    public function mwcreate()
    {
        return view('cart/mwcreate');
    }

    public function mwDo()
    {
        $data=Request::all();
        $res= DB::table('menwei')->insert(['m_user'=>$data['m_user']]);
        if ($res) {
            return redirect('cindex');
        }else{
            echo "添加失败";
        }
    }

    public function cartInfo()
    {
        return view('cart/cartInfo');
    }

    public function cartInfoDo()
    {
        $res=DB::table('chewei')->insert(['add_time'=>time()]);
        if ($res) {
            return redirect('list');
        }else{
            echo "添加失败";
        }
    }

    public function list()
    {
        $data=DB::table('chewei')->get();
        $money=0;
        foreach ($data as $k => $v) {
            $money+=$v->money;
        }
        // dd($data);
        return view('cart/list',['data'=>$data,'money'=>$money]);
    }

    public function cindex()
    {
        $num=DB::table('chewei')->count();
        $knum=DB::table('chewei')->where('state',0)->count();
        return view('cart.cindex',['num'=>$num,'knum'=>$knum]);
    }

    public function come()
    {
        // Redis::set('num',1);
        return view('cart.come');
    }

    public function comeDo()
    {
        $data= Request::all();
        $cnum=DB::table('chewei')->where('state',0)->first();
        $id=$cnum->id;
        DB::table('chewei')
        ->where('id',$id)
        ->update([
            'state' => 1,
            'come_time' => time(),
            'c_num' => $data['c_num'],
        ]);
        if ($id) {
            return redirect('cindex');
        }else{
            echo "进入失败";
        }
    }

    public function go()
    {
        return view('cart.go');
    }

    public function goDo()
    {
        $data= Request::all();
        $come=DB::table('chewei')->where('c_num',$data['c_num'])->first();
        if (!$come) {
            echo "车牌号有误";die;
        }
        $come_time=$come->come_time;
        $yongshi=time()-$come_time;
        $shi= ($yongshi+100000)/1000/60/60;
        $fen= ($yongshi+100000)/1000/60;
        // dd($fen);
        if ($fen<15) {
            $money=0;
        }else if ($fen>15 && $shi<6) {
            $money= $shi*4;
        }else if ($shi>6) {
            $g=$shi-6;
            $money= $g*2+6; 
        }


        $res= DB::table('chewei')->where('c_num',$data['c_num'])->update([
            'state'=>0,
            'go_time'=>time(),
            'money'=>$money,
        ]);
        if ($res) {
             DB::table('chewei')->where('c_num',$data['c_num'])->update(['c_num'=>0]);
            return view('cart.info',['shi'=>$shi,'fen'=>$fen,'c_num'=>$come->c_num,'money'=>$money]);
        }else{
            echo "车牌号有误";
        }
    }
}

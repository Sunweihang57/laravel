<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BasicController;
use App\Http\Model\Cart;
use App\Http\Model\Order;
use App\Http\Model\OrderDetail;
use DB;

class AliPayController 
{
    public $cart_table; 
    public $order_table;
    public $order_detail_table;
    public $app_id;
    public $gate_way;
    public $notify_url;
    public $return_url;
    public $rsaPrivateKeyFilePath = '';  //路径
    public $aliPubKey = '';  //路径
    public $privateKey = 'MIIEpAIBAAKCAQEAw04hTozaaxPVRc+UuiQyNs3VV00Ow6uwcWZEIUtarhBWmSABLMABDsUP/Ou5vJCJfGtgO1zymzORZfrVpXLXVLFpb293dBPVJtosB438pxC8e/oXz6yZikW1+SYJZpTjygWYN0tRqnb9FrdjAJwlr52x/Z1fpsP9anPIkhCDqNlPNXdyVedVQEJqZEbgq4nF3KJdzFYMXVihxoB2Si1lPmSLNR41R26I5xIrDPjej0TM9u+2iZ310PDdd8U02hMcjJw1fKflvI0KouXd+hNhTUljR7BKGkkWbNyVgVof4qjoE1OlvXWSwCDqEZRg7x+jTLl3N+UKzrT2EXFe0TxLsQIDAQABAoIBAQCcwspzHRV3mty1gw9SdRkk6gPSZdRy9AzUiIwo2S34xr5re8fVnmt66muRy7cyhiUEi78bBtjn//U1kKcJfGsf3KLPQf30WrLc04NBsRLZGdLgA/Y2x8gZtyh/yasD/n/zuJfb0gXDuGweXqYFaE/LbNzfvwB2f5uZZUPZEY5L6HDuthoc4Aq9RCHJKsQCRVyUlaeiDKX7oSItQU42mA9t31SsKEiVS8PU7UZRJb9CE8JMobTX6oJXUmFHRN7Jz0+0cTxcw8IMHLbFoZ7DCy/Y5CpDdKvnJsw/c57b5hUS+iauaUcPr2FRn6dJYKys62XdDHH0oZoOoOrgngMVyGTRAoGBAPFWQoEazaxCleb7Q2uLhF5XCxdcs4HWaZ4+Vgkc/+st7Ne10MHeMIANWIoggQJT+wImXYehiv9ipde/Rog1vMuHt380c5Y7mga+/6CsUO1b7XYr2qVcZU4fdqJkGdExG+WaceSXUV2u3z275Ypt9sTtZSKH8KSHlc3k9TPm1NNtAoGBAM8r5StN+2f02yyn7oA7B3fzrtafHM49fZaAqzNOxo6T2n8IUXZSynJCM6EYyxPw31Fo2Sayxxrh/7QJKd9zhPcyWl5y6dUWvGg73eziVWRYR15msYz+T5xV+8/BbXwM5YfaudTEQGtQ29vMhY3NwWAsXUuOoA1pbANrFJApiqrVAoGAKkkd7/cdUHB+SXF/F6njcJA5zkcc4MQLz4FGm+Qr5y4t0IH36PAgeV9dQx583EaQtYi5XJlufF7xhgLqvdUElnjaKvyqwAkDbOksax+mMmCoE8uNTOoKigyzQbLeXywGok1UZWQqCosobG2uw3mPAmRCEzHUdU+YbPIQEJ8CbWUCgYEAg8wcHiGdSDRo3w7y1xc2mCQp3ZYaAEb0R7QRtjFudjQvs9M55/mhm3DsYZdhUo1RtPvr8geYTUzrnMCbp/FY7N5WyXF3uz2cnP9BHzuaMZ1Lwg249MaxJPc6nKAko9+cgoIu6OH1TZCCXmHNsTntxN5UeAYDYqTnt4D+8vvKoQUCgYBh0OTzXot7E5hHyLjhwDFuDjdeABWfb6Ix5pKOSPzy9XOJEc2jvBO9qFX+baW2igwrUt+JFfi5uvxaPHX8x+vBsS4QmOpbvCz07d6qQJtGhVE5KwPum5RRgmY7FPgOfAivAQA9louuegIrARLqAtnHehMqejvK6IN6dX9L79k1Fw==';
    public $publicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAw04hTozaaxPVRc+UuiQyNs3VV00Ow6uwcWZEIUtarhBWmSABLMABDsUP/Ou5vJCJfGtgO1zymzORZfrVpXLXVLFpb293dBPVJtosB438pxC8e/oXz6yZikW1+SYJZpTjygWYN0tRqnb9FrdjAJwlr52x/Z1fpsP9anPIkhCDqNlPNXdyVedVQEJqZEbgq4nF3KJdzFYMXVihxoB2Si1lPmSLNR41R26I5xIrDPjej0TM9u+2iZ310PDdd8U02hMcjJw1fKflvI0KouXd+hNhTUljR7BKGkkWbNyVgVof4qjoE1OlvXWSwCDqEZRg7x+jTLl3N+UKzrT2EXFe0TxLsQIDAQAB';

    public function __construct(Cart $cart,Order $order,OrderDetail $orderDetail)
    {
        $this->cart_table = $cart;
        $this->order_table = $order;
        $this->order_detail_table = $orderDetail;
        $this->app_id = '2016092900624994';
        $this->gate_way = 'https://openapi.alipaydev.com/gateway.do';
        $this->notify_url = env('APP_URL').'/notify_url';
        $this->return_url = env('APP_URL').'/return_url';
    }

    /**
     * 确认订单
     * [confirm_pay description]
     * @return [type] [description]
     */
    // public function confirm_pay(){
        
    //     $cart_info = $->cart_table->where(['uid'=>session('user_id')])->get();
    //     $total = 0;
    //     foreach($cart_info->toArray() as $v){
    //         $total += $v['goods_price'];
    //     }
    //     return view('home.confirm_pay',['cart_info'=>$cart_info,'total'=>$total]);
    // }

    /*
     * 根据订单号支付订单
     */
    public function pay_order(Request $request){
        $req = $request->all();
        if(empty($req['oid'])){
            echo "参数错误!";
            die();
        }
        $this->ali_pay($req['oid']);
    }
    
    
    /**
     * 订单支付
     * @param $oid
     */
    public function pay()
    {
        //生成订单信息
        //货物信息
        DB::connection('mysql_shop')->beginTransaction(); //开启事务
        $cart_info = $this->cart_table->where(['uid'=>session('user_id')])->get();
        if(empty($cart_info)){
            echo "购物车为空！";
            die();
        }
        $total = 0;
        foreach($cart_info->toArray() as $v){
            $total += $v['goods_price'];
        }
        $oid = time().mt_rand(1000,1111);  //订单编号
        $order_result = $this->order_table->insert([
            'oid'=>$oid,
            'uid'=>session('user_id'),
            'pay_money'=>$total,
            'add_time'=>time()
        ]);
        $order_detali_result = true;
        foreach($cart_info->toArray() as $v){
            $detail_result = $this->order_detail_table->insert([
                'oid'=>$oid,
                'goods_id'=>$v['goods_id'],
                'goods_name'=>$v['goods_name'],
                'goods_pic'=>$v['goods_pic'],
                'add_time'=>time()
            ]);
            if(!$detail_result){
                $order_detali_result = false;
                break;
            }
        }

        if(!$order_detali_result || !$order_result){
             DB::connection('mysql_shop')->rollBack();
            die('操作失败!');
        }

        DB::connection('mysql_shop')->commit();
        $this->ali_pay($oid);
    	
    }

    public function rsaSign($params) {
        return $this->sign($this->getSignContent($params));
    }

    protected function sign($data) {
    	if($this->checkEmpty($this->rsaPrivateKeyFilePath)){
    		$priKey=$this->privateKey;
			$res = "-----BEGIN RSA PRIVATE KEY-----\n" .
				wordwrap($priKey, 64, "\n", true) .
				"\n-----END RSA PRIVATE KEY-----";
    	}else{
    		$priKey = file_get_contents($this->rsaPrivateKeyFilePath);
            $res = openssl_get_privatekey($priKey);
    	}
        
        ($res) or die('您使用的私钥格式错误，请检查RSA私钥配置');
        openssl_sign($data, $sign, $res, OPENSSL_ALGO_SHA256);
        if(!$this->checkEmpty($this->rsaPrivateKeyFilePath)){
            openssl_free_key($res);
        }
        $sign = base64_encode($sign);
        return $sign;
    }

    public function getSignContent($params) {
        ksort($params);
        $stringToBeSigned = "";
        $i = 0;
        foreach ($params as $k => $v) {
            if (false === $this->checkEmpty($v) && "@" != substr($v, 0, 1)) {
                // 转换成目标字符集
                $v = $this->characet($v, 'UTF-8');
                if ($i == 0) {
                    $stringToBeSigned .= "$k" . "=" . "$v";
                } else {
                    $stringToBeSigned .= "&" . "$k" . "=" . "$v";
                }
                $i++;
            }
        }
        unset ($k, $v);
        return $stringToBeSigned;
    }

    /**
     * 根据订单号支付
     * [ali_pay description]
     * @param  [type] $oid [description]
     * @return [type]      [description]
     */
    public function ali_pay(){
        $oid = request()->get('oid');
        // dd($oid);
        $order = $this->order_table->where(['oid'=>$oid,'state'=>1])->select(['pay_money'])->first();
        if(empty($order)){
            echo "订单不存在!";
            die();
        }
        $order_info = $order->toArray();
        //业务参数
        $bizcont = [
            'subject'           => 'Lening-Order: ' .$oid,
            'out_trade_no'      => $oid,
            'total_amount'      => $order_info['pay_money'],
            'product_code'      => 'FAST_INSTANT_TRADE_PAY',
        ];
        //公共参数
        $data = [
            'app_id'   => $this->app_id,
            'method'   => 'alipay.trade.page.pay',
            'format'   => 'JSON',
            'charset'   => 'utf-8',
            'sign_type'   => 'RSA2',
            'timestamp'   => date('Y-m-d H:i:s'),
            'version'   => '1.0',
            'notify_url'   => $this->notify_url,        //异步通知地址
            'return_url'   => $this->return_url,        // 同步通知地址
            'biz_content'   => json_encode($bizcont),
        ];
        //签名
        $sign = $this->rsaSign($data);
        $data['sign'] = $sign;
        $param_str = '?';
        foreach($data as $k=>$v){
            $param_str .= $k.'='.urlencode($v) . '&';
        }
        $url = rtrim($param_str,'&');
        $url = $this->gate_way . $url;
        
        header("Location:".$url);
    }

    protected function checkEmpty($value) {
        if (!isset($value))
            return true;
        if ($value === null)
            return true;
        if (trim($value) === "")
            return true;
        return false;
    }

    /**
     * 转换字符集编码
     * @param $data
     * @param $targetCharset
     * @return string
     */
    function characet($data, $targetCharset) {
        if (!empty($data)) {
            $fileType = 'UTF-8';
            if (strcasecmp($fileType, $targetCharset) != 0) {
                $data = mb_convert_encoding($data, $targetCharset, $fileType);
            }
        }
        return $data;
    }

    /**
     * 支付宝同步通知回调
     */
    public function aliReturn()
    {
        header('Refresh:2;url=/');
        echo "<h2>订单： ".$_GET['out_trade_no'] . ' 支付成功，正在跳转</h2>';
    }

    /**
     * 支付宝异步通知
     */
    public function aliNotify()
    {
        $data = json_encode($_POST);
        $log_str = '>>>> '.date('Y-m-d H:i:s') . $data . "<<<<\n\n";
        //记录日志
        file_put_contents(storage_path('logs/alipay.log'),$log_str,FILE_APPEND);
        //验签
        $res = $this->verify($_POST);
        $log_str = '>>>> ' . date('Y-m-d H:i:s');
        if($res){
            //记录日志 验签失败
            $log_str .= " Sign Failed!<<<<< \n\n";
            file_put_contents(storage_path('logs/alipay.log'),$log_str,FILE_APPEND);
        }else{
            $log_str .= " Sign OK!<<<<< \n\n";
            file_put_contents(storage_path('logs/alipay.log'),$log_str,FILE_APPEND);
            //验证订单交易状态
            if($_POST['trade_status']=='TRADE_SUCCESS'){
                DB::connection('mysql_shop')->beginTransaction(); //开启事务
                //更新订单状态
                $oid = $_POST['out_trade_no'];     //商户订单号
                $info = [
                    'pay_time'      => strtotime($_POST['gmt_payment']), //支付时间
                    'state'         => 2
                ];
                $order_result = $this->order_table->where(['oid'=>$oid])->update($info);
                
                //清理购物车
                $order_detail_info = $this->order_detail_table->where(['oid'=>$oid])->select(['goods_id'])->get()->toArray();
                $goods_list = [];
                foreach($order_detail_info as $v){
                    $goods_list[] = $v['goods_id'];
                }
                $cart_result = $this->cart_table->whereIn('goods_id',$goods_list)->delete();
                
                if($cart_result && $order_result){
                    DB::connection('mysql_shop')->commit();
                }else{
                    file_put_contents(storage_path('logs/alipay.log'),'订单：'.$oid."；支付失败",FILE_APPEND);
                    DB::connection('mysql_shop')->rollBack();
                }
            }
        }
        
        echo 'success';
    }

    //验签
    function verify($params) {
        $sign = $params['sign'];

        if($this->checkEmpty($this->aliPubKey)){
            $pubKey= $this->publicKey;
            $res = "-----BEGIN PUBLIC KEY-----\n" .
                wordwrap($pubKey, 64, "\n", true) .
                "\n-----END PUBLIC KEY-----";
        }else {
            //读取公钥文件
            $pubKey = file_get_contents($this->aliPubKey);
            //转换为openssl格式密钥
            $res = openssl_get_publickey($pubKey);
        }
        
        
        ($res) or die('支付宝RSA公钥错误。请检查公钥文件格式是否正确');
        //调用openssl内置方法验签，返回bool值
        $result = (bool)openssl_verify($this->getSignContent($params), base64_decode($sign), $res, OPENSSL_ALGO_SHA256);
        
        if(!$this->checkEmpty($this->aliPubKey)){
            openssl_free_key($res);
        }
        return $result;
    }
    
}

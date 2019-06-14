<?php 
namespace App\Http\Tools;

/**
 * 
 */
class Tools
{
	/**获取redis连接状态*/
	public function getRedis()
	{
		$redis=new \Redis();
    	$redis->connect('127.0.0.1','6379');
    	return $redis;
	}

}







 ?>
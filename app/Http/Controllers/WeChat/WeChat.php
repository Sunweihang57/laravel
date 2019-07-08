<?php

namespace App\Http\Controllers\WeChat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeChat extends Controller
{
    /**
     * 接入接口
     */
    public function jieru()
    {
    	$echostr = $_GET['echostr'];
    	echo $echostr;
    	// $XML = file_get_contents("php://input");
    	// $xmlObj = simplexml_load_string($XML);
    	
    }
}

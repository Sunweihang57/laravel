<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/user','userController@index');//路由


Route::any('/save','userController@save');
Route::any('/list','userController@list');
Route::any('/del','userController@del');
Route::any('/update','userController@update');
Route::any('/update_do','userController@update_do');
Route::any('/search','userController@search');
Route::any('/redis','userController@redis');

/**微商城使用的路由*/
//后台部分
Route::get('/admin/login/login','Admin\Login@login');
Route::post('/admin/login/login_do','Admin\Login@login_do');

Route::middleware(['login'])->group(function(){
	Route::get('admin/index/index','Admin\Index@index');
	Route::get('admin/login/logout','Admin\Login@logout');
	Route::get('admin/index/goodsCreate','Admin\Index@goodsCreate');
	Route::any('admin/index/goodsSave','Admin\Index@goodsSave');
	Route::any('admin/index/goodsList', 'Admin\Index@goodsList');
	Route::get('admin/index/goodsDel', 'Admin\Index@goodsDel');
	Route::get('admin/index/goodsUpd', 'Admin\Index@goodsUpd');
	Route::any('admin/index/goodsUpd_do', 'Admin\Index@goodsUpd_do');
	
});

//前台部分
Route::get('index/index/index', 'Index\Index@index');
Route::get('/', 'Index\Index@index');
Route::get('index/login/register', 'Index\Login@register');
Route::post('index/login/save', 'Index\Login@save');
Route::get('index/login/login', 'Index\Login@login');
Route::post('index/login/login_do', 'Index\Login@login_do');
Route::get('index/login/logout', 'Index\Login@logout');
Route::middleware(['index_login'])->group(function(){
	Route::any('index/goods/product', 'Index\Goods@product');
	Route::any('index/cart/create', 'Index\Cart@create');
	Route::any('index/cart/list', 'Index\Cart@list');
	Route::any('index/cart/del', 'Index\Cart@delete');
	Route::any('index/order/order', 'Index\Order@order');
	Route::any('index/order/details', 'Index\Order@details');
	Route::any('index/order/pay', 'Index\AliPayController@ali_pay');
});
Route::post('/notify_url', 'Index\AliPayController@aliNotify');
Route::get('/return_url', 'Index\AliPayController@aliReturn');


//测试session值
Route::get('index/login/session', 'Index\Login@session');


/**测试部分使用路由*/
Route::get('ceshi/student/create', 'CeShi\Student@create');
Route::post('ceshi/student/save', 'CeShi\Student@save');
Route::get('ceshi/student/index', 'CeShi\Student@index');
Route::get('ceshi/student/del', 'CeShi\Student@delete');
Route::get('ceshi/student/upd', 'CeShi\Student@update');
Route::post('ceshi/student/upd_do', 'CeShi\Student@upd_do');
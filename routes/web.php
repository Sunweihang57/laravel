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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['stu'])->group(function(){
	Route::get('/user','userController@index');//路由
});


Route::any('/save','userController@save');
Route::any('/list','userController@list');
Route::any('/del','userController@del');
Route::any('/update','userController@update');
Route::any('/update_do','userController@update_do');
Route::any('/search','userController@search');
Route::any('/redis','userController@redis');

/**微商城使用的路由*/
Route::get('login','LoginController@login');
Route::post('/login_do','LoginController@login_do');
Route::get('register','LoginController@register');
Route::post('register_do','LoginController@register_do');
Route::get('logout','LoginController@logout');
Route::middleware(['login'])->group(function(){
	Route::get('/index','IndexController@index');
});

/**文件上传与模板继承实验*/
Route::post('/file','IndexController@file');
Route::any('/layout','IndexController@layout');
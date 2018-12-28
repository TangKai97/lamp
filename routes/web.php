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
























//chen的提交
//前台注册路由
Route::resource('home/login/register','home\login\RegisterController');
//激活账户路由
Route::get('home/login/status/{id}/{token}','home\login\RegisterController@setstatus');
//使用手机号注册
Route::post('home/login/insert','home\login\RegisterController@insert');
Route::get('home/login/sendMobileCode','home\login\RegisterController@sendMobileCode');
Route::get('home/login/yanzheng/{phone}','home\login\RegisterController@yanzheng');
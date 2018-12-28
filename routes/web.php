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


// 后台登录
Route::get('admin/user/login','admin\user\UserController@login');
Route::get('admin/user/dologin','admin\user\UserController@dologin');
// 后台
Route::resource('admin/user','admin\user\UserController');








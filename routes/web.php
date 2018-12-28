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

// Route::get('/admin/index','admin\user\UserController@index');

Route::resource('admin/user','admin\user\UserController');







// 后台登录
Route::get('admin/login','admin\user\UserController@login');
Route::get('admin/dologin','admin\user\UserController@dologin');
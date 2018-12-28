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
//后台用户管理
Route::resource('/admin/user','admin\user\UserController');
//后台分类管理
Route::resource('/admin/cate','admin\cate\CateController');
//后台商品管理
Route::resource('/admin/goods','admin\goods\GoodsController');
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
Route::any('admin/captcha','admin\user\UserController@captcha');
//后台用户管理
Route::resource('admin/user','admin\user\UserController');
//后台分类管理
Route::resource('admin/cate','admin\cate\CateController');
//后台商品管理 
Route::resource('admin/goods','admin\goods\GoodsController'); 


//前台分类便利数据
Route::resource('/home/index','home\cates\CateController');
//前台登录
Route::get('/home/login','home\login\LoginController@index');
Route::post('/home/login/login','home\login\LoginController@login');
Route::any('home/loginout','home\HomeController@loginout');
Route::any('home/myself/addr/{id}','home\AddrdelController@defaultaddr');

















 













//chen的提交
//前台注册路由
Route::resource('home/login/register','home\login\RegisterController');
//激活账户路由
Route::get('home/login/status/{id}/{token}','home\login\RegisterController@setstatus');
//使用手机号注册
Route::post('home/login/insert','home\login\RegisterController@insert');
Route::get('home/login/sendMobileCode','home\login\RegisterController@sendMobileCode');
Route::get('home/login/yanzheng/{phone}','home\login\RegisterController@yanzheng');

//后台管理前台用户
Route::resource('admin/huser','admin\user\HuserController');
//后台轮播图
Route::resource('admin/banner','admin\banner\BannerController');
//后台广告
Route::resource('admin/nfos','admin\nfos\NfosController');
//后台品论管理
Route::resource('admin/comment','admin\comment\CommentController');
//后台订单管理
Route::resource('admin/orders','admin\orders\OrdersController');
//后台发货
Route::get('/admin/orders/fahuo/{id}','admin\orders\OrdersController@fahuo');
//前台修改密码
Route::get('home/changepass','home\changepass\ChangepassController@index');
Route::get('home/change/yanzheng/{oldpass}','home\changepass\ChangepassController@yanzheng');
Route::post('home/update/{id}','home\changepass\ChangepassController@update');
































// <--------------------------hukai-------------------------->
// 前台页面

Route::get('index','home\HomeController@index');
// 前台个人中心
Route::get('myself','home\HomeController@myself');
Route::get('layout','home\HomeController@layout');
// 前台用户订单页面
Route::get('mybuy','home\HomeController@mybuy');
// 前台订单详情
Route::get('home/orderinfo/{id}','home\HomeController@orderinfo');
// 确认收货
Route::get('/home/quren/{id}','home\HomeController@quren');


Route::get('/goods/{id}','home\HomeController@goods');
//前台首页修改个人资料
Route::get('/edit','home\HomeController@edit');
//前台商品详情页
Route::get('/goods_info/{id}','home\HomeController@goods_info');
//前台收藏商品and购物车
Route::get('/home/collection/{id}','home\collection\CollController@collection');
Route::get('/home/delete/{id}','home\collection\CollController@delete');
Route::get('/home/shopping/{id}','home\collection\CollController@shopping');
//前台修改个人信息
Route::get('/home/updated/{id}','home\HomeController@updated');

// 友情链接
Route::resource('admin/friend','admin\friend\FriendController');
Route::get('home/addrdel/{id}','home\AddrdelController@delete');
Route::resource('home/addr','home\AddrController');

// 添加到购物车
Route::any('home/buy/{id}','home\BuyController@edit');
// 购物车
Route::any('buycar','home\BuyController@index');
// 购物车第二步
Route::any('buycar_two','home\BuyController@buycar_two');
//生成订单方法
Route::post('buycar_add','home\BuyController@buycar_add');
// 结算页
Route::any('/home/jiesuan/{id}','home\BuyController@jiesuan');
// 购物车商品减1
Route::get('dec/{id}','home\BuyController@dec');
// 购物车商品加1
Route::get('add/{id}','home\BuyController@add');

 




<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{


    // 用户个人信息
    public function myself()
    {
    	return view('home.myself.myself');
    }

    // 我的订单
    public function mybuy()
    {
    	return view('home.myself.mybuy');
    }

    // 收货地址
    public function myaddr()
    {
    	return view('home.myself.myaddr');
    }

    // 我的收藏
    public function mylike()
    {
    	return view('home.myself.mylike');
    }


    // 购物车
    public function buycar()
    {
    	return view('home.myself.buycar');
    }

    public function buycar_two()
    {
    	return view('home.myself.buycar_two');
    }

    public function buycar_three()
    {
    	return view('home.myself.buycar_three');
    }
}

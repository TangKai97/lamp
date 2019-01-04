<?php

namespace App\Http\Controllers\home\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\User;
use DB;
use Hash;
class LoginController extends Controller
{
    //
    public function index()
    {
    	return view('/home/login/login');
    }

    public function login(Request $request)
    {	
    	//接收数据
    	$data = $request->except('_token');
    	$uname = $data['uname'];
    	$upwd = $data['upwd'];
    	
    	// dump($data['uname']);exit;
    	$home_user = User::all()->where('uname',$uname)->first();
    	$res = $home_user->uname;
    	$res1 = $home_user->upwd;

    	if(($res == $uname) && (Hash::check($upwd,$res1))) {
    		session(['res'=>$res]);
    		return redirect('/home/index');
    	}else{
    		return redirect('/home/login')->with('登录失败');
    	}
    }
}

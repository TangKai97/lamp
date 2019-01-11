<?php

namespace App\Http\Controllers\home\changepass;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\User;
class ChangepassController extends Controller
{
    /*
       加载视图方法
    */
     public function index()
     {
     	return view('home.myself.changepass');
     }

     //修改
     public function update(Request $request, $id)
     {
        echo $id;
        dump($request->all());

     }

     //验证旧密码
     public function yanzheng($oldpass)
     {
        
     }
}

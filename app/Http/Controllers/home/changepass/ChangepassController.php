<?php

namespace App\Http\Controllers\home\changepass;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\User;
use Hash;
class ChangepassController extends Controller
{
    /*
       加载视图方法
    */
     public function index()
     {
        //获取登录用户信息
         $login_id = session('res')->id;
        //加载视图
     	return view('home.myself.changepass',['login_id'=>$login_id]);
     }

     //修改
     public function update(Request $request)
     {
        //dump($request->all());exit;
        //获取新密码
        $data = $request->only('recpassword');


        //获取当前用户id
        $login_id = session('res')->id;


        //拿到当前用户
        $user = User::find($login_id);
        $user->upwd = Hash::make($data['recpassword']);
        $res = $user->save();
        if($res){
            // 清除缓存 重新登录
            session(['login_users'=>null]);
            return redirect('/home/login')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }

     }

     //验证旧密码
     public function yanzheng($oldpass)
     {
         //获取当前登录用户
        $login_id = session('res');


        //当前用户密码 是否与输入密码相一致
        if (Hash::check($oldpass,$login_id->upwd)) {
             echo json_encode(['code'=>'success']);
        } else {
             echo json_encode(['code'=>'error']);
        }
     }
}

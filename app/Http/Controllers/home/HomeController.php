<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Cate;
use App\Models\Admin\Goods;
use DB;
use App\Models\Home\Collection;
use App\Models\Admin\Orders;
use App\Models\Admin\Orders_info;
use App\Models\Home\Addr;
use App\Models\Admin\Friend;
class HomeController extends Controller
{
    public static function getPidCates($pid = 0)
    {
        $data = DB::table('cates')->where('pid',$pid)->get();

        foreach ($data as $key => $value) {
            // 获取所有下一级 子分类
            $temp = self::getPidCates($value->cid);
            $value->sub = $temp;
        }
        return $data;
    }

    // 用户个人信息
    public function myself()
    {   

        $data = session('res');
    	
        if(!$data){
            return redirect('/home/login')->with('您没登录,请登录!');
        }else{
            return view('home.myself.myself',['data'=>$data]);
        }
    }

    // 我的订单
    public function mybuy()
    {
        $friend = Friend::get();
        $user_id = session("res.id");
        $orders = Orders::where('uid',$user_id)->get();
        //dump($orders->oid);
       // dd($orders_info);
        $data = session('res');
        if(!$data){
            return redirect('/home/login')->with('您没登录,请登录!');
        }else{
            return view('home.myself.mybuy',['data'=>$data,'orders'=>$orders,'friend'=>$friend]);
        }
    }
    // 订单详情 
    public function orderinfo($id)
    {   
         $user_id = session("res.id");
         $data = Addr::where('uid',$user_id)->where('default','是')->get();
         foreach ($data as $key => $value) {
             
         }
         $user_id = session("res.id");
         $orders = Orders::where('uid',$user_id)->where('oid',$id)->get();
         $data = session('res');
         return view('home.myself.orderinfo',['data'=>$data,'orders'=>$orders,'value'=>$value]);
    }


    public function goods(Request $request,$id)
    {   
        $login_users = session('res');
        $each = self::getPidCates(0);
        $data = Goods::where('cid','=',$id)->get();
        return view('home.myself.goods',['data'=>$data,'each'=>$each,'login_users'=>$login_users]);
    }

    public function edit()
    {  
        $data = session('res');
        return view('home.myself.edit',['data'=>$data]);
    }

    public function updated(Request $request, $id)
    {
        echo $id;
        //判断文件是否上传
        $data = $request->all();
        dump($data);
        //判断是否有文件上传
        if($request->hasFile('hhead')){
            //完成文件上传
            $profile = $request->file('hhead');
            $res = $profile->store('images');
            $data['hhead'] = $res;
        }else{

        }



    }

    public function goods_info($id = 0)
    {  
        $login_users = session('res');
        $data = Goods::find($id);
        $each = self::getPidCates(0);
        return view('home.myself.goods_info',['each'=>$each,'data'=>$data,'login_users'=>$login_users]);
    }

    public function loginout()
    {
        session(['res'=>null]);
        return redirect('/home/index');
    }

    public function quren($id)
    {
        $data = Orders::find($id);
        $data->status = 3;
        $res = $data->save();
        if($res){
            return redirect('/mybuy')->with('success','确认收货成功');
        }else{
            return view('/mybuy')->with('error','确认收货失败');
        }
    }

}

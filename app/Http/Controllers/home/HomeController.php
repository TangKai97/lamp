<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Cate;
use App\Models\Admin\Goods;
use DB;
use App\Models\Home\Collection;
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
    	return view('home.myself.myself',['data'=>$data]);
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
        $data = Collection::all();
        //加载视图
    	return view('home.myself.mylike',['data'=>$data]);
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

    public function goods(Request $request,$id)
    {   
        $each = self::getPidCates(0);
        $data = Goods::where('cid','=',$id)->get();
        return view('home.myself.goods',['data'=>$data,'each'=>$each]);
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
        $data = Goods::find($id);
        $each = self::getPidCates(0);
        return view('home.myself.goods_info',['each'=>$each,'data'=>$data]);
    }
}

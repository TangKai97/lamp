<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Buycar;
use App\Models\Home\Addr;
use App\Models\Admin\Orders;
use App\Models\Admin\Orders_info;

class BuyController extends Controller
{
    //
    public function index()
    {
        $login_users = session('res');
    	$uid = session('res.id');
    	$data = Buycar::where('uid','=',$uid)->get();
    	$total = 0;
    	foreach($data as $k=>$v){
    		$total += (float)$v->getgoods->price * (int)$v->bnum;
            $aaa = $v->gid;
    	}

        $flag = isset($aaa);
    	return view('home.myself.buycar',['data'=>$data,'total'=>$total,'login_users'=>$login_users,'flag'=>$flag]);
    }

    // 添加到购物车
    public function edit($id)
    {

    	//获取用户id
    	$uid = session('res.id');
        if($uid == null){
            return redirect('/home/login');
        }
        	//判断该用户是否已添加过该商品
        	if(Buycar::where('uid','=',$uid)->where('gid','=',$id)->first()){
        		return back()->with('error','该商品已经在购物车中');
        	}

        	$data = new Buycar;
        	$data->uid = $uid;
        	$data->gid = $id;
        	$res = $data->save();
        	if($res){
        		return redirect('/buycar')->with('success','商品已添加到购物车~');
        	}else{
        		return back();
        	}
    	
    }

    // 购物车 
    public function buycar_two()
    {
        $addr = Addr::where('default','=','是')->get();
        $login_users = session('res');
        $uid = session('res.id');
        $data = Buycar::where('uid','=',$uid)->get();
        $total = 0;
        $buycar_ids = '';
        foreach($data as $k=>$v){
            $total += (float)$v->getgoods->price * (int)$v->bnum;
            $buycar_ids .= $v->id.',';
        }
    	return view('home.myself.buycar_two',['total'=>$total,'login_users'=>$login_users,'data'=>$data,'addr'=>$addr,'buycar_ids'=>$buycar_ids]);
    }

    // 结算页
    public function jiesuan($id)
    {
        $login_users = session('res');

        $orders = Orders::find($id);
    	return view('home.myself.buycar_three',['login_users'=>$login_users,'orders'=>$orders,'id'=>$id]);
    }

    //购物车商品数量加1
    public function add($id)
    {
    	//获取用户id
    	$uid = session('res.id');

    	//购物车商品数量加1
    	$buycar = Buycar::find($id);
    	$buycar->bnum = $buycar->bnum + 1;
    	$res = $buycar->update();

    	$data = Buycar::where('uid','=',$uid)->get();
    	$total = 0;
    	foreach($data as $k=>$v){
    		$total +=  round( (float)$v->getgoods->price * (int)$v->bnum ,2);
    	}
    	
    	$xiaoji = round( $buycar->getgoods->price * $buycar->bnum ,2);

    	if($res){
    		echo json_encode(['code'=>'success','total'=>$total,'buy'=>$buycar,'xiaoji'=>$xiaoji]);
    	}else{
    		echo json_encode(['code'=>'error']);
    	}
    	
    }

    //购物车商品数量减1
    public function dec($id)
    {
    	//获取用户id
    	$uid = session('res.id');

    	//购物车商品数量减1
    	$buycar = Buycar::find($id);

    	if($buycar->bnum <= 2){
    		$buycar->bnum = 2;
    	}

    	$buycar->bnum = $buycar->bnum - 1;
    	$res = $buycar->update();

    	//计算购物车总价
    	$data = Buycar::where('uid','=',$uid)->get();
    	$total = 0;
    	foreach($data as $k=>$v){
    		$total += round( (float)$v->getgoods->price * (int)$v->bnum ,2);
    	}

    	$xiaoji = round( $buycar->getgoods->price * $buycar->bnum,2);
    	
    	if($res){
    		echo json_encode(['code'=>'success','total'=>$total,'buy'=>$buycar,'xiaoji'=>$xiaoji]);
    	}else{
    		echo json_encode(['code'=>'error']);
    	}

    }

    /**
     * 生成订单方法
     */
    public function buycar_add(Request $request)
    {
        $data = $request->all();

        //获取当前登录用户id
        $login_id = session('res')->id;

        $orders_id = time();
        //存储数据到订单主表
        $order = New Orders;
        $order->oid = $orders_id;
        $order->uid = $login_id;
        $order->total = $data['total'];
        $order->status = 1;
        $order->aid = $data['addr_id'];
        $order->msg = $data['msg'];
        $res1 = $order->save();

        //拆分购物车id
        $data['buycha_id'] = trim($data['buycha_id'],',');
        $buycar_arr = explode(',', $data['buycha_id']);

        foreach ($buycar_arr as $key => $value) {
            //获取购物车信息
            $buycar = Buycar::find($value);

            //生成数据存入订单附表
            $order_info = New Orders_info;
            $order_info->oid = $orders_id;
            $order_info->gnum = $buycar->bnum;
            $order_info->gname = $buycar->getgoods->gname;
            $order_info->gprice = $buycar->getgoods->price;
            $order_info->gpic = $buycar->getgoodsinfo->gpic;
            $order_info->save();
        }

        foreach ($buycar_arr as $key => $value) {

            $buycar = Buycar::find($value);
            $buycar->delete();
        }
      if($res1){
            return redirect('/home/jiesuan/'.$orders_id);
      }else{
            return back()->with('error','添加错误');
      }
    }   
}

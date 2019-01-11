<?php

namespace App\Http\Controllers\admin\orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Orders;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取数据
        // $data = Orders::all();
         $params = $request->all();
        //读取数据
        if(isset($_GET['oid'])){
           $data = Orders::where('oid','like',"%{$_GET['oid']}%")->paginate(1);
        }else{
           $data = Orders::paginate(1);
        }
        //加载视图
        return view('admin.orders.index',['data'=>$data,'params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //获取数据
        $data = Orders::find($id);
        //加载视图
        return view('admin.orders.info',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取数据
        $data = Orders::find($id);

        //加载视图
        return view('admin.orders.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //获取数据
        $data = $request->except(['_token','_method']);
        //dump($data);exit;
        
        //写入数据库
        $order = Orders::find($id);
        $order->link_man = $data['link_man'];
        $order->tel = $data['tel'];
        $order->addr = $data['addr'];
        $res = $order->save();
        if($res){
            return redirect('/admin/orders')->with('success', '修改成功');
        }else{
        return back()->with('error', '修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除
        $data = Orders::find($id);
        $res = $data->delete();
        if ($res) {
           return redirect('/admin/orders')->with('success', '删除成功');
        }else{
            return back()->with('error', '删除失败');
        }
    }

    public function fahuo($id)
    {
        $data = Orders::find($id);
        $data->status = 2;
        $res = $data->save();
        if ($res) {
             return redirect('/admin/orders')->with('success', '发货成功');
        }else{
            return back()->with('error', '发货失败');
        }
    }
}

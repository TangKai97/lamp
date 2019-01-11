<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Addr;

class AddrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 收货地址
        $data = Addr::all();
        return view('home.addr.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 添加地址页面
        return view('home.addr.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 添加收货地址
        $data = new Addr;
        $data->aname = $request->aname;
        $data->atel = $request->atel;
        $data->addr = $request->addr;
        $data->addrinfo = $request->addrinfo;
        $data->save();
        if ($data) {
            return redirect('/home/addr')->with('success', '添加成功');
        }else{
            return back()->with('error', '添加失败');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 修改地址页面
        $data = Addr::find($id);
        return view('home.addr.edit',['data'=>$data]);
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
        // 修改收货地址
        $data = Addr::find($id);
        $data->aname = $request->aname;
        $data->atel = $request->atel;
        $data->addr = $request->addr;
        $data->addrinfo = $request->addrinfo;
        $data->save();
        if ($data) {
            return redirect('/home/addr')->with('success', '修改成功');
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
        
    }

}

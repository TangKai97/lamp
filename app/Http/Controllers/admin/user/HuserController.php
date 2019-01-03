<?php

namespace App\Http\Controllers\admin\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\User;
class HuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        //读取数据
        //$data = User::all();
        if(isset($_GET['name'])){
           $data = User::where('uname','like',"%{$_GET['name']}%")->paginate(5);
        }else{
           $data = User::paginate(5);
        }
        //加载视图
        return view('admin.huser.index',['data'=>$data,'params'=>$params]);
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
        // echo $id;exit;
        $data = User::find($id);
        //加载视图
        return view('admin.huser.edit',['data'=>$data]);
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
        //接受数据
        $data = $request->except(['_token','_method']);
        $edit = User::find($id);
        $edit->uname = $data['uname'];
        $edit->utel = $data['utel'];
        $edit->email = $data['email'];
        $edit->status = $data['status'];
        $edit->save();
        if($data){
            return redirect('/admin/huser')->with('success', '修改成功');
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
        //删除数据
        $data = User::find($id);
        $data->delete();
        if($data){
            return redirect('/admin/huser')->with('success', '删除成功');
        }else{
            return back()->with('error', '删除失败');
        }
    }
}

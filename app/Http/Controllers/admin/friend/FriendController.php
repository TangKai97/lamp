<?php

namespace App\Http\Controllers\admin\friend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Friend;
class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取数据
         $data =  Friend::all();
        // 友情链接列表
        return view('admin.friend.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 友情链接添加
        return view('admin.friend.create');
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
        $data = new Friend;
        $data->fname = $request->fname;
        $data->flink = $request->flink;
        $res = $data->save();
        if ($res) {
            return redirect('/admin/friend')->with('success', '添加成功');
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
         // 获取数据
         $data = Friend::find($id);
        // 修改链接
        return view('admin.friend.edit',['data'=>$data]);
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
        //
        $data = Friend::find($id);
        $data->fname = $request->fname;
        $data->flink = $request->flink;
        $res = $data->save();
        if ($data) {
            return redirect('/admin/friend')->with('success', '修改成功');
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
        // 删除友情链接
        $data = Friend::find($id);
        $res = $data->delete();
        if ($res) {
           return redirect('/admin/friend')->with('success', '删除成功');
        }else{
            return back()->with('error', '删除失败');
        }
    }
}

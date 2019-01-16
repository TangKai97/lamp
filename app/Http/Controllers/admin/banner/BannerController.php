<?php

namespace App\Http\Controllers\admin\banner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取数据
        $data =  Banner::all();
        //加载视图
        return view('admin.banner.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载视图
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接受数据
        $data = $request->except('_token');
        //判断是否有文件上传
        if ($request->hasFile('url')) {
            //完成文件上传
            $profile = $request->file('url');
            $res = $profile->store('images');
            $data['url'] = $res;
        }else{
            dd('请选择文件');
        }
        //存入数据
        $banner = new Banner;
        $banner->url = $data['url'];
        $res1 = $banner->save();
        if ($res1) {
            return redirect('/admin/banner')->with('success', '添加成功');
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
        $data = Banner::find($id);
        //加载视图
        return view('admin.banner.edit',['data'=>$data]);
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
        //接收数据
       $data = $request->except(['_token','_method']);
        //存入数据
        $banner = Banner::find($id);
         //判断是否有文件上传
        if ($request->hasFile('url')) {
            //完成文件上传
            $profile = $request->file('url');
            $res = $profile->store('images');
            $data['url'] = $res;
            $banner->url = $data['url'];
        }
        
        $res1 = $banner->save();
        if ($res1) {
            return redirect('/admin/banner')->with('success', '修改成功');
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
        //
        $data = Banner::find($id);
        $res = $data->delete();
        if ($res) {
           return redirect('/admin/banner')->with('success', '删除成功');
        }else{
            return back()->with('error', '删除失败');
        }
    }

    public function kaiqi($id)
    {
        $data = Banner::find($id);

        $data->status = 1;
        $res = $data->save();
        if ($res) {
             return redirect('/admin/banner')->with('success', '开启成功');
        }else{
            return back()->with('error', '开启失败');
        }
    }

    public function jinyong($id)
    {
        $data = Banner::find($id);

        $data->status = 2;
        $res = $data->save();
        if ($res) {
             return redirect('/admin/banner')->with('success', '禁用成功');
        }else{
            return back()->with('error', '禁用失败');
        }
    }
}

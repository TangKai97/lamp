<?php

namespace App\Http\Controllers\admin\nfos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Nfos;
class NfosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取数据
        $data = Nfos::all();

        //加载视图
        return view('admin.nfos.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载视图
        return view('admin.nfos.create');
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
        if ($request->hasFile('ipic')) {
            //完成文件上传
            $profile = $request->file('ipic');
            $res = $profile->store('images');
            $data['ipic'] = $res;
        }else{
            dd('请选择文件');
        }
        //存入数据
        $nfos = new Nfos;
        $nfos->ipic = $data['ipic'];
        $nfos->info = $data['info'];
        $res1 = $nfos->save();
        if ($res1) {
            return redirect('/admin/nfos')->with('success', '添加成功');
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
        //获取数据
        $data = Nfos::find($id);
        //加载页面
        return view('admin.nfos.edit',['data'=>$data]);
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
        $nfos = Nfos::find($id);
        $nfos->info = $data['info'];
         //判断是否有文件上传
        if ($request->hasFile('ipic')) {
            //完成文件上传
            $profile = $request->file('ipic');
            $res = $profile->store('images');
            $data['ipic'] = $res;
            $nfos->ipic = $data['ipic'];
        }
        
        $res1 = $nfos->save();
        if ($res1) {
            return redirect('/admin/nfos')->with('success', '修改成功');
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
        $data = Nfos::find($id);
        $res = $data->delete();
        if ($res) {
           return redirect('/admin/nfos')->with('success', '删除成功');
        }else{
            return back()->with('error', '删除失败');
        }
    }
}

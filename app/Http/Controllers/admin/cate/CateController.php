<?php

namespace App\Http\Controllers\admin\cate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CateController extends Controller
{
    public static function getCates()
    {
       
        $data = DB::table('cates')->select('*',DB::raw("concat(path,',',cid) as paths"))->orderBy('paths','asc')->get();
        foreach ($data as $key => $value) {
            // 统计， 出现的次数
            $n = substr_count($value->path, ',');
            $data[$key]->cname = str_repeat('|----',$n).$value->cname;
        }
        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //拿取数据

        //加载视图
        return view('admin.cate.index',['data'=>self::getCates()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = 0)
    {

        //加载视图
        return view('admin.cate.create',['id'=>$id,'data'=>self::getCates()]);
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
        $data = $request->except('_token');
        // 获取父级分类id
        $pid = $data['pid'];
        // 检测顶级分类
        if($pid == 0){
            $data['path'] = 0;
        }else{
            // 拼接path
            $parent_data = DB::table('cates')->where('cid','=',$pid)->first(); 
            $data['path'] = $parent_data->path.','.$parent_data->cid;
        }   
        // 执行添加
        $res = DB::table('cates')->insert($data);
        if($res){
             return redirect('admin/cate')->with('success', '添加成功');
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
        echo $id;
        return view('admin.cate.create',['id'=>$id,'data'=>self::getCates()]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //查找数据
         $cates = DB::table('cates')->where('cid',$id)->first();
        // 加载视图
        return view('admin.cate.edit',['cates'=>$cates,'data'=>self::getCates()]);
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
        // 检测当前分类 下是否有 子分类
        $child_data = DB::table('cates')->where('pid',$id)->first();
        if($child_data){
            return back()->with('error','当前分类下有子分类，不允许修改');
            exit;
        }

        // 
        // 接受数据
        $data = $request->except(['_token','_method']);
        // 获取父级分类id
        $pid = $data['pid'];
        // 检测顶级分类
        if($pid == 0){
            $data['path'] = 0;
        }else{
            // 拼接path
            $parent_data = DB::table('cates')->where('cid','=',$pid)->first(); 
            $data['path'] = $parent_data->path.','.$parent_data->cid;
        }   
        // 执行添加
        $res = DB::table('cates')->where('cid',$id)->update($data);
        if($res){
             return redirect('admin/cate')->with('success', '修改成功');
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
        //检测当前是否与子分类
        $child_data = DB::table('cates')->where('pid',$id)->first();
        if($child_data){
            return back()->with('error','当前分类下有子分类，不允许删除');
            exit;
        }
        $res = DB::table('cates')->where('cid',$id)->delete();
        if($res){
            return redirect('admin/cate')->with('success', '删除成功');
        }else{
            return back()->with('error', '删除失败');
        }

    }
}

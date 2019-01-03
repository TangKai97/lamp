<?php

namespace App\Http\Controllers\admin\goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Goods;
use DB;
use App\Models\Admin\Goods_Info;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   


        //查找数据
        if(isset($_GET['name'])){
            $data =   Goods::where('gname','like',"%{$_GET['name']}%")->paginate(10);
        }else{
            $data = Goods::paginate(10);
        }
        //加载视图
        return view('admin.goods.index',['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //查找数据
        $cate = DB::table('cates')->get();
        //加载视图
        return view('admin.goods.create',['cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收数据

        $data = $request->except('_token');
        //判断是否有文件上传
        if($request->hasFile('gpic')){
            //完成文件上传
            $profile = $request->file('gpic');
            $res = $profile->store('images');
            $data['gpic'] = $res;
        }else{

        }
        //存入数据
        $gid = DB::table('goods')->insertGetId(
            [
            'cid' => $data['cid'],
            'gname' => $data['gname'],
            'stock' => $data['stock'],
            'price' => $data['price'],
            'status' => $data['status'],
            'color' => $data['color'],
            ]
    );
        $goods = new Goods_Info;
        $goods->gid = $gid;
        $goods->gdesc = $data['gdesc'];
        $goods->gpic = $data['gpic'];
        $goods->save();
        if ($goods) {
            return redirect('/admin/goods')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
        //查找数据
        $data = Goods::find($id);
        return view('admin.goods.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //拿取数据
        $data = Goods::find($id);
        $cate = DB::table('cates')->get();
        //加载视图
        return view('admin.goods.edit',['data'=>$data,'cate'=>$cate]);
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
        $gid = $id;
        //接收数据
        $data = $request->except(['_token','_method']);
        //存入数据
        $good = Goods::find($id);
        $good->gname = $data['gname'];
        $good->price = $data['price'];
        $good->status = $data['status'];
        $good->stock = $data['stock'];
        $good->color = $data['color'];
        $good->save();
        $goods = Goods_Info::find($id);
        $goods->gid = $gid;
         //判断是否有文件上传
        if($request->hasFile('gpic')){
            //完成文件上传
            $profile = $request->file('gpic');
            $res = $profile->store('images');
            $data['gpic'] = $res;
            $goods->gpic = $data['gpic'];
        }else{

        } 
        $goods->gdesc = $data['gdesc'];

        $goods->save();
        if ($goods) {
            return redirect('/admin/goods')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
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
        //查找数据
        $data = Goods::find($id);
        $data->delete();
        if ($data) {
            return redirect('/admin/goods')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }

        
    }
}

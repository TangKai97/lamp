<?php

namespace App\Http\Controllers\home\cates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin\Banner;
use App\Models\Admin\Goods;
class CateController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        //调用该自己
        $data = self::getPidCates(0);
        //查找数据
        $banner = Banner::where('status','=',1)->limit(3)->get();
        if(session('res')){
            //获取当前登录用户
             $login_users = session('res');
        }else{
            $login_users = null;
        }
               
        return view('home.myself.index',['data'=>$data,'banner'=>$banner,'login_users'=>$login_users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

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
        //
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
    }
}

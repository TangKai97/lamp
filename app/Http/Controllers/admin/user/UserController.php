<?php

namespace App\Http\Controllers\admin\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Hash;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        if(isset($_GET['name'])){
        $tang =   User::where('auth','like',"%{$_GET['name']}%")->paginate(5);
        }else{
                $tang = User::paginate(5);
        }

        $data = User::orderBy('id','asc')->get();
        return view('admin.user.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.create');
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
        $this->validate($request,[
                'aname'=>'required|regex:/^[a-zA-Z]{1}[\w]{5,15}$/',
                'apwd'=>'required|regex:/^[\w]{6,15}$/',
                'reapwd'=>'required|same:apwd',
                'atel'=>'required|regex:/^1{1}[3-9]{1}[0-9]{9}$/',
                'aemail'=>'required|email',
            ],[
                'aname.required'=>'请填写用户',
                'aname.regex'=>'用户命名格式不正确',
                'apwd.required'=>'请填写密码',
                'apwd.regex'=>'密码格式不正确',
                'reapwd.same'=>'两次密码不一致',
                'atel.required'=>'请填写电话',
                'atel.regex'=>'手机号格式不正确',
                'aemail.required'=>'请填写邮箱',
                'aemail.email'=>'邮箱格式不正确',
            ]);
            $request->except('_token');
            $data = new User;
            $data->aname = $request->aname;
            $data->apwd = Hash::make($request->apwd);
            $data->atel = $request->atel;
            $data->aemail = $request->aemail;
            $data->save(); 
            if($data){
                    return redirect('/admin/user')->with('success', '添加成功');
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
    public function show()
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
        $data = User::find($id);
        return view('admin.user.edit',['data'=>$data]);
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

        $edit = User::find($id);
        $edit->aname = $data['aname'];
        $edit->atel = $data['atel'];
        $edit->aemail = $data['aemail'];
        $edit->save();
        if($data){
            return redirect('/admin/user')->with('success', '修改成功');
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

            $data = User::find($id);
            $data->delete();
            if($data){
                    return redirect('/admin/user')->with('success', '删除成功');
            }else{
                return back()->with('error', '删除失败');
        }
    }

     public function login()
    {
        return view('admin.user.login');
    }

    public function dologin(request $request)
    {
        // 获取表单数据
        $aname = $request->aname;
        $apwd = $request->apwd;

        if((($aname && $apwd) == null)){
            return back()->with('error', '删除失败');
            exit;
        }
        
        // 查询数据库数据
        $user = DB::table('admin_user')
                    ->where('aname', $aname)
                    ->first();

        $aname_sql = $user->aname;
        $apwd_sql = $user->apwd;
        
        if((Hash::check($apwd,$apwd_sql)) && ($aname == $aname_sql)){
            return redirect('/admin/user')->with('success', '登录成功');
        }else{
            return back()->with('error', '删除失败');
        }
        

    }


}

<?php

namespace App\Http\Controllers\admin\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Hash;
use DB;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         //查找数据
        if(isset($_GET['aname'])){
            $data =   User::where('aname','like',"%{$_GET['aname']}%")->paginate(5);
        }else{
            $data = User::paginate(5);
        }

        return view('admin.user.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载视图
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
    
        //验证
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

                    return redirect('/admin/user/create')->with('success', '添加成功');

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

        $aname = $request->input('aname');


        $res = DB::table('admin_user')->where('aname',$aname)->first();


        // dd($res->password);

        if(!$res){
            // echo 0;测试代码1
            return back()->with('error','用户名错误');
        }
         
        // 判断密码
        $apwd = $request->input('apwd');
        if(!Hash::check($apwd,$res->apwd)){
            return back()->with('error','密码错误');
        }

        $code = $request->input('code');
        if($code != session('code')){
            return back()->with('error','验证码错误');
        } 

        session(['aname'=>$res->aname]);
        session(['id'=>$res->id]);
        return redirect('/admin/user')->with('success', '登录成功');

    }
    
    // 验证码
    public function captcha()
    {

        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(123, 203, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 140, $height = 40, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        // \Session::flash('code', $phrase);

        session(['code'=>$phrase]);

        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }


}

<?php

namespace App\Http\Controllers\home\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Models\Home\User;
use Hash;
class RegisterController extends Controller
{
    /**
     * 执行注册 发送邮件
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示视图
        return view('home/login/index');
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
     * 执行手机号注册
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function insert(Request $request)
     {
        //dump(session('mobile_code'));
        //接受数据
        $data = $request->all();
        //dump($data);exit;
        $users = new User;
        $users->utel = $request->input('utel');
        $users->uname = $request->input('utel');
        $users->upwd = Hash::make($request->input('upwd'));
        $res = $users->save();
        if ($res) {
            dd('注册成功');
        }else{
            dd('注册失败');
        }
     }
     
     public function sendMobileCode(Request $request)
     {
        //接收数据
        $phone = $request->input('phone');
        $mobile_code = rand(1000,9999);
        session(['mobile_code'=>$mobile_code]);
        //接口地址
       //  $target = 'http://106.ihuyi.com/webservice/sms.php?method=Submit';
       //  $target .= "&account=C07801597&password=c24bb304d9f2cf76f098e6ac4e9770d3&format=json&mobile=".$phone."&content=".rawurlencode("您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。");
       //  //请求接口 GET/PSST
       //  //初使化init方法
       //  $ch = curl_init();

       // //指定URL
       // curl_setopt($ch, CURLOPT_URL, $target);

       // //设定请求后返回结果
       // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

       // //发送请求
       // $res = curl_exec($ch);

       // dump($res);
       // //关闭curl
       // curl_close($ch);
     }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //接受用户输入的值   用户输入邮箱
        $data = $request->all();
        
        //将信息压入数据库
        $users = new User;
        $users->email = $request->input('email');
        $users->uname = $request->input('email');
        $users->upwd = Hash::make($request->input('upwd'));
        $users->token = str_random(60);//随机字符串
        // dump(session('pass_code'));exit();
        //添加成功  发送邮件
        if($users->save()){
            //发送邮件
                Mail::send('home.email.index', ['token'=>$users->token,'id'=>$users->id,'title' => 'shop官方邮件','email'=>$data['email']], function ($m) use ($users) {
                 //发送者                                   标题
                 $res = $m->to($users->email)->subject('这是一个测试');
                 if ($res) {
                    dump('注册成功');
                 }else{
                    dump('注册失败');
                 }
            });     
        }
    }

    public function setstatus($id,$token)
    {
        
        $users = User::find($id);
        //验证身份
        if ($token != $users->token) {
            dd('连接失效');
        }

        if ($users->status == 2) {
            dd('已经激活');
        }

        $users->status = 2;
        $users->token = str_random(60);
        if ($users->save()) {
            dd('激活成功');
        }else{
            dd('激活失败');
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

    public function yanzheng($phone)
    {
        $res = User::where('utel','=',$phone)->first();

        if($res){
            echo json_encode(['code'=>'error']);
        }else{
            echo json_encode(['code'=>'success']);
        }
    }
}

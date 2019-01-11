<?php

namespace App\Http\Controllers\admin\comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Comment;
use App\Models\Admin\Goods;
use App\Models\Home\User;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //读取数据
        // $params = $request->all();
        // if(isset($_GET['name'])){
        //    $data = User::where('uname','like',"%{$_GET['name']}%")->paginate(5);
        // }else{
        //    $data = Comment::paginate(2);
        // }

        // if (isset($_GET['good'])) {
        //     $good = Goods::where('gname','like','%'.$_GET['good'].'%')->get();
        //     echo '<pre>';
        //     var_dump($good);exit;

        //     $data = Comment::where('gname','like',"%".$good_name."%")->paginate(1);
        // }else{
        //      $data = Comment::paginate(1);
        // }
         $data = Comment::paginate(2);
        //加载视图
        return view('admin.comment.index',['data'=>$data]);
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
        //删除
        $data = Comment::find($id);
        $res = $data->delete();
        if ($res) {
           return redirect('/admin/comment')->with('success', '删除成功');
        }else{
            return back()->with('error', '删除失败');
        }
    }
}

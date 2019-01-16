<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Addr;

class AddrdelController extends Controller
{
    public function delete($id)
    {
        // 删除地址
        $data = Addr::find($id);
        $data = $data->delete();
        if ($data) {
            return redirect('/home/addr')->with('success', '删除成功');
        }else{
            return back()->with('error', '删除失败');
        }
    }

    public function defaultaddr($id)
    {
         $addr = Addr::find($id);
         $addr->default = '是';
         $data = $addr->save();
         if ($data) {
            $res = Addr::whereNotIn('id',[$id])->get();
            foreach ($res as $key => $value) {
                $value->default = '否';
                $value->save();
            }
            return redirect('/home/addr')->with('success', '设置成功');
        }else{
             return back()->with('error', '设置失败');
        }
    }
}

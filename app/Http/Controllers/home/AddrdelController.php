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
            return redirect('addr')->with('success', '删除成功');
        }else{
            return back()->with('error', '删除失败');
        }
    }
}

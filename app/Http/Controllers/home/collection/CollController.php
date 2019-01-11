<?php

namespace App\Http\Controllers\home\collection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Goods;
use App\Models\Home\Collection;
use DB;
class CollController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function collection($id)
    {	
    	//接收ID
    	$gid = $id;
    	//查找数据
    	$data = Goods::find($id);
    	//保存到数据库
    	$coll = new Collection;
    	$coll->gid = $gid;
    	$coll->price = $data->price;
    	$coll->gname = $data->gname;
    	$coll->save();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {	
    	$data = DB::table('collection')->where('id','=',$id)->delete();
       	dump($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Shopping($id)
    {
    	echo $id;
    }

}

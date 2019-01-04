<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //指定数据表
    protected $table = 'cates';
    //指定主键
    protected $primaryKey = 'cid';

    public function cates()
    {
    	return $this->hasOne('App\Models\Admin\Goods','cid');
    }
}

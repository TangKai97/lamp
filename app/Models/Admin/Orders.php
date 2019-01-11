<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //设置表名
    protected $table = 'orders';
    //设置主键
    protected $primaryKey = 'oid';
    //设置表关系
    public function getUser()
    {
    	return $this->belongsTo('App\Models\Home\user','uid','id');
    }
}

<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //设置表名
    protected $table = 'comment';

    public function getGoods()
    {
    	return $this->belongsTo('App\Models\Admin\Goods','gid','gid');
    }

    public function getUsers()
    {
    	return $this->belongsTo('App\Models\Home\user','uid','id');
    }
}

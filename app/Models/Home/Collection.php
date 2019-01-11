<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    //指定数据表
    protected $table = 'collection';

    protected $primaryKey = 'gid';

    public function Look()
    {
    	return $this->hasOne('App\Models\Admin\Goods_info','gid');
    }

}

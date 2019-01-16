<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Buycar extends Model
{
    // 关联表明
    public $table = 'buycar';
    //建立模型关系  商品
    public function getgoods()
    {
    	return $this->hasOne('App\Models\Admin\Goods','gid');
    }

     public function getgoodsinfo()
    {
    	return $this->hasOne('App\Models\Admin\Goods_info','gid','gid');
    }
}

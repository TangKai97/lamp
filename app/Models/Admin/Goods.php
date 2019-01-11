<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
    protected $table = 'goods';
    protected $primaryKey = 'gid';

    public function goodsinfo()
    {
    	return $this->hasOne('App\Models\Admin\Goods_Info','gid');
    }

}

<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //设置表名
    public $table = 'home_user';
    //一对一 通过用户查找用户详情
    public function userinfo()
    {
    	$this->hanOne('App\Models\home\Userinfo','uid');
    }

}

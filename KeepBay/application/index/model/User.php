<?php
namespace app\index\model;

use think\Model;
use think\Db;



class User extends Model
{
    public function getUser($username = 1) {
        $res = Db::name('user')->where('username', $username)->select();
        return $res;
    }
    public function getUserSex($username = 1) {
        $res = Db::name('user')->where('username', $username)->select();
        return $res;
    }
}
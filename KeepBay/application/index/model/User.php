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
    public function register($username, $password, $sex) { //向数据库中user表插入数据，存储用户信息
        $data = ['username' => $username, 'password' => $password, 'sex' => $sex, 'address' => '无' ];
        Db::table('user')->insert($data);
    }
    public function getUserAddress($username) {
        $data = Db::name('user')->where('username', $username)->select();
        $user = $data[0];
        $address = $user['address'];
        return $address;
    }
    public function createCart($username) { //向数据库中user表插入数据，存储用户信息
        $data = ['cart_user' => $username, 'cart_amount' => 0];
        Db::table('cart')->insert($data);
    }
    public function editAddress($username, $address) {
        Db::table('user')->where('username', $username)->update(['address' => $address]);
    }
}
<?php
namespace app\index\model;

use think\Model;
use think\Db;

class Cart extends Model
{
    public function addToCart($goodID, $username) {
        $find_same = Db::name('cart_goods')->where('goodID', $goodID)->where('cartuser', $username)->select(); //看这件商品是否已经存在于购物车里
        echo $goodID;
        if($find_same) {
            $current_good = $find_same[0];
            $quantity = $current_good['quantity'];
            Db::table('cart_goods')->where('goodID', $goodID)->update(['quantity' => $quantity + 1]);
        } else {
            $data = ['goodID' => $goodID, 'cartuser' => $username, 'quantity' => 1];
            Db::table('cart_goods')->insert($data);
        }
    }
    // public function getSameGood($goodID) {
    //     $res = Db::name('cart_goods')->where('goodID', $goodID)->select();
    //     return $res;
    // }
}
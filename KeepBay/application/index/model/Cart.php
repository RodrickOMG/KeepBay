<?php
namespace app\index\model;

use think\Model;
use think\Db;

class Cart extends Model
{
    public function addToCart($goodID, $username) {
        $find_same = Db::name('cart_goods')->where('goodID', $goodID)->where('cart_user', $username)->select(); //看这件商品是否已经存在于购物车里
        $price = Db::name('goods')->where('goodID',$goodID)->select();
        $good_price = $price[0]['good_price'];
        dump($good_price);
        if($find_same) { //如果已经存在该商品，则在原有数量上加1
            $current_good = $find_same[0];
            $quantity = $current_good['quantity'];
            $good_amount = $current_good['good_amount'];
            Db::table('cart_goods')->where('goodID', $goodID)->update(['quantity' => $quantity + 1, 'good_amount' => $good_amount + $good_price]);
        } else { //如果不存在该商品，则插入数据
            $data = ['goodID' => $goodID, 'cart_user' => $username, 'quantity' => 1,'good_amount' => $good_price];
            Db::table('cart_goods')->insert($data);
        }
        //更新购物车金额总数
        $cart = Db::name('cart')->where('cart_user',$username)->select();
        $current_cart_amount = $cart[0]['cart_amount'];
        Db::table('cart')->where('cart_user', $username)->update(['cart_amount' => $current_cart_amount + $good_price]);
    }
    // public function getSameGood($goodID) {
    //     $res = Db::name('cart_goods')->where('goodID', $goodID)->select();
    //     return $res;
    // }
    public function showCart($username) {
        $goods = model('Goods');
        $cartinfo = Db::name('cart_goods')->where('cart_user', $username)->select();
        $goodinfo = array();
        for($i = 0; $i < count($cartinfo); $i++) { //将goods表中相关商品的信息添加进购物车信息中，方便详情
            $temp = Db::name('goods')->where('goodID',$cartinfo[$i]['goodID'])->select();
            $cartinfo[$i]['good_name'] = $temp[0]['good_name'];
            $cartinfo[$i]['good_price'] = $temp[0]['good_price'];
            $cartinfo[$i]['good_picpath'] = $temp[0]['good_picpath'];
        }
        // dump($goodinfo);
        // dump($cartinfo[0]);
        return $cartinfo;
    }
    public function cartAmount($username) {
        $cart = Db::name('cart')->where('cart_user',$username)->select();
        return $cart[0]['cart_amount'];
    }
    public function clearCart($username) {
        Db::table('cart_goods')->where('cart_user', $username)->delete();
        Db::table('cart')->where('cart_user', $username)->delete();
    }
}
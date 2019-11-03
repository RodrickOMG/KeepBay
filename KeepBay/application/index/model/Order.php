<?php
namespace app\index\model;

use think\Model;
use think\Db;

class Order extends Model
{
    public function createOrder($username) {
        $orderID = uniqid();//创建订单ID，用uniqid生成唯一ID
        $create_time = date('Y-m-d h:i:s', time());
        $address = Db::name('user')->where('username', $username)->select()[0]['address'];
        $order_amount = Db::name('cart')->where('cart_user', $username)->select()[0]['cart_amount'];
        $data = ['orderID' => $orderID, 'order_user' => $username, 'order_address' => $address, 'create_time' => $create_time,'order_amount' => $order_amount];
        Db::table('order')->insert($data);
        return $orderID;
    }
    public function orderOverview($username) {
        return Db::name('order')->where('order_user', $username)->select();
    }
    // public function orderDetail($username) {
    //     $orders = Db::name('order')->where('order_user', $username)->select();
    //     //dump($orders);
    //     for($i = 0; $i < count($orders); $i++) {
    //         $orderID = $orders[$i]['orderID'];
    //         $orderinfo[$i] = Db::name('order_goods')->where('orderID', $orderID)->select();
    //         //dump($orderinfo);
    //         for($j = 0; $j < count($orderinfo); $j++) {
    //             $temp = Db::name('goods')->where('goodID',$orderinfo[$i][$j]['goodID'])->select();
    //             $orderinfo[$i][$j]['good_name'] = $temp[0]['good_name'];
    //             $orderinfo[$i][$j]['good_price'] = $temp[0]['good_price'];
    //             $orderinfo[$i][$j]['good_picpath'] = $temp[0]['good_picpath'];
    //         }
    //     }
    //     dump($orderinfo);
    //     //return $orderinfo;
    // }
    public function orderDetails($orderID) {
        $order = Db::table('order_goods')->where('orderID', $orderID)->select();
        $order_goods = array();
        for($i = 0; $i < count($order); $i++) {
            $temp = Db::name('goods')->where('goodID',$order[$i]['goodID'])->select();
            $order_goods[$i]['good_name'] = $temp[0]['good_name'];
            $order_goods[$i]['good_price'] = $temp[0]['good_price'];
            $order_goods[$i]['good_amount'] = $order[$i]['good_amount'];
            $order_goods[$i]['good_quantity'] = $order[$i]['good_quantity'];
            $order_goods[$i]['good_picpath'] = $temp[0]['good_picpath'];
        }
        //dump($order_goods);
        return $order_goods;
    }
    public function insertOrderGoods($orderID, $username) {
        $cart_goods = Db::name('cart_goods')->where('cart_user', $username)->select();
        $order_goods = array();
        for($i = 0; $i < count($cart_goods); $i++) {
            $temp = Db::name('goods')->where('goodID',$cart_goods[$i]['goodID'])->select();
            $order_goods[$i]['orderID'] = $orderID;
            $order_goods[$i]['goodID'] = $temp[0]['goodID'];
            $order_goods[$i]['good_quantity'] = $cart_goods[$i]['quantity'];
            $order_goods[$i]['good_amount'] = $cart_goods[$i]['good_amount'];
        }
        for($i = 0; $i < count($order_goods); $i++) {
            Db::table('order_goods')->insert($order_goods[$i]);//根据商品ID的不同依次插入到order_goods表中
        }
    }
    public function cancelOrder($orderID) {
        Db::table('order_goods')->where('orderID', $orderID)->delete();
        Db::table('order')->where('orderID', $orderID)->delete();
    }
}
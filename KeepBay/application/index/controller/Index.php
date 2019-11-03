<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;

class Index extends Controller
{
    public function index()
    {
        $loginname = Session::get('username');
        $this->assign('loginname',$loginname);
        return view('index');
    }
    public function product()
    {
        $loginname = Session::get('username');
        $this->assign('loginname',$loginname);
        $data = Db::query("select * from goods");
        $this->assign("data",$data);
    	return view('product');
    }
    public function contact()
    {
        $loginname = Session::get('username');
        $this->assign('loginname',$loginname);
    	return view('contact');
    }
    public function login() {
        $model = model('User');
        $username = input('post.username');
        $password = input('post.password');
        $find_user = $model->getUser($username);
        if ($find_user) {
            //echo($username);
            $current_user = $find_user[0];
            if($current_user['password'] == $password) {
                $this->assign('username',$username);
                Session::set('username',$username);
                $this->redirect('/index/gotouser');
            } else {
                echo "<script type='text/javascript' >alert('密码错误');location.href='/index'</script>";
            }
            
        } else {
            $loginname = Session::get('username');
            $this->assign('loginname',$loginname);
            echo "<script type='text/javascript' >alert('该用户不存在，请先注册')</script>";
            return view('index');
        }
        
    }
    public function register() {
        $username = input('post.username');
        $password = input('post.password');
        $sex = input('post.sex');
        //echo $username ."<br>". $password ."<br>". $sex;
        $model = model('User');
        $find_username = $model->getUser($username);
        if ($find_username) {
            echo "<script type='text/javascript' >alert('该用户已存在');location.href='/index'</script>";
        } else {
            $this->assign('username',$username);
            $this->assign('sex',$sex);
            $model->register($username, $password, $sex);
            $model->createCart($username);//创建用户的购物车
            Session::set('username',$username);
            $this->redirect('/index/gotouser');
        }
        
    }
    public function logout() {
        Session::set('username',"");
        $this->redirect('index');
    }
    public function gotouser() {
        $user = model('User');
        $cart = model('Cart');
        $order = model('Order');//实例化模型

        $username = Session::get('username');
        $this->assign('username',$username);
        $sex = $user->getSex($username);
        $this->assign('sex',$sex);
        $address = $user->getUserAddress($username);
        $this->assign('address',$address);
        
        $cartinfo = $cart->showCart($username);
        $this->assign('cartinfo',$cartinfo);
        $cart_amount = $cart->cartAmount($username);
        $this->assign('cart_amount', $cart_amount);

        $order_ov = $order->orderOverview($username);
        $this->assign('order_ov', $order_ov);

        return view('user');
    }
    public function editAddress() { //修改收货地址
        $username = Session::get('username');
        $address = input('post.address');
        $model = model('User');
        $model->editAddress($username, $address);
        $this->redirect('/index/gotouser');
    }
    public function addToCart() { //将商品添加至购物车
        $goodID = input('post.goodID');
        $username = Session::get('username');
        $model = model('Cart');
        $model->addToCart($goodID, $username);
        $this->redirect('/index/product');
    }
    public function createOrder() {
        $order = model('Order');
        $cart = model('Cart');

        $username = Session::get('username');
        $orderID = $order->createOrder($username);
        $order->insertOrderGoods($orderID, $username);
        $cart->clearCart($username);//创建订单完成后清空购物车
        $this->redirect('/index/gotouser');
    }
    public function orderDetails() {
        $order = model('Order');
        $user = model('User');

        $orderID = input('post.orderID');
        $this->assign('orderID', $orderID);
        $order_amount = input('post.order_amount');
        $this->assign('order_amount', $order_amount);
        $order_details = $order->orderDetails($orderID);
        $this->assign('order_details', $order_details);
        $username = Session::get('username');
        $this->assign('username',$username);
        $address = $user->getUserAddress($username);
        $this->assign('address',$address);
        return view('order');
    }
    public function confirmCancelOrder() {//弹出取消订单确认框
        $orderID = input('post.orderid');
        echo "<script type='text/javascript' >if(confirm('您确定要取消该订单吗？')){  
            location.href='/index/cancelOrder?orderid=${orderID}'//如果用户确定，则用get方法传递orderid，从而进行取消订单的操作
        }else{  
            location.href='javascript:history.go(-1);'//用户取消操作，返回上一级
        }  </script>";
    }
    public function cancelOrder() {
        $orderID = input('get.orderid');
        $order = model('Order');
        $order->cancelOrder($orderID);
        $this->redirect('/index/gotouser');
    }
    public function plusItem() {
        $cart = model('Cart');
        $goodID = input('get.goodid');
        $username = Session::get('username');
        $cart->plusItem($username, $goodID);
        $this->redirect('/index/gotouser');
    }
    public function minusItem() {
        $cart = model('Cart');
        $goodID = input('get.goodid');
        $username = Session::get('username');
        $cart->minusItem($username, $goodID);
        $this->redirect('/index/gotouser');
    }
}

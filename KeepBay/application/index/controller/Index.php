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
                $loginname = Session::get('username');
                $this->assign('loginname',$loginname);
                $this->assign('sex',$current_user['sex']);
                $this->assign('address',$current_user['address']);
                return view('user');
            } else {
                echo "<script type='text/javascript' >alert('密码错误')</script>";
                $this->redirect('index');
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
            echo "<script type='text/javascript' >alert('该用户已存在')</script>";
            $this->redirect('index');
        } else {
            $this->assign('username',$username);
            $this->assign('sex',$sex);
            $model->register($username, $password, $sex);
            $model->createCart($username);
            Session::set('username',$username);
            Session::set('sex',$sex);
            $loginname = Session::get('username');
            $this->assign('loginname',$loginname);
            $address = $model->getUserAddress($username);
            $this->assign('address',$address);
            return view('user');
        }
        
    }
    public function logout() {
        Session::set('username',"");
        $this->redirect('index');
    }
    public function gotouser() {
        $username = Session::get('username');
        $this->assign('username',$username);
        $sex = Session::get('sex');
        $this->assign('sex',$sex);
        $model = model('User');
        $cart = model('Cart');
        $address = $model->getUserAddress($username);
        $this->assign('address',$address);
        $cart->showCart($username);
        return view('user');
    }
    public function editAddress() {
        $username = Session::get('username');
        $address = input('post.address');
        $model = model('User');
        $model->editAddress($username, $address);
        $this->redirect('/index/gotouser');
    }
    public function addToCart() {
        $goodID = input('post.goodID');
        $username = Session::get('username');
        $model = model('Cart');
        $model->addToCart($goodID, $username);
        $this->redirect('/index/product');
    }
}

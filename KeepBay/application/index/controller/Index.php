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
        $find_user = $model->getUser($username);
        if ($find_user) {
            //echo($username);
            $this->assign('username',$username);
            Session::set('username',$username);
            $loginname = Session::get('username');
            $this->assign('loginname',$loginname);
            $current_user = $find_user[0];
            $this->assign('sex',$current_user['sex']);
            return view('user');
        } else {
            $loginname = Session::get('username');
            $this->assign('loginname',$loginname);
            echo "<script type='text/javascript' >alert('该用户不存在，请先登录')</script>";
            return view('index');
        }
        
    }
    public function register() {
        $username = input('post.username');
        $this->assign('username',$username);
        $password = input('post.password');
        $sex = input('post.sex');
        $this->assign('sex',$sex);
        //echo $username ."<br>". $password ."<br>". $sex;
        $model = model('User');
        $find_username = $model->getUser($username);
        if ($find_username) {
            $loginname = Session::get('username');
            $this->assign('loginname',$loginname);
            echo "<script type='text/javascript' >alert('该用户已存在')</script>";
            return view('index');
        } else {
            $data  = input("post.");
            $res = Db::execute("insert into user value(:username, :password, :sex)", $data);
            Session::set('username',$username);
            Session::set('sex',$sex);
            $loginname = Session::get('username');
            $this->assign('loginname',$loginname);
            return view('user');
        }
        
    }
    public function logout() {
        Session::set('username',"");
        $loginname = Session::get('username');
        $this->assign('loginname',$loginname);
        return view('index');
    }
    public function gotouser() {
        $username = Session::get('username');
        $this->assign('username',$username);
        $sex = Session::get('sex');
        $this->assign('sex',$sex);
        return view('user');
    }
    
}

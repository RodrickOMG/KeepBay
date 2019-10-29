<?php
namespace app\index\controller;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function product()
    {
    	return view('product');
    }
    public function contact()
    {
    	return view('contact');
    }
    public function login()
    {
        return view('login');
    }
    public function getUserInfo() {
        $username = input('post.username');
        echo($username);
    }
    public function register() {
        $username = input('post.username');
        $password = input('post.password');
        $sex = input('post.sex');
        echo $username ."<br>". $password ."<br>". $sex;
    }
}

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
    public function services()
    {
    	return view('services');
    }
    public function contact()
    {
    	return view('contact');
    }
}

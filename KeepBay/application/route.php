<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;


Route::rule('/product/','"/index/Index/product');
Route::rule('/contact/','"/index/Index/contact');
Route::rule('/gotouser/','"/index/Index/gotouser');
Route::rule('/login/','"/index/Index/login');
Route::rule('/register/','"/index/Index/register');
Route::rule('/logout/','"/index/Index/logout');
Route::rule('/editAddress/','"/index/Index/editAddress');
Route::rule('/addToCart/','"/index/Index/addToCart');
Route::rule('/createOrder/','"/index/Index/createOrder');
Route::rule('/orderDetails/','"/index/Index/orderDetails');

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];

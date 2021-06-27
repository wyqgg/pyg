<?php
use \think\Route;

//域名路由
Route::domain('adminapi',function (){
    //设置该子域名默认首页 即访问adminapi.pyg.com首页是跳转的页面
    Route::get('/','adminapi/index/index');
    //获取验证码接口
    Route::get('captcha/[:id]', "\\think\\captcha\\CaptchaController@index");
    Route::get('captcha','adminapi/login/captcha');
    //登陆接口
    Route::post('login','adminapi/login/login');
    //登出接口
    Route::get('logout','adminapi/login/logout');
    //权限接口
    Route::resource('auths','adminapi/auth',[],['id'=>'\d+']);
    //获取权限菜单
    Route::get('nav','adminapi/auth/nav');
    //角色接口
    Route::resource('roles','adminapi/role',[],['id'=>'\d+']);
    //管理员接口
    Route::resource('admins','adminapi/admin',[],['id'=>'\d+']);
    //商品分类接口
    Route::resource('categorys','adminapi/category',[],['id'=>'\d+']);
    //商品模型接口
    Route::resource('types','adminapi/types',[],['id'=>'\d+']);
});

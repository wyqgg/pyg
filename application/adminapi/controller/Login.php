<?php

namespace app\adminapi\controller;

use app\common\model\Admin;
use think\Controller;
use tools\jwt\Token;

class Login extends Baseapi
{
    //获取验证码
    public function captcha(){
       $uniqid = uniqid(mt_rand(10000,99999));
       $res = [
           'src' => captcha_src($uniqid),
           'uniqid' => $uniqid
       ];
        $this->ok($res,'获取成功');
    }
    //登陆接口
    public function login(){
      //接收参数
        $params = input();
        //参数检测
       $validate = $this->validate($params,[
           'username|用户名' => 'require',
           'password|密码' => 'require',
           'uniqid|验证码标识' => 'require',
           'code|验证码' => 'require'
       ]);
       if ($validate !== true){
           $this->fail($validate);
       }
       $session_id = cache('session_id_'.$params['uniqid']);
       if ($session_id){
           session_id($session_id);
       }

        //手动验证码校验
       if (!captcha_check($params['code'],$params['uniqid'])){
           $this->fail('验证码错误');
       }
        //数据处理
        $model = new Admin();
        $res = $model->where(['username'=>$params['username'],'password'=>encrypt($params['password'])])->find();
        //获取token令牌
        $token = Token::getToken($res['id']);
        //返回数据 token令牌 user_id 用户id username 用户名 nickname 用户昵称 email 用户邮箱
        $data = [
            'token' => $token,
            'user_id' => $res['id'],
            'username' => $res['username'],
            'nickname' => $res['nickname'],
            'email' => $res['email']
        ];
        $this->ok($data);
    }
    //登出接口
    public function logout(){
        //清空token  将需清空的token存入缓存，再次使用时，会读取缓存进行判断
        $token = Token::getRequestToken();
        $delete_token = cache('delete_token') ?: [];
        $delete_token[] = $token;
        cache('delete_token', $delete_token, 86400);
        $this->ok();
    }
}

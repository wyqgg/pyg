<?php

namespace app\home\controller;

use app\common\model\User;
use think\Controller;
use think\Request;

class Login extends Controller
{
    //渲染登录页面
    public function login(){
        $this->view->engine->layout(false);
        return view();
    }
    //渲染注册页面
    public function register(){
        $this->view->engine->layout(false);
        return view();
    }
    //手机验证码注册账号
    public function phone(){
        //接受参数
        $params = input();
        //参数检测
        $validate = $this->validate($params,[
            'phone|手机号' => 'require|regex:1[3-9]\d{9}|unique:user,phone',
            'code|验证码' => 'require|length:4',
            'password|密码' => 'require|length:6,20|confirm:repassword'
        ]);
        //参数验证
        if ($validate !== true){
            $this->error($validate);
        }
        //验证码检验
        $code = cache('register_code_'.$params['phone']);

        if ($code != $params['code']){
            $this->error('验证码错误');
        }
        //校验完成验证码失效
        cache('register_code_'.$params['phone'],null);
        //数据处理
        $params['password'] = encrypt1($params['password']);
        $params['username'] = $params['phone'];
        User::create($params,true);
        //跳转页面
        $this->redirect('home/login/login');
    }
    //发送验证码
    public function sendcode(){
        //接收参数
        $params = input();
        //参数检测
        $validate = $this->validate($params,[
            'phone|手机号' => 'require|regex:1[3-9]\d{9}'
        ]);
        if ($validate !== true){
            $res= [
              'code' =>  440,
              'msg' => '参数错误！'
            ];
            echo json_encode($res);die;
        }
        //检测发送时间间隔是否太频繁
        $time = cache('register_time_'.$params['phone']);
        if (time()-$time < 60){
            $res =[
                'code'=>'403',
                'msg'=>'发送验证码太频繁!'
            ];
            echo json_encode($res);die;
        }
        //发送信息内容
        $code = mt_rand(1000,9999);
        $content = "【凯信通】您的验证码是：{$code}";
        //发送信息
        // $suc = send_msg($params['phone'],$content);
        //测试
        $suc = true;
        //返回数据
        if ($suc){
            //存验证码
            cache('register_code_'.$params['phone'] ,$code,180);
            //存储时间
            cache('register_time_'.$params['phone'],time(),180);
            $res = [
                'code'=>200,
                'msg'=>'短信发送成功',
                'data'=>$content
            ];
            echo json_encode($res);die;
        }else{
            $res= [
                'code' =>  404,
                'msg' => '发送信息失败！'
            ];
            echo json_encode($res);die;
        }
    }
    //登录网站
    public function dologin(){
        //参数检测
        $params = input();
        //参数验证
        $validate = $this->validate($params,[
            'username'=>'require',
            'password'=>'require|length:6,20'
        ]);
        if ($validate!==true){
            $this->error($validate);
        }
        $params['password'] = encrypt1($params['password']);
        //登录验证
        //当用户名为邮箱、电话号码、用户名时都可以登录。
        $res = User::where(function ($query)use($params){
            $query->where('username',$params['username'])->whereor('email',$params['username']);
        })->where('password',$params['password'])->find();
        //跳转页面
        if ($res){
            session('user_info',$res->toArray());
            $back_url = session('back_url')?:'home/index/index';
            $this->redirect($back_url);
        }else{
            $this->error('用户名或密码错误！');
        }
    }
    //退出网站
    public function logout(){
        session('user_info',null);
        $this->redirect('home/login/login');
    }
}

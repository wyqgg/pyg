<?php

namespace app\adminapi\controller;

use app\adminapi\logic\AuthLogic;
use think\Controller;
use think\Exception;
use tools\jwt\Token;

class Baseapi extends Controller
{
    protected $no_login = ['login/login', 'login/captcha'];
    //初始化方法
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        //允许的源域名
        header("Access-Control-Allow-Origin: *");
        //允许的请求头信息
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        //允许的请求类型
        header('Access-Control-Allow-Methods: GET, POST, PUT,DELETE,OPTIONS,PATCH');

        try{
        //定义不需要登陆检验的模块
        $path = strtolower($this->request->controller()) . '/' . $this->request->action();
        if (!in_array($path,$this->no_login)){
            $user_id = Token::getUserId();
            //测试数据
            // $user_id = 1;
            if (empty($user_id)){
                $this->fail('未登录或Token令牌无效');
            }
            //权限检测
            $auth = AuthLogic::auth_check();
            if (! $auth){
                $this->fail('没有权限访问！');
            }
            //将获取的用户id 设置到请求信息中
            $this->request->get(['user_id'=>$user_id]);
            $this->request->post(['user_id'=>$user_id]);
//            dump($this->request->param());
        }

        }catch (Exception $e){
            $this->fail("服务异常，请检查token令牌");
        }
    }
    /*
     * 通用响应
     * @params int code 响应码
     * @params string $msg 响应描述
     * @params string $data 响应数据
     */
    public function response($code=200,$msg="success",$data=[])
    {
            $res = [
                'code' => $code,
                'msg' => $msg,
                'data' => $data
            ];
            echo json_encode($res,JSON_UNESCAPED_UNICODE);die;
    }
    /*
     * 成功响应
     * @params int code 响应码
     * @params string $msg 响应描述
     * @params string $data 响应数据
     */
    public function ok($data=[],$msg="success",$code=200){
        $this->response($code,$msg,$data);
    }
    /*
     * 失败响应
     * @params int code 响应码
     * @params string $msg 响应描述
     */
    public function fail($msg="fail",$code="500"){
        $this->response($code,$msg);
    }
}

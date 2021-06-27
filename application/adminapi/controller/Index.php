<?php
namespace app\adminapi\controller;

use think\Db;
use tools\jwt\Token;

class Index extends Baseapi
{
    public function index()
    {
//       echo encrypt(123456); die;
//        $res = ['id'=>200,"name"=>"yueyeu"];
//        $this->response(200,"success",$res);
//        $this->ok($res);
//        $this->fail();
//       $res = Db::table("pyg_category")->find();
//        dump($res);
        $user_id = Token::getToken(1);
        dump($user_id);
        $user_id1 = Token::getUserId($user_id);
        dump($user_id1);
    }

}

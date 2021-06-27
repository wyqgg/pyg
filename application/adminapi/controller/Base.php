<?php

namespace app\adminapi\controller;

use think\Controller;

class Base extends Controller
{
    //
    public function ok($data = []){
        return json(['code'=>200 , 'message'=>'success' , 'data' => $data]);
    }
    public function fail($code = 401,$message = "fail"){
        return json(['code'=>$code,'message'=>$message]);
    }
}

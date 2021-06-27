<?php
namespace app\home\controller;

class Index extends Base
{
    public function index()
    {
        // $lives = \app\common\model\Live::order('id desc')->limit(6)->select();
        $list = \app\common\model\Goods::where('delete_time',null)->select();

        // var_dump($list);die;
        //渲染模板
        return view('index',['list' => $list]);
    }
}

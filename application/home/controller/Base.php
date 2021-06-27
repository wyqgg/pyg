<?php

namespace app\home\controller;

use think\Controller;
use think\Request;

class Base extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        //查询分类信息
        $category = \app\common\model\Category::select();
        //转化为标准的二维数组
        $category = (new \think\Collection($category))->toArray();
        //转化为父子级树状结构
        $category = get_tree_list($category);
        //变量赋值
        if (!session('user_info')) {
            $cart_num1 = 0;
        } else {
            $cart_num1 = 0;
            $cart_num = \app\common\model\Cart::where(['user_id'=>session('user_info.id')])->select();
            foreach ($cart_num as $k=>$v){
            $cart_num1+=$v['number'];
        }
            
        }
        
        
        $this->assign(['category'=> $category,'cart_num' => $cart_num1]);
    }
}

<?php

namespace app\home\controller;

use think\Controller;

class Goods extends Base
{
    public function index($id=0)
    {
        //接收参数
        $keywords = input('keywords');
        if(empty($keywords)){
            //获取指定分类下商品列表
            if(!preg_match('/^\d+$/', $id)){
                $this->error('参数错误');
            }
            //查询分类下的商品
            $list = \app\common\model\Goods::where('cate_id', $id)->order('id desc')->paginate(10);
            
            $lists = \app\common\model\Goods::limit(4)->where('delete_time',null)->select();
            //查询分类名称
            $category_info = \app\common\model\Category::find($id);
            $cate_name = $category_info['cate_name'];
        }else{
            try{
                //从ES中搜索
                $list = \app\home\logic\GoodsLogic::search();
                $cate_name = $keywords;
            }catch (\Exception $e){
               $msg = $e->getMessage();
                $this->error($msg);
            }
        }
        return view('index', ['list' => $list, 'cate_name' => $cate_name]);
        // return view('index');
    }

    //商品详情页
    public function detail($id)
    {
        //$id 是商品id
        //查询商品信息、商品相册、规格商品SKUwith('goods_images,spec_goods')
        $goods = \app\common\model\Goods::find($id);
        $lists = \app\common\model\Goods::limit(3)->where('delete_time',null)->select();
        return view('detail', ['goods' => $goods,'lists'=>$lists]);
    }
}

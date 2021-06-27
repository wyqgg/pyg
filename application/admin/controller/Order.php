<?php

namespace app\admin\controller;

use app\admin\model\GoodsAttr;
use app\admin\model\OrderGoods;
use think\Controller;
use think\Request;

class Order extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //查询订单表数据
        $list = \app\admin\model\Order::with('user')->order('id desc')->paginate(10);
        return view('order', ['list' => $list]);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //查询订单基本信息
        $order = \app\admin\model\Order::with('user,order_goods')->find($id);


        if(!empty($order->shipping_sn)){
            $type = $order->shipping_code;
            $postid = $order->shipping_sn;
        }

        return view('order-detail', ['order' => $order]);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
        $order = \app\admin\model\Order::destroy($id);
        $list = \app\admin\model\Order::with('user')->order('id desc')->paginate(10);
        return view('order', ['list' => $list]);
    }
}

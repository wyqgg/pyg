<?php
namespace app\home\logic;

class OrderLogic{

    /**
     * 获取选中的购物记录以及商品信息，统计总数量和价格
     */
    public static function getCartDataWithGoods()
    {
        $user_id = session('user_info.id');
        $cart_data = \app\common\model\Cart::with('goods')->where('is_selected', 1)->where('user_id', $user_id)->select();
        // var_dump($cart_data);die;
        $cart_data = (new \think\Collection($cart_data))->toArray();
        $total_price = 0;
        $total_number = 0;
        foreach($cart_data as &$v){
            //库存处理
            if(isset($v['store_count']) && $v['store_count']>0){
                $v['goods_number'] = $v['store_count'];
            }
            if(isset($v['store_frozen']) && $v['store_frozen']>0){
                $v['frozen_number'] = $v['store_frozen'];
            }
            //累加总数量和总价格
            $total_number += $v['number'];
            $total_price += $v['number'] * $v['goods_price'];
        }
        unset($v);
        return [
            'cart_data' => $cart_data,
            'total_number' => $total_number,
            'total_price' => $total_price
        ];
    }
}
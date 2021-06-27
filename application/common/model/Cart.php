<?php

namespace app\common\model;

use think\Model;

class Cart extends Model
{
    //设置购物车-商品关联  一条购物车记录 属于 一个商品
    public function goods()
    {
        return $this->belongsTo('Goods', 'goods_id', 'id')->bind('goods_logo,goods_name,goods_price,goods_number,cost_price,frozen_number');
    }

}

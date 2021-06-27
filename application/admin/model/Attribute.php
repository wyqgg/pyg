<?php

namespace app\admin\model;

use think\Model;

class Attribute extends Model
{

    protected $hidden = ['create_time', 'update_time', 'delete_time'];
    public function getAttrValuesAttr($value)
    {
        if (empty($value)) {
           return [];
        } else {
          $value = unserialize($value);
        return $value;  
        }
        
        
        // return $value ? explode(',', $value) : [];
    }
}

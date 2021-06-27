<?php

namespace app\admin\model;

use think\Model;

class Spec extends Model
{

    protected $hidden = ['create_time', 'update_time', 'delete_time'];
    // public function specValues(){
    //     return $this->hasMany('SpecValue');
    // }
    
    public function specValue(){
        return $this->hasMany('specValue','spec_id');
    }
}

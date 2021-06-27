<?php

namespace app\common\model;

use think\Model;

class Admin extends Model
{
    //定义 管理员-档案的关联  一个管理员有一个档案
    public function profile()
    {
        //一对一关联模型
        // return $this->hasOne('Profile','uid','id');
        //将指定数据绑定到父级模型
        return $this->hasOne('Profile','uid','id')->bind(['idnum','card']);
        //第二个参数外键 默认是admin_id; 第三个参数主键默认是id
        // return $this->hasOne('Profile', 'uid', 'id');
//        return $this->hasOne('Profile', 'uid', 'id')->bind('idnum');
    }
}

<?php
namespace app\adminapi\logic;

use app\common\model\Admin;
use app\common\model\Auth;
use app\common\model\Role;

class AuthLogic{
    public static function auth_check(){
        //判断是否特殊页面（比如首页，不需要检测）
        $controller = request()->controller();
        $action = request()->action();
        if ($controller == "Index" && $action == 'index'){
            return true;
        }
        //获取到管理员的角色id
        $id = input('user_id');
        $admin = Admin::find($id);
        //判断是否超级管理员（超级管理员不需要检测）
        if ($admin['role_id'] == 1){
            return true;
        }
        //查询当前管理员所拥有的权限ids（从角色表查询对应的role_auth_ids）
        $role = Role::find($admin['role_id']);
        $auth_id = explode(',',$role['role_auth_ids']);
        //根据当前访问的控制器、方法查询到具体的权限id
        $auth = Auth::where('auth_c',$controller)->where('auth_a',$action)->find();
        //判断当前权限id是否在role_auth_ids范围中。
        if (in_array($auth['id'],$auth_id)){
            return true;
        }
        return false;
    }
}
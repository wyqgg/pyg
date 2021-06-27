<?php

namespace app\adminapi\controller;

use app\common\model\Admin;
use app\common\model\Role;
use think\Collection;
use think\Controller;
use think\Request;
use tools\jwt\Token;

class Auth extends Baseapi
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
//        die('111');
        //接收数据
        $params = input();
        //数据检验
        $where = [];
        if (!empty($params['keyword'])){
            $where['auth_name'] = ['like' , "%{$params["keyword"]}%"];
        }
//        dump($params);die;
        //数据操作
        $list = \app\common\model\Auth::where($where)->field('id,auth_name,pid,pid_path,auth_c,auth_a,is_nav,level')->select();
        $list = (new Collection($list))->toArray();
//        dump($list);die;
        if (!empty($params['type']) && $params['type'] == 'tree'){
               $list = get_tree_list($list);
        }else{
               $list = get_cate_list($list);
        }
        //返回数据
        $this->ok($list);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //接收参数
        $params = input();
        //数据验证
        if (empty($params['pid'])){
            $params['pid'] = 0;
        }
        if (empty($params['is_nav'])){
            $params['is_nav'] = $params['radio'];
        }
        $validate = $this->validate($params,[
            'auth_name|权限名' => 'require',
            'pid|父级权限id' => 'require',
//            'auth_c' => '',
//            'auth_a' => '',
            'is_nav|是否菜单权限' => 'require',
        ]);
        //数据处理
        if ($validate !== true){
            $this->fail($validate);
        }
        if ($params['pid'] == 0){
            $params['auth_c'] = '';
            $params['auth_a'] = '';
            $params['pid_path'] = 0;
            $params['level'] = 0;
        }else{
            //获取父权限信息
            $pid_info = \app\common\model\Auth::where('id',$params['pid'])->find();
            //数据处理
            $params['level'] = $pid_info['level'] + 1;
            $params['pid_path'] =$pid_info['pid_path'] .'_'. $params['pid'];
        }
        //数据修改
        $auth = \app\common\model\Auth::create($params,true);
        $info = \app\common\model\Auth::field('id,auth_name,pid,pid_path,auth_c,auth_a,is_nav,level')->find($auth['id']);
        //返回数据
        $this->ok($info);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
        //接收数据
        $params = input();
        //数据处理
        if (empty($params['id'])){
            $this->fail('请求错误');
        }else{
            $lists = \app\common\model\Auth::field('id,auth_name,pid,pid_path,auth_c,auth_a,is_nav,level')->find($id);
        }
        $this->ok($lists);
        //数据操作
        //返回数据
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
        //接收数据
        $params = input();
        if (empty($params['is_nav'])){
            $params['is_nav'] = $params['radio'];
        }
        if (empty($params['pid'])){
            $params['pid'] = 0;
        }
        //数据处理
        $validate = $this->validate($params,[
            'auth_name|权限名' => 'require',
            'pid|父级权限id' => 'require',
//            'auth_c' => '',
//            'auth_a' => '',
            'is_nav|是否菜单权限' => 'require',
        ]);
        if ($validate !== true){
            $this->ok($validate);
        }
        //数据处理
        //pid,pid_path,level
        $auth = \app\common\model\Auth::find($id);
        if (empty($auth)){
            $this->fail('数据异常');
        }
        if ($params['pid'] == 0) {
            $params['level'] =  1;
            $params['pid_path'] = 0;
        }elseif($auth['pid'] != $params['pid']){
            //获取上级权限信息
            $p_auth = \app\common\model\Auth::find($params['pid']);
            $params['level'] = $p_auth['level'] + 1;
            $params['pid_path'] = $p_auth['pid_path'] ."_". $p_auth['id'];
        }
        //数据修改
        \app\common\model\Auth::update($params,['id'=>$id],true);
        //返回数据
        $info = \app\common\model\Auth::field('id,auth_name,pid,pid_path,auth_c,auth_a,is_nav,level')->find($id);
        $this->ok($info);
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //判断是否有子权限
        $total = \app\common\model\Auth::where('pid',$id)->count();
        if ($total >0){
            $this->fail('有子权限，不能删除');
        }
        //删除数据
        \app\common\model\Auth::destroy($id);
        //返回数据
        $this->ok();
    }

    /*
     * 获取权限菜单
     */
    public function nav(){
        //获取user_id
        $user_id = input('user_id');
        //获取该用户信息
//        dump($user_id);die;
        $info = Admin::find($user_id);
        //如果用户角色为超级管理员
        if ($info['role_id'] == 1){
            $data = \app\common\model\Auth::field('id,auth_name,pid,pid_path,auth_c,auth_a,is_nav,level')->where('is_nav',1)->select();
        }else{
            //查看用户角色权限
            $roles = Role::find($user_id);
            //查看角色权限
            $data = \app\common\model\Auth::field('id,auth_name,pid,pid_path,auth_c,auth_a,is_nav,level')->where('is_nav',1)->where('id','in',$roles['role_auth_ids'])->select();
        }
        //返回数据
//        dump($data);
        $data = (new Collection($data))->toArray();
        $data = get_tree_list($data);
        $this->ok($data);
    }
}

<?php

namespace app\adminapi\controller;

use app\common\model\Admin;
use think\Collection;
use think\Controller;
use think\Request;

class Role extends Baseapi
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //获取全部角色field('id,role_name,desc')->
        $data = \app\common\model\Role::select();
        //获取角色权限
        foreach ($data as $k=>$v) {
            $data[$k]['role_auths'] = \app\common\model\Auth::field('id,auth_name,pid,pid_path,auth_c,auth_a,is_nav,level')->where('id', 'in', $data[$k]['role_auth_ids'])->select();
//            dump($data[$k]['role_auth_ids']);
            $data[$k]['role_auths'] = (new Collection($data[$k]['role_auths']))->toArray();
            $data[$k]['role_auths'] = get_tree_list($data[$k]['role_auths']);
        }
        unset($v);
        $this->ok($data);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //接收数据
        $params = input();
        //数据验证

        $validate = $this->validate($params,[
            'role_name|角色名称' => 'require',
            'desc|角色简介' => 'require',
            'auth_ids|拥有的权限ids' => 'require'
        ]);
        if ($validate != true){
            $this->fail($validate);
        }
        //数据处理
        $role = \app\common\model\Role::create($params,true);
//        dump($role);die;
        //获取新增数据
        $data = \app\common\model\Role::find($role['id']);
        //返回数据

        $this->ok($data);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //查询该id角色的数据
        $role = \app\common\model\Role::field('id,role_name,desc,role_auth_ids')->find($id);
        if (empty($role)){
            $this->fail("数据异常");
        }
        $this->ok($role);
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
        //获取数据
        $params = input();
        $params['role_auth_ids'] = $params['auth_ids'];
        //参数验证
        $validate = $this->validate($params,[
            'role_name|角色名称' => 'require',
            'desc|角色简介' => 'require',
            'auth_ids|拥有的权限ids' => 'require'
        ]);
        if ($validate != true){
            $this->fail($validate);
        }
        //数据修改
        \app\common\model\Role::update($params,['id'=>$id],true);
        //查询修改数据
        $role = \app\common\model\Role::field('id,role_name,desc,role_auth_ids')->find($id);
        $this->ok($role);
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //删除数据
        //删除条件
        //1.超级管理员不能删除
        if ($id == 1){
            $this->fail('超级管理员不能删除');
        }
        //正在使用的角色不能删除
        $count = Admin::where('role_id',$id)->count();
        if ($count > 0){
            $this->fail('该角色正在使用无法删除');
        }
        \app\common\model\Role::destroy($id);
        $this->fail("删除角色成功！");
    }
}

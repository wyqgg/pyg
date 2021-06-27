<?php

namespace app\adminapi\controller;

use think\Controller;
use think\Request;

class Admin extends Baseapi
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        
        
        //关联模型with关联
        // $admins = \app\common\model\Admin::with('profile')->find(1);
        // $admins = \app\common\model\Admin::with('profile')->select();
        $profile = \app\common\model\Profile::with('admin')->find(1);
        //关联模型查找关联数据
        $this->ok($profile);
        
        
        //接收参数
        $params = input();
        $where = [];
        if (!empty($params['keyword'])){
            $where['username'] = ['like' , "%".$params['keyword']."%"];
        }
        //查询数据
        $data = \app\common\model\Admin::where($where)->paginate(2);
        $admin = new \app\common\model\Admin();
        $data = $admin->alias('t1')->join('book_role t2','t1.role_id = t2.id','left')
            ->where($where)
            ->field('t1.id,t1.username,t1.email,t1.nickname,t1.last_login_time,t1.status,t2.role_name')
            ->paginate(10);
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
            'username|用户名'=>'require|unique:admin',
            'email|邮箱'=>'require|email',
            'role_id|用户角色id'=>'require|integer|gt:0',
            'password|密码'=>'length:6,20'
        ]);
        if ($validate !== true){
            $this->fail($validate);
        }
        $params['password'] = encrypt($params['password']);
        //数据操作
        $admin = \app\common\model\Admin::create($params,true);
//        $admin = new \app\common\model\Admin();
//        $user_id=$admin->insert($params,true);
//        dump($admin);die;

        //返回数据
        $list = \app\common\model\Admin::field('id,email,username,nickname,last_login_time,status,role_id')->find($admin['id']);
        $this->ok($list);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //查询数据
        $admin = \app\common\model\Admin::field('id,email,username,nickname,last_login_time,status,role_id')->find($id);
        if (empty($admin))
        {
            $this->fail('数据异常');
        }
        $this->ok($admin);
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
        //接收数据
//        dump('111');die;
        if ($id ==1){
            $this->fail('超级管理员，不能修改');
        }
        $params = input();
        //数据验证
        if (!empty($params['type']) && $params['type'] == 'reset_pwd '){
            $password = encrypt('123456');
           \app\common\model\Admin::update(['password' => $password],['id' => $id],true);
        }else{
            $validate = $this->validate($params,[
                'nickname|用户名'=>'require',
                'email|邮箱'=>'require|email',
                'role_id|用户角色id'=>'require|integer|gt:0',
            ]);

            if ($validate !== true){
                $this->fail($validate);
            }
            //数据操作
            unset($params['username']);
            unset($params['password']);
            \app\common\model\Admin::update($params,['id' => $id],true);
        }

        //返回数据
        $list = \app\common\model\Admin::field('id,email,username,nickname,last_login_time,status,role_id')->find($id);
        $this->ok($list);
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
        if($id == input('user_id')){
            $this->fail('不能删除自己！');
        }
        if ($id == 1){
            $this->fail('超级管理员不能删除！');
        }
        //数据操作
        \app\common\model\Admin::destroy($id);
        //返回数据
        $this->ok();
     }
}

<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class User extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //接受参数
        
        //参数检验
        //获取数据
        $where = [];
        $keyword = input('keyword');
        if(!empty($keyword)){
            $where['username'] = ['like', "%$keyword%"];
        }
        $list = \app\admin\model\User::where($where)->paginate(2);
        //渲染页面
        $this->assign('list', $list);
        // var_dump($list);die;
        return view('user');
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
        //
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
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //接受数据
        //数据验证
        if (empty($id)) {
            $this->fail("编辑失败！");
        }
        //查询数据
        $info = \app\admin\model\User::find($id);
        $this->assign('info',$info);
        return view('user-edit');
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
        //接受数据
        $params = $request->param();
        //数据检验
        $validate = $this->validate($params,[
            'id' => 'require',
            'username' => 'require',
            'email' => 'email',
            'phone' => 'length:11'
        ]);
        // var_dump($params);die;
        if ($validate!==true) {
            $this->fail($validate);
        }
        // var_dump($params);die;
        //数据操作,'figure_url'=>$params['logo']
        // if (!empty($params['logo'])) {
        //     $file = request()->file('logo');
        //     $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'.'user');
        //     if ($info) {
        //         $path = $info->getExtension();
        //     }else{
        //         $this->fail($file->getError());
        //     }
        // }
        $path = $this->upload_logo();
        $lists = \app\admin\model\User::where('id',$params['id'])->update(['username'=>$params['username'],'phone'=>$params['phone'],'email'=>$params['email'],'figure_url'=>$path]);
        if (!$lists) {
            $this->fail('更新失败！');
        }

        return json(['code' => '200', 'msg' => '操作成功']);
    }

    //图片上传
    protected function upload_logo()
    {
        //获取文件信息（对象）
        $file = request()->file('logo1');
        // var_dump($file);die;
        if (empty($file)) {
            //必须上传logo图片
            return ['必须上传logo图片'];
        }
        //将文件移动到指定的目录（public 目录下  uploads目录）
        $info = $file->validate(['size' => 10*1024*1024, 'ext' => ['jpg', 'png', 'gif', 'jpeg']])->move(ROOT_PATH . 'public' . DS . 'uploads');
        if (empty($info)) {
            //上传出错
            return [$file->getError()];
        }
        //拼接图片的访问路径
        $logo = DS . "uploads" . DS . $info->getSaveName();
        //生成缩略图
        $image = \think\Image::open('.' . $logo);
        //调用thumb方法生成缩略图并保存（直接覆盖原始图片）
        $image->thumb(20, 20)->save('.' . $logo);
        return $logo;
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
    }
}

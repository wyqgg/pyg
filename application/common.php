<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
if(!function_exists("encrypt1")){
    function encrypt1($psd){
            $salt = "asdasdasd";
            $password = md5($salt.md5($psd));
            return $password;
    }
}

if (!function_exists('get_cate_list')) {
    //递归函数 实现无限级分类列表
    function get_cate_list($list,$pid=0,$level=0) {
        static $tree = array();
        foreach($list as $row) {
            if($row['pid']==$pid) {
                $row['level'] = $level;
                $tree[] = $row;
                get_cate_list($list, $row['id'], $level + 1);
            }
        }
        return $tree;
    }
}

if(!function_exists('get_tree_list')) {
    //引用方式实现 父子级树状结构
    function get_tree_list($list)
    {
        //将每条数据中的id值作为其下标
        $temp = [];
        foreach ($list as $v) {
            $v['son'] = [];
            $temp[$v['id']] = $v;
        }
        //获取分类树
        foreach ($temp as $k => $v) {
            $temp[$v['pid']]['son'][] = &$temp[$v['id']];
        }
        return isset($temp[0]['son']) ? $temp[0]['son'] : [];
    }
}
//发送请求函数
if (!function_exists('curl_request')){
    function curl_request($url,$post=true,$params=[],$https=true){
        //初始化请求会话
        $ch = curl_init($url);
        if ($post){
            //设置请求方式为post
            curl_setopt($ch,CURLOPT_POST,true);
            //设置请求参数
            curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
        }
        if ($https){
            //如果是https协议，禁止服务器验证本地证书
            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        }
        //发送请求，获取返回参数
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $res = curl_exec($ch);
        //关闭请求
        curl_close($ch);
        return $res;
    }
}

//调用发送短信接口函数
if (!function_exists('send_msg')){
    function send_msg($mobile,$content){
        //获取config中的地址和appkey
        $appkey = config('msg.appkey');
        $url = config('msg.url');
        // var_dump($appkey);die;
        //拼接请求地址https://way.jd.com/chuangxin/dxjk?mobile=13568813957&content=【创信】你的验证码是：5873，3分钟内有效！&appkey=您申请的APPKEY 点此获取APPKEY
        // $url = $url . '?appkey=' .$appkey;
        //get请求
        $url .= '?mobile='.$mobile.'&content='.$content.'&appkey='.$appkey;
        //post请求
        $params = [
            'mobile'=>$mobile,
            'content'=>$content
        ];
        // var_dump($url);die;
        
        $res = curl_request($url,false,[],true);
        if(!$res){
            return "短信发送失败!";
        }
        $arr = json_decode($res,true);
    //   var_dump($arr);die;
        if (isset($arr['code']) && $arr['code'] == 10000){
            return true;
        }else{
            return '短信发送失败!';
        }
    }
}
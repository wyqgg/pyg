<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:59:"D:\bc\pyg\public/../application/admin\view\admin\admin.html";i:1624517836;s:51:"D:\bc\pyg\application\admin\view\layout\layout.html";i:1617259112;s:50:"D:\bc\pyg\application\admin\view\layout\_meta.html";i:1617259086;s:52:"D:\bc\pyg\application\admin\view\layout\_footer.html";i:1617259249;s:53:"D:\bc\pyg\application\admin\view\layout\_header1.html";i:1619198410;s:52:"D:\bc\pyg\application\admin\view\layout\_menu_1.html";i:1619198538;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="favicon.ico" >
<LINK rel="Shortcut Icon" href="favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/static/admin/lib/html5.js"></script>
<script type="text/javascript" src="/static/admin/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/layui/src/css/layui.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script><![endif]-->


<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>

<script type="text/javascript" src="/static/admin/static/layui/src/layui.js"></script>

<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/static/admin/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/static/admin/static/h-ui.admin/js/H-ui.admin.page.js"></script>

<body>
<div class="layui-layout layui-layout-admin" style="margin-top:20px;">
<div class="layui-header">
    <div style="color:white;font-size:28px;text-algin:center">书籍交易后台管理系统</div>
  <ul class="layui-nav layui-layout-right">
							<li class="layui-nav-item"><a href="<?php echo url('login/logout'); ?>">切换账户</a></li>
							<liv class="layui-nav-item"><a href="<?php echo url('login/logout'); ?>">退出</a></li>
						</ul>
  </div>
  </div>
  <script>
layui.use('element', function(){
  var element = layui.element;
  
});
</script>
 <div class="layui-side layui-bg-black" style="backgroud-color:#009688;">
    <div class="layui-side-scroll" >
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul style="margin-top:60px" class="layui-nav layui-nav-tree"   lay-filter="test">
       <?php foreach($nav as $k => $nav_one): foreach($nav_one['son'] as $kk=>$nav_two): ?> 
	     <li class="layui-nav-item">
              <a href="javascript:;"><?php echo $nav_two['auth_name']; ?></a>
              <dl class="layui-nav-child">
                <?php foreach($nav_two['son'] as $nav_three): ?>
                <dd><a href="<?php if(($nav_three['auth_c']&&$nav_three['auth_a'])): ?><?php echo url($nav_three['auth_c'] . '/' . $nav_three['auth_a']); else: ?>javascript:;<?php endif; ?>"><?php echo $nav_three['auth_name']; ?></a></dd>
                <?php endforeach; ?>
              </dl>
            </li>
         	<?php endforeach; endforeach; ?> 
		</ul>
      
    </div>
  </div>
  <script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;
  
});
</script>

﻿
	<title>管理员列表 - 管理员列表</title>
	<style type="text/css">
		.pagination li{
		    list-style:none;float:left;margin-left:10px;
			padding:0 10px;
			background-color:#009688;
			border:1px solid #ccc;
			height:26px;
			line-height:26px;
			cursor:pointer;
			color:#fff;
		}
		.pagination li a{color:white;padding: 0;line-height: inherit;border: none;}
		.pagination li a:hover{background-color: #009688;}
		.pagination li.active{background-color:white;color:#009688;}
		.pagination li.disabled{background-color:white;color:#009688;}
	</style>

<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		管理员管理
		<span class="c-gray en">&gt;</span>
		管理员列表 <i class="Hui-iconfont">&#xe68f;</i> </nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="text-c">
				<form class="Huiform" method="get" action="<?php echo url('index'); ?>" target="_self">
					<input type="text" class="input-text" style="width:250px" placeholder="输入管理员名称" id="" name="keyword" value="<?php echo \think\Request::instance()->param('keyword'); ?>">
					<button type="submit" class="btn btn-success" style="background-color:#009688;" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
				</form>
			</div>
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l"><a href="javascript:;" style="background-color:#009688;" id="add" data-url="<?php echo url('create'); ?>" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a> </span>
				<span class="r">共有数据：<strong><?php echo $list->total(); ?></strong> 条</span>
			</div>
	<a href="<?php echo url('del_ela'); ?>">操作</a>
			<table class="table table-border table-bordered table-bg table-sort table-striped table-hover">
				<thead>
					<tr>
						<th scope="col" colspan="9">管理员列表</th>
					</tr>
					<tr class="text-c">
						<th width="25"><input type="checkbox" name="" value=""></th>
						<th width="40">ID</th>
						<th width="150">登录名</th>
						<th width="90">昵称</th>
						<th width="150">邮箱</th>
						<th>角色</th>
						<th width="130">加入时间</th>
						<th width="100">是否已启用</th>
						<th width="100">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($list as $v): ?>
					<tr class="text-c">
						<td><input type="checkbox" value="<?php echo $v['id']; ?>" name=""></td>
						<td><?php echo $v['id']; ?></td>
						<td><?php echo $v['username']; ?></td>
						<td><?php echo $v['nickname']; ?></td>
						<td><?php echo $v['email']; ?></td>
						<td><?php echo $v['role_name']; ?></td>
						<td><?php echo $v['create_time']; ?></td>
						<td class="td-status">
							<?php if(($v['status'] == 1)): ?>
							<span class="label label-success radius" onclick="admin_stop(this,<?php echo $v['id']; ?>)">已启用</span>
							<?php else: ?>
							<span class="label radius" onclick="admin_start(this,<?php echo $v['id']; ?>)">已禁用</span>
							<?php endif; ?>
						</td>
						<td class="td-manage">
							<a title="编辑" data-url="<?php echo url('edit', ['id'=>$v['id']]); ?>" href="javascript:;" class="ml-5 edit" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
							<a title="删除" data-url="<?php echo url('delete',['id'=>$v['id']]); ?>" href="javascript:;" class="ml-5 delete" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

			<div class="pd-20"><?php echo $list->render(); ?></div>
		</article>
	</div>

</section>

<script type="text/javascript" src="/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/static/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="/static/admin/logic/curd.js"></script>
<script type="text/javascript">

	/*
	 参数解释：
	 title	标题
	 url		请求的url
	 id		需要操作的数据id
	 w		弹出层宽度（缺省调默认值）
	 h		弹出层高度（缺省调默认值）
	 */
	/*管理员-停用*/
	function admin_stop(obj,id){
		layer.confirm('确认要停用吗？'+id,function(index){
			//此处请求后台程序，下方是成功后的前台处理……
            $.ajax({
                'url':"<?php echo url('admin/admin/stop'); ?>",
                'data':'id='+id,
                'type':'POST',
                'dataType':'JSON',
                'success':function(data){
                    if(data.code =='404'){
                        layer.msg(data.msg,{icon: 5,time:1000});  
                    }else{
                        $(obj).parents("tr").find(".td-status").html('<span onClick="admin_start(this,<?php echo $v['id']; ?>)"  class="label label-default radius">已禁用</span>');
        		    	$(obj).remove();
        			    layer.msg('已停用!',{icon: 5,time:1000});   
                    }
                }
            })
        			
                    
		});
	}

	/*管理员-启用*/
	function admin_start(obj,id){
		layer.confirm('确认要启用吗？',function(index){
			//此处请求后台程序，下方是成功后的前台处理……
            $.ajax({
                'url':"<?php echo url('admin/admin/start'); ?>",
                'data':'id='+id,
                'dataType':'JSON',
                'type':'POST',
                'success':function(msg){

                }
            })
			$(obj).parents("tr").find(".td-status").html('<span onClick="admin_stop(this,<?php echo $v['id']; ?>)"  class="label label-success radius">已启用</span>');
			$(obj).remove();
			layer.msg('已启用!', {icon: 6,time:1000});
		});
	}
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>

</body>
</html>
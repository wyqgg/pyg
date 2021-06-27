<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:66:"D:\bc\pyg\public/../application/admin\view\goods\product-list.html";i:1618212372;s:51:"D:\bc\pyg\application\admin\view\layout\layout.html";i:1617259112;s:50:"D:\bc\pyg\application\admin\view\layout\_meta.html";i:1617259086;s:52:"D:\bc\pyg\application\admin\view\layout\_footer.html";i:1617259249;s:53:"D:\bc\pyg\application\admin\view\layout\_header1.html";i:1619198410;s:52:"D:\bc\pyg\application\admin\view\layout\_menu_1.html";i:1619198538;}*/ ?>
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
<title>商品管理</title>
<style type="text/css">
    .pagination li{list-style:none;float:left;margin-left:10px;
        padding:0 10px;
        background-color:#5a98de;
        border:1px solid #ccc;
        height:26px;
        line-height:26px;
        cursor:pointer;color:#fff;
    }
    .pagination li a{color:white;padding: 0;line-height: inherit;border: none;}
    .pagination li a:hover{background-color: #5a98de;}
    .pagination li.active{background-color:white;color:gray;}
    .pagination li.disabled{background-color:white;color:gray;}
</style>
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 商品管理 </nav>

	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="text-c">
				<form class="Huiform" method="get" action="<?php echo url('index'); ?>" target="_self">
					<input type="text" placeholder="商品名称" name="keyword" value="<?php echo \think\Request::instance()->param('keyword'); ?>" class="input-text" style="width:120px">
					<button type="submit"  style="background-color:#009688;" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜商品</button>
				</form>
			</div>
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l">
					<a href="javascript:;" data-url="<?php echo url('delete'); ?>" id="patch_delete" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
					<a href="javascript:;" data-url="<?php echo url('create'); ?>"  style="background-color:#009688;" data-type="full" id="add" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加商品</a>
				</span>
				<span class="r">共有数据：<strong><?php echo $list->total(); ?></strong> 条</span> </div>
			<div class="mt-10">
				<table class="table table-border table-bordered table-bg table-sort">
					<thead>
					<tr class="text-c">
						<th width="3%"><input type="checkbox" name="" value=""></th>
						<th width="5%">ID</th>
						<th width="15%">商品名称</th>
						<th width="8%">商品单价</th>
						<th width="7%">库存</th>
						<th width="8%">LOGO</th>
						<th width="8%">分类</th>
						<th width="7%">销量</th>
						<th width="5%">上/下架</th>
						<th width="5%">包邮</th>
						<th width="5%">推荐</th>
						<th width="5%">新品</th>
						<th width="5%">热卖</th>
						<th width="8%">排序</th>
						<th width="">操作</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach($list as $v): ?>
					<tr class="text-c">
						<td><input name="" type="checkbox" value=""></td>
						<td><?php echo $v['id']; ?></td>
						<td><?php echo $v['goods_name']; ?></td>
						<td class="text-l"><?php echo $v['goods_price']; ?></td>
						<td class="text-l"><?php echo $v['goods_number']; ?></td>
						<td><img src="<?php echo $v['goods_logo']; ?>"></td>
						<td class="text-l"><?php echo $v['category']['pid_path_name']; ?></td>
						<td class="text-l"><?php echo $v['sales_num']; ?></td>
						<td class="text-l"><?php echo $v['is_on_sale']; ?></td>
						<td class="text-l"><?php echo $v['is_free_shipping']; ?></td>
						<td class="text-l"><?php echo $v['is_recommend']; ?></td>
						<td class="text-l"><?php echo $v['is_new']; ?></td>
						<td class="text-l"><?php echo $v['is_hot']; ?></td>
						<td class="text-l"><?php echo $v['sort']; ?></td>
						<td class="f-14 product-brand-manage">
							<a title="编辑" data-url="<?php echo url('edit', ['id'=>$v['id']]); ?>" href="javascript:;" class="ml-5 edit" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
							<a title="删除" data-url="<?php echo url('delete', ['id'=>$v['id']]); ?>" href="javascript:;" class="ml-5 delete" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
						</td>
					</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div><?php echo $list->render(); ?></div>
		</article>
	</div>
</section>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/static/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="/static/admin/logic/curd.js"></script>
<script type="text/javascript">
	// $('.table-sort').dataTable({
	// 	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	// 	"bStateSave": true,//状态保存
	// 	"aoColumnDefs": [
	// 		//{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	// 		{"orderable":false,"aTargets":[0,6]}// 制定列不参与排序
	// 	]
	// });
</script>
<!--/请在上方写此页面业务相关的脚本-->


</body>
</html>
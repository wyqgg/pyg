<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:59:"D:\bc\pyg\public/../application/admin\view\order\order.html";i:1619197894;s:51:"D:\bc\pyg\application\admin\view\layout\layout.html";i:1617259112;s:50:"D:\bc\pyg\application\admin\view\layout\_meta.html";i:1617259086;s:52:"D:\bc\pyg\application\admin\view\layout\_footer.html";i:1617259249;s:53:"D:\bc\pyg\application\admin\view\layout\_header1.html";i:1619198410;s:52:"D:\bc\pyg\application\admin\view\layout\_menu_1.html";i:1619198538;}*/ ?>
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
    <div style="color:white;font-size:28px;text-algin:center">??????????????????????????????</div>
  <ul class="layui-nav layui-layout-right">
							<li class="layui-nav-item"><a href="<?php echo url('login/logout'); ?>">????????????</a></li>
							<liv class="layui-nav-item"><a href="<?php echo url('login/logout'); ?>">??????</a></li>
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
      <!-- ??????????????????????????????layui???????????????????????? -->
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
//JavaScript????????????
layui.use('element', function(){
  var element = layui.element;
  
});
</script>

???
	<title>???????????? - ????????????</title>
	<style type="text/css">
		.pagination li{list-style:none;float:left;margin-left:10px;
			padding:0 10px;
			background-color:#5a98de;
			border:1px solid #ccc;
			height:26px;
			line-height:26px;
			cursor:pointer;
			color:#fff;
		}
		.pagination li a{color:white;padding: 0;line-height: inherit;border: none;}
		.pagination li a:hover{background-color: #5a98de;}
		.pagination li.active{background-color:white;color:gray;}
		.pagination li.disabled{background-color:white;color:gray;}
	</style>
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> ??????
		<span class="c-gray en">&gt;</span>
		????????????
		<span class="c-gray en">&gt;</span>
		???????????? <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="??????" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="text-c">
			</div>
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l"> <a href="javascript:;" class="btn btn-danger radius" id="patch_delete" data-url="<?php echo url('delete'); ?>"><i class="Hui-iconfont">&#xe6e2;</i> ????????????</a> </span>
				<span class="r">???????????????<strong><?php echo $list->total(); ?></strong> ???</span>
			</div>
			<table class="table table-border table-bordered table-bg table-sort">
				<thead>
					<tr>
						<th scope="col" colspan="11">????????????</th>
					</tr>
					<tr class="text-c">
						<th width="25"><input type="checkbox" name="" value=""></th>
						<th width="40">ID</th>
						<th width="50">??????id</th>
						<th width="50">????????????</th>
						<th width="150">????????????</th>
						<th width="90">???????????????</th>
						<th>????????????</th>
						<!--<th width="130">????????????</th>-->
						<!--<th width="100">????????????</th>-->
						<th width="180">????????????</th>
						<th width="100">??????</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($list as $v): ?>
					<tr class="text-c">
						<td><input type="checkbox" value="<?php echo $v['id']; ?>" name=""></td>
						<td><?php echo $v['id']; ?></td>
						<td><?php echo $v['user_id']; ?></td>
						<td><?php echo $v['user']['nickname']; ?></td>
						<td><a href="<?php echo url('read', ['id'=>$v['id']]); ?>"><?php echo $v['order_sn']; ?></a></td>
						<td><?php echo $v['order_amount']; ?></td>
						<td><?php echo $v['order_status']; ?></td>
						<!--<td><?php echo $v['shipping_code']; ?>/<?php echo $v['shipping_name']; ?>/<?php echo $v['shipping_sn']; ?></td>-->
						<!--<td><?php echo $v['pay_code']; ?>/<?php echo $v['pay_name']; ?></td>-->
						<td><?php echo $v['create_time']; ?></td>
						<td class="td-manage">
							<!--<a title="??????" data-url="<?php echo url('edit', ['id'=>$v['id']]); ?>" href="javascript:;" class="ml-5 edit" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>-->
							<a title="??????" data-url="<?php echo url('delete',['id'=>$v['id']]); ?>" href="javascript:;" class="ml-5 delete" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

			<div class="pd-20"><?php echo $list->render(); ?></div>
		</article>
	</div>
</section>

<!--?????????????????????????????????????????????-->
<script type="text/javascript" src="/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/static/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="/static/admin/logic/curd.js"></script>
<script type="text/javascript">
	$(function(){
		/*$('.table-sort').dataTable({
			"aaSorting": [[ 1, "desc" ]],//?????????????????????
			"bStateSave": true,//????????????
			"aoColumnDefs": [
				{"orderable":false,"aTargets":[0,7]}// ????????????????????????
			]
		});*/
	});
	/*
	 ???????????????
	 title	??????
	 url		?????????url
	 id		?????????????????????id
	 w		???????????????????????????????????????
	 h		???????????????????????????????????????
	 */
	/*??????-??????*/
	function admin_stop(obj,id){
		layer.confirm('?????????????????????',function(index){
			//??????????????????????????????????????????????????????????????????

			$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="??????" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
			$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">?????????</span>');
			$(obj).remove();
			layer.msg('?????????!',{icon: 5,time:1000});
		});
	}

	/*??????-??????*/
	function admin_start(obj,id){
		layer.confirm('?????????????????????',function(index){
			//??????????????????????????????????????????????????????????????????

			$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="??????" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
			$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">?????????</span>');
			$(obj).remove();
			layer.msg('?????????!', {icon: 6,time:1000});
		});
	}
</script>
<!--/?????????????????????????????????????????????-->
</body>
</html>

</body>
</html>
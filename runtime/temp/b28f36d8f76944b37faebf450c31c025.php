<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:69:"D:\bc\pyg\public/../application/admin\view\auth\admin-permission.html";i:1618212456;s:51:"D:\bc\pyg\application\admin\view\layout\layout.html";i:1617259112;s:50:"D:\bc\pyg\application\admin\view\layout\_meta.html";i:1617259086;s:52:"D:\bc\pyg\application\admin\view\layout\_footer.html";i:1617259249;s:53:"D:\bc\pyg\application\admin\view\layout\_header1.html";i:1619198410;s:52:"D:\bc\pyg\application\admin\view\layout\_menu_1.html";i:1619198538;}*/ ?>
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

<title>???????????? - ??????????????? - H-ui.admin v3.0</title>

<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> ?????? <span class="c-gray en">&gt;</span> ??????????????? <span class="c-gray en">&gt;</span> ???????????? </nav>
	<div class="Hui-article" style="overflow-y: scroll;">
		<article class="cl pd-20">
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l">
					<a href="javascript:;" id="tree_open" style="background-color:#009688;" class="btn btn-primary  radius tree_open"><i class="Hui-iconfont ">&#xfe3d;</i> <span>????????????</span></a>
					<a href="javascript:;" data-url="<?php echo url('create'); ?>" style="background-color:#009688;" id="add" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> ????????????</a>
				</span>
			</div>
			<table class="table table-border table-bordered table-bg">
				<thead>
					<tr>
						<th scope="col" colspan="7">??????</th>
					</tr>
					<tr class="text-c">
						<th width="10%">[+/-]</th>
						<th width="10%">ID</th>
						<th width="20%">????????????</th>
						<th width="10%">????????????</th>
						<th width="10%">?????????</th>
						<th width="10%">??????????????????</th>
						<th>??????</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($list as $v): ?>
					<tr class="text-c level_<?php echo $v['level']; ?>">
						<td>
							<?php if(($v['level'] < 3)): ?>
							<?php echo str_repeat('&emsp;', $v['level']*2); ?>
							[<a href="javascript:;">-</a>]
							<?php endif; ?>
						</td>
						<td><?php echo $v['id']; ?></td>
						<td class="text-l"><?php echo str_repeat('&emsp;', $v['level']*2); ?><?php echo $v['auth_name']; ?></td>
						<td><?php echo $v['auth_c']; ?></td>
						<td><?php echo $v['auth_a']; ?></td>
						<td><?php echo $v['is_nav']; ?></td>
						<td>
							<?php if(($v['level'] < 3)): ?>
							<a title="????????????" data-url="<?php echo url('create', ['pid'=>$v['id']]); ?>?pid=" href="javascript:;" class="ml-5 add_child" style="text-decoration:none"><i class="Hui-iconfont">&#xe600;</i></a>
							<?php endif; ?>
							<a title="??????" data-url="<?php echo url('edit', ['id'=>$v['id']]); ?>" href="javascript:;" class="ml-5 edit" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
							<a title="??????" data-url="<?php echo url('delete', ['id'=>$v['id']]); ?>" href="javascript:;" class="ml-5 delete" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</article>
	</div>
</section>

<!--?????????????????????????????????????????????-->
<script type="text/javascript" src="/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/static/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="/static/admin/logic/curd.js"></script>
<script type="text/javascript">
/*
	???????????????
	title	??????layer_show()
	url		?????????url
	w		???????????????????????????????????????
	h		???????????????????????????????????????
*/
</script>
<script>

	$(function(){
		$('tr.level_0').find('td:first-child a').click(function(){
			var str = $(this).html() == '-';
			if(str){
				//??????
				$(this).html('+').closest('tr').nextUntil('.level_0').hide();
			}else{
				//??????
				$(this).html('-').closest('tr').nextUntil('.level_0').show();
			}
		});
		$('tr.level_1').find('td:first-child a').click(function(){
			var str = $(this).html() == '-';
			if(str){
				//??????
				$(this).html('+').closest('tr').nextUntil('.level_1,.level_0').hide();
			}else{
				//??????
				$(this).html('-').closest('tr').nextUntil('.level_1,.level_0').show();
			}
		});
		$('#tree_open').click(function(){
			var status = $(this).find('span').text() == '????????????';
			if(status){
				$(this).find('i').html('&#xfe3e;');
				$(this).find('span').text('????????????');
				$('tr.level_0>td:first-child a').html('+');
				$('tbody tr').not('.level_0').hide();
			}else{
				$(this).find('i').html('&#xfe3d;');
				$(this).find('span').text('????????????');
				$('.level_0>td:first-child a').html('-');
				$('tbody tr').not('.level_0').show();
			}
		});
	});
</script>
<!--/?????????????????????????????????????????????-->


</body>
</html>
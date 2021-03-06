<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/www/wwwroot/pyg/public/../application/admin/view/auth/admin-permission-edit.html";i:1563183010;}*/ ?>
﻿<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="favicon.ico" >
<link rel="Shortcut Icon" href="favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/static/admin/lib/html5.js"></script>
<script type="text/javascript" src="/static/admin/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>修改权限 - 管理员管理 - H-ui.admin v3.0</title>
</head>
<body>
<article class="cl pd-20">
	<form action="<?php echo url('update'); ?>" method="post" class="form form-horizontal" id="form-edit">
		<input type="hidden" name="id" value="<?php echo $info['id']; ?>">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>权限名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $info['auth_name']; ?>" placeholder="" id="authName" name="auth_name" datatype="*2-16" nullmsg="权限名称不能为空">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>上级权限：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box" style="width:150px;">
					<select name="pid" class="select" size="1">
						<option value="0">作为顶级权限</option>
						<?php foreach($p_auth as $v): ?>
						<option value="<?php echo $v['id']; ?>" <?php if(($v['id'] == $info['pid'])): ?>selected="selected"<?php endif; ?>><?php echo str_repeat('&emsp;', $v['level']*2); ?><?php echo $v['auth_name']; ?></option>
						<?php endforeach; ?>
					</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">控制器名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $info['auth_c']; ?>" placeholder="顶级权限无需填写" id="auth_c" name="auth_c" datatype="*1-16" nullmsg="控制器名不能为空">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">操作方法名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $info['auth_a']; ?>" placeholder="顶级权限无需填写" id="auth_a" name="auth_a" datatype="*1-16" nullmsg="操作方法名不能为空">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">是否菜单项：</label>
			<div class="formControls col-xs-8 col-sm-9 ">
				<div class="radio-box">
					<input name="is_nav" type="radio" id="nav-1" value="1" <?php if(($info['is_nav'] == 1)): ?>checked<?php endif; ?>>
					<label for="nav-1">是</label>
				</div>
				<div class="radio-box">
					<input name="is_nav" type="radio" id="nav-2" value="0" <?php if(($info['is_nav'] == 0)): ?>checked<?php endif; ?>>
					<label for="nav-2">否</label>
				</div>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<button type="submit" class="btn btn-success radius" id="admin-role-save" name="admin-role-save"><i class="icon-ok"></i> 确定</button>
			</div>
		</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/admin/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/static/admin/static/h-ui.admin/js/H-ui.admin.page.js"></script>

<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$("#form-edit").validate({
		rules:{
			auth_name:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit(function(res){
				if(res.code == 200){
					layer.msg('操作成功',{"icon":1,"time":"1000"},function(){
                        parent.location.reload();
                    });
				}else{
					layer.msg('操作失败:' + res.msg);
				}
			});
		}
	});
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
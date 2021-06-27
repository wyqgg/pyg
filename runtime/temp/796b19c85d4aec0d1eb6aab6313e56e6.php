<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"/www/wwwroot/pyg/public/../application/home/view/login/login.html";i:1619103240;}*/ ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>网上书店</title>
    <link rel="stylesheet" type="text/css" href="/static/home/css/all.css" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/pages-login.css" />

	<script type="text/javascript" src="/static/home/js/all.js"></script>
	<script type="text/javascript" src="/static/home/js/pages/login.js"></script>
</head>

<body>
	<div class="login-box">
		<div class="py-container logoArea">
			<a href="" class="logo1"><img src="/static/home/img/logo.jpg" ></a>
		</div>
		<div class="  ">
			<div class="py-container login">
				<div class="loginform">
					<ul class="sui-nav nav-tabs tab-wraped">
							<a href="#profile" data-toggle="tab">
								<h3>账户登录</h3>
							</a>
					</ul>
					<div class="tab-content tab-wraped">
						<div id="profile" class="tab-pane  active">
							<form class="sui-form" action="<?php echo url('dologin'); ?>" method="post">
								<div class="input-prepend"><span class="add-on loginname"></span>
									<input id="username" name="username" type="text" placeholder="邮箱/用户名/手机号" class="span2 input-xfat">
								</div>
								<div class="input-prepend"><span class="add-on loginpwd"></span>
									<input id="password" name="password" type="password" placeholder="请输入密码" class="span2 input-xfat">
								</div>
								<div class="setting">
									<label class="checkbox inline">
									  <input name="m1" type="checkbox" value="2" checked="">
									  自动登录
									</label>
									<span class="forget">忘记密码？</span>
								</div>
								<div class="logined">
									<a id="login-btn" class="sui-btn btn-block btn-xlarge" href="javascript:;">登&nbsp;&nbsp;录</a>
								</div>
							</form>
							<div class="otherlogin">
								<span class="register"><a href="register.html" target="_blank">立即注册</a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="py-container copyright">
			<ul>
				<li>关于我们</li>
				<li>联系我们</li>
				<li>联系客服</li>
				<li>营销中心</li>
				<li>销售联盟</li>
			</ul>
			<div class="beian">京ICP备08001421号京公网安备110108007702
			</div>
		</div>
	</div>
<script>
	$(function(){
		//提交表单
		$('#login-btn').click(function(){
			//参数检测 略
			//提交表单
			$('form').submit();
		});
	})
</script>
</body>

</html>
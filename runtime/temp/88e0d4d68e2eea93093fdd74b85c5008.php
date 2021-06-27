<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:59:"D:\bc\pyg\public/../application/admin\view\index\index.html";i:1563182962;s:51:"D:\bc\pyg\application\admin\view\layout\layout.html";i:1617259112;s:50:"D:\bc\pyg\application\admin\view\layout\_meta.html";i:1617259086;s:52:"D:\bc\pyg\application\admin\view\layout\_footer.html";i:1617259249;s:53:"D:\bc\pyg\application\admin\view\layout\_header1.html";i:1619198410;s:52:"D:\bc\pyg\application\admin\view\layout\_menu_1.html";i:1619198538;}*/ ?>
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
<title>首页</title>

<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont"></i> <a href="/" class="maincolor">首页</a> 
		<span class="c-999 en">&gt;</span>
		<span class="c-666">我的桌面</span> 
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<p class="f-20 text-success">欢迎进入品优购后台管理系统！</p>
			<p>登录次数：18 </p>
			<p>上次登录IP：222.35.131.79.1  上次登录时间：2014-6-14 11:19:55</p>
			<table class="table table-border table-bordered table-bg">
				<thead>
					<tr>
						<th colspan="7" scope="col">信息统计</th>
			</tr>
					<tr class="text-c">
						<th>统计</th>
						<th>资讯库</th>
						<th>图片库</th>
						<th>产品库</th>
						<th>用户</th>
						<th>管理员</th>
			</tr>
		</thead>
				<tbody>
					<tr class="text-c">
						<td>总数</td>
						<td>92</td>
						<td>9</td>
						<td>0</td>
						<td>8</td>
						<td>20</td>
			</tr>
					<tr class="text-c">
						<td>今日</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
			</tr>
					<tr class="text-c">
						<td>昨日</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
			</tr>
					<tr class="text-c">
						<td>本周</td>
						<td>2</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
			</tr>
					<tr class="text-c">
						<td>本月</td>
						<td>2</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
			</tr>
		</tbody>
	</table>
			<table class="table table-border table-bordered table-bg mt-20">
				<thead>
					<tr>
						<th colspan="2" scope="col">服务器信息</th>
			</tr>
		</thead>
				<tbody>
					<tr>
						<th width="30%">服务器计算机名</th>
						<td><span id="lbServerName">http://127.0.0.1/</span></td>
			</tr>
					<tr>
						<td>服务器IP地址</td>
						<td>192.168.1.1</td>
			</tr>
					<tr>
						<td>服务器域名</td>
						<td>www.h-ui.net</td>
			</tr>
					<tr>
						<td>服务器端口 </td>
						<td>80</td>
			</tr>
					<tr>
						<td>服务器IIS版本 </td>
						<td>Microsoft-IIS/6.0</td>
			</tr>
					<tr>
						<td>本文件所在文件夹 </td>
						<td>D:\WebSite\HanXiPuTai.com\XinYiCMS.Web\</td>
			</tr>
					<tr>
						<td>服务器操作系统 </td>
						<td>Microsoft Windows NT 5.2.3790 Service Pack 2</td>
			</tr>
					<tr>
						<td>系统所在文件夹 </td>
						<td>C:\WINDOWS\system32</td>
			</tr>
					<tr>
						<td>服务器脚本超时时间 </td>
						<td>30000秒</td>
			</tr>
					<tr>
						<td>服务器的语言种类 </td>
						<td>Chinese (People's Republic of China)</td>
			</tr>
					<tr>
						<td>.NET Framework 版本 </td>
						<td>2.050727.3655</td>
			</tr>
					<tr>
						<td>服务器当前时间 </td>
						<td>2014-6-14 12:06:23</td>
			</tr>
					<tr>
						<td>服务器IE版本 </td>
						<td>6.0000</td>
			</tr>
					<tr>
						<td>服务器上次启动到现在已运行 </td>
						<td>7210分钟</td>
			</tr>
					<tr>
						<td>逻辑驱动器 </td>
						<td>C:\D:\</td>
			</tr>
					<tr>
						<td>CPU 总数 </td>
						<td>4</td>
			</tr>
					<tr>
						<td>CPU 类型 </td>
						<td>x86 Family 6 Model 42 Stepping 1, GenuineIntel</td>
			</tr>
					<tr>
						<td>虚拟内存 </td>
						<td>52480M</td>
			</tr>
					<tr>
						<td>当前程序占用内存 </td>
						<td>3.29M</td>
			</tr>
					<tr>
						<td>Asp.net所占内存 </td>
						<td>51.46M</td>
			</tr>
					<tr>
						<td>当前Session数量 </td>
						<td>8</td>
			</tr>
					<tr>
						<td>当前SessionID </td>
						<td>gznhpwmp34004345jz2q3l45</td>
			</tr>
					<tr>
						<td>当前系统用户名 </td>
						<td>NETWORK SERVICE</td>
			</tr>
		</tbody>
	</table>
</article>
		<footer class="footer">
			<p>感谢jQuery、layer、laypage、Validform、UEditor、My97DatePicker、iconfont、Datatables、WebUploaded、icheck、highcharts、bootstrap-Switch<br> Copyright &copy;2015 H-ui.admin v3.0 All Rights Reserved.<br> 本后台系统由<a href="http://www.h-ui.net/" target="_blank" title="H-ui前端框架">H-ui前端框架</a>提供前端技术支持</p>
</footer>
</div>
</section>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">

</script>
<!--/请在上方写此页面业务相关的脚本-->


</body>
</html>
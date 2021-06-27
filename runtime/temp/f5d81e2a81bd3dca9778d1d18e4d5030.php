<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:63:"/www/wwwroot/pyg/public/../application/home/view/order/pay.html";i:1619191515;s:50:"/www/wwwroot/pyg/application/home/view/layout.html";i:1619203727;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/all.css" />
    <script type="text/javascript" src="/static/home/js/all.js"></script>
</head>
<body>
<!-- 头部栏位 -->
<!--页面顶部-->
<div id="nav-bottom">
    <!--顶部-->
    <div class="nav-top">
        <div class="top">
            <div class="py-container">
                <div class="shortcut">
                    <ul class="fl">
                        <li class="f-item">书店欢迎您！</li>
                        <?php if((\think\Session::get('user_info') == '')): ?>
                        <li class="f-item">请
                            <a href="<?php echo url('home/login/login'); ?>" >登录</a>　
                            <span><a href="<?php echo url('home/login/register'); ?>" >免费注册</a></span>
                        </li>
                        <?php else: ?>
                        <li class="f-item">Hi,
                            <a href="javascript:;" >
                                <?php if((\think\Session::get('user_info.nickname'))): ?>
                                <?php echo \think\Session::get('user_info.nickname'); else: ?>
                                <?php echo \think\Session::get('user_info.username'); endif; ?></a>　
                            <span><a href="<?php echo url('home/login/logout'); ?>" >退出</a></span>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <ul class="fr">
                        <li class="f-item"><a href="<?php echo url('home/order/myorder'); ?>" target="_blank">我的订单</a></li>
                        <li class="f-item space"></li>
                        <li class="f-item"><a href="index.html" target="_blank">我的书店</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!--头部-->
        <div class="header">
            <div class="py-container">
                <div class="yui3-g Logo">
                    <div class="yui3-u Left logoArea">
                        <a class="logo1"  title="网上书店" href="<?php echo url('home/index/index'); ?>" target="_blank"><img style="width:128px;" src="/static/home/img/logo.jpg" ></a>
                    </div>
                    <div class="yui3-u Center searchArea">
                        <!--<div class="search">-->
                        <!--    <form action="<?php echo url('home/goods/index'); ?>" method="get" class="sui-form form-inline">-->
                                <!--searchAutoComplete-->
                        <!--        <div class="input-append">-->
                        <!--            <input type="text" id="autocomplete" type="text" name="keywords" value="<?php echo \think\Request::instance()->param('keywords'); ?>" class="input-error input-xxlarge" />-->
                        <!--            <button class="sui-btn btn-xlarge btn-danger" type="submit">搜索</button>-->
                        <!--        </div>-->
                        <!--    </form>-->
                        <!--</div>-->
                    </div>
                    <div class="yui3-u Right shopArea">
                        <div class="fr shopcar">
                            <div class="show-shopcar" id="shopcar">
                                <span class="car"></span>
                                <a class="sui-btn btn-default btn-xlarge" href="<?php echo url('home/cart/index'); ?>">
                                    <span>我的购物车</span>
                                    <i class="shopnum"><?php echo $cart_num; ?></i>
                                </a>
                                <div class="clearfix shopcarlist" id="shopcarlist" style="display:none">
                                    <p>"啊哦，你的购物车还没有商品哦！"</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="yui3-g NavList">
                    <div class="all-sorts-list">
                        <div class="yui3-u Left all-sort">
                            <h4>全部商品分类</h4>
                        </div>
                        <div class="sort">
                            <div class="all-sort-list2">
                                <?php foreach($category as $one): ?>
                                <div class="item">
                                    <h3><a href="javascript:;"><?php echo $one['cate_name']; ?></a></h3>
                                    <div class="item-list clearfix">
                                        <div class="subitem">
                                            <?php foreach($one['son'] as $k=>$two): ?>
                                            <dl class="fore<?php echo $k; ?>">
                                                <dt><a href="javascript:;"><?php echo $two['cate_name']; ?></a></dt>
                                                <dd>
                                                    <?php foreach($two['son'] as $three): ?>
                                                    <em><a href="<?php echo url('home/goods/index', ['id'=>$three['id']]); ?>"><?php echo $three['cate_name']; ?></a></em>
                                                    <?php endforeach; ?>
                                                </dd>
                                            </dl>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="yui3-u Right"></div>
                </div>

            </div>
        </div>
    </div>
</div>


	<title>支付页</title>

    <link rel="stylesheet" type="text/css" href="/static/home/css/pages-pay.css" />
	<div class="cart py-container">
		<!--主内容-->
		<div class="checkout py-container  pay">
			<div class="checkout-tit">
				<h4 class="tit-txt"><span class="success-icon"></span><span  class="success-info">订单提交成功，请您及时付款，以便尽快为您发货~~</span></h4>
				<div class="paymark">
					<span class="fl">请您在提交订单<em class="orange time">30分钟</em>之内完成支付，超时订单会自动取消。订单号：<em><?php echo $order_sn; ?></em></span>
					<span class="fr"><em class="sui-lead">应付金额：</em><em  class="orange money">￥<?php echo $total_price; ?></em></span>
				</div>
			</div>
			
			<!--<div class="check-info">
				<h4>重要说明：</h4>
				<ol>
					<li>品优购商城支付平台目前支持<span class="zfb">支付宝</span>支付方式。</li>
					<li>其它支付渠道正在调试中，敬请期待。</li>
					<li>为了保证您的购物支付流程顺利完成，请保存以下支付宝信息。</li>
				</ol>
				<h4>支付宝账户信息：（很重要，<span class="save">请保存！！！</span>）</h4>
				<ul>
					<li>支付帐号：duqthf1038@sandbox.com</li>
					<li>密码：111111</li>
					<li>支付密码：111111</li>
				</ul>	
			</div>-->

			<!--需增加的代码开始-->
			<!--<div class="qrpay">-->
			<!--	<div class="step-tit">-->
			<!--		<h5>扫码付(支持支付宝、微信)</h5>-->
			<!--	</div>-->
			<!--	<div class="step-cont">-->
				
			<!--	</div>-->
			<!--</div>-->
			<!--需增加的代码结束-->
			
			<div class="checkout-steps">
				<!--收件人信息-->
				<!--<div class="step-tit">-->
				<!--	<h5>支付平台</h5>-->
				<!--</div>-->
				<div class="step-cont">

				</div>
				<div class="hr"></div>
				<div class="submit sui-text-center">
					<a class="sui-btn btn-danger btn-xlarge" href="javascript:;">立即支付</a>
				</div>
			</div>
		</div>

	</div>
	<form id="payForm" action="<?php echo url('home/order/pay'); ?>" method="post">
		<input type="hidden" name="order_sn" value="<?php echo $order_sn; ?>">
		<input type="hidden" name="pay_code" value="">
	</form>
	<script type="text/javascript">
		$(function(){
			$("ul.payType li").click(function(){
				$(this).css("border","2px solid #E4393C").siblings().css("border-color","#ddd");
			});

			//去支付
			$('.submit').click(function(){
				//获取选择的支付方式
				// var pay_code = '';
				// $('.payType li').each(function(i,v){
				// 	//i是下标,v是li标签
				// 	//console.log($(v).css('border-color'));
				// 	if($(v).css('border-color') == 'rgb(228, 57, 60)'){
				// 		//console.log($(v).attr('pay_code'));
				// 		pay_code = $(v).attr('pay_code');
				// 	}
				// });
				// //将支付方式pay_code放到表单中
				// $('input[name=pay_code]').val(pay_code);
				//发送请求 表单提交
				$('#payForm').submit();
			})
		})
	</script>
	<script>
		$(function(){
			//轮询， 查询支付状态
			var order_sn = "<?php echo $order_sn; ?>";
			var timer = setInterval(function(){
				$.ajax({
					"url":"<?php echo url('home/order/status'); ?>",
					"type":"post",
					"data":"order_sn=" + order_sn,
					"dataType":"json",
					"success":function(res){
						if(res.code == 200 && res.data == 1){
							clearInterval(timer);
							location.href = "<?php echo url('home/order/payresult'); ?>?order_sn=" + order_sn;
						}
					}
				});
			}, 1000);
		})
	</script>


<!-- 底部栏位 -->
<!--页面底部-->
<div class="clearfix footer">
    <div class="py-container">
        <div class="footlink">
            <div class="Mod-service">
                <ul class="Mod-Service-list">
                    <li class="grid-service-item intro  intro1">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item  intro intro2">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item intro  intro3">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item  intro intro4">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item intro intro5">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                </ul>
            </div>
            <div class="clearfix Mod-list">
                <div class="yui3-g">
                    <div class="yui3-u-1-6">
                        <h4>购物指南</h4>
                        <ul class="unstyled">
                            <li>购物流程</li>
                            <li>会员介绍</li>
                            <li>生活旅行/团购</li>
                            <li>常见问题</li>
                            <li>购物指南</li>
                        </ul>

                    </div>
                    <div class="yui3-u-1-6">
                        <h4>配送方式</h4>
                        <ul class="unstyled">
                            <li>上门自提</li>
                            <li>211限时达</li>
                            <li>配送服务查询</li>
                            <li>配送费收取标准</li>
                            <li>海外配送</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>支付方式</h4>
                        <ul class="unstyled">
                            <li>货到付款</li>
                            <li>在线支付</li>
                            <li>分期付款</li>
                            <li>邮局汇款</li>
                            <li>公司转账</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>售后服务</h4>
                        <ul class="unstyled">
                            <li>售后政策</li>
                            <li>价格保护</li>
                            <li>退款说明</li>
                            <li>取消订单</li>
                        </ul>
                    </div>

                    <div class="yui3-u-1-6">
                        <h4>帮助中心</h4>
                        <img src="/static/home/img/wx_cz.jpg">
                    </div>
                </div>
            </div>
            <div class="Mod-copyright">
                <ul class="helpLink">
                    <li>关于我们<span class="space"></span></li>
                    <li>联系我们</li>
                </ul>
                <p>京ICP备08001421号京公网安备110108007702</p>
            </div>
        </div>
    </div>
</div>
<script type="text/template" id="tbar-cart-item-template">
    <div class="tbar-cart-item" >
        <div class="jtc-item-promo">
            <em class="promo-tag promo-mz">满赠<i class="arrow"></i></em>
            <div class="promo-text">已购满600元，您可领赠品</div>
        </div>
        <div class="jtc-item-goods">
            <span class="p-img"><a href="#" target="_blank"><img src="{2}" alt="{1}" height="50" width="50" /></a></span>
            <div class="p-name">
                <a href="#">{1}</a>
            </div>
            <div class="p-price"><strong>¥{3}</strong>×{4} </div>
            <a href="#none" class="p-del J-del">删除</a>
        </div>
    </div>
</script>
<!--侧栏面板结束-->

</body>

</html>
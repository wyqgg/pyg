<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"/www/wwwroot/pyg/public/../application/home/view/order/paysuccess.html";i:1619202858;s:50:"/www/wwwroot/pyg/application/home/view/layout.html";i:1619203727;}*/ ?>
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


	<title>支付页-成功</title>

    <link rel="stylesheet" type="text/css" href="/static/home/css/pages-paysuccess.css" />

	<div class="cart py-container">
		<!--主内容-->
		<div class="paysuccess">
			<div class="success">
				<h3><img src="/static/home/img/_/right.png" width="48" height="48">　恭喜您，支付成功啦！</h3>
				<div class="paydetail">
				<p>支付方式：<?php echo $pay_name; ?></p>
				<p>支付金额：￥<?php echo $order_amount; ?>元</p>
				<p class="button"><a href="<?php echo url('home/order/myorder'); ?>" class="sui-btn btn-xlarge btn-danger">查看订单</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo url('home/index/index'); ?>" class="sui-btn btn-xlarge ">继续购物</a></p>
			    </div>
			</div>
			
		</div>
	</div>


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
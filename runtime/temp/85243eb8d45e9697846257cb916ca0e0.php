<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"/www/wwwroot/pyg/public/../application/home/view/index/index.html";i:1619203819;s:50:"/www/wwwroot/pyg/application/home/view/layout.html";i:1619203727;}*/ ?>
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


<title>网上书店</title>

<link rel="stylesheet" type="text/css" href="/static/home/css/pages-JD-index.css" />
<script type="text/javascript" src="/static/home/js/pages/index.js"></script>

<!--列表-->
<div class="py-container">
	<div class="yui3-g SortList">
		<div class="yui3-u Center banerArea">
			<!--banner轮播-->
			<div id="myCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="active item">
						<a href="javascript:;">
							<img src="/static/home/img/banner1.jpg"  />
						</a>
					</div>
					<div class="item">
						<a href="javascript:;">
							<img src="/static/home/img/ban2.jpg"  />
						</a>
					</div>
					<div class="item">
						<a href="javascript:;">
							<img src="/static/home/img/ban3.png"  />
						</a>

					</div>
				</div><a href="#myCarousel" data-slide="prev" class="carousel-control left">‹</a><a href="#myCarousel" data-slide="next" class="carousel-control right">›</a>
			</div>
		</div>
		<div class="yui3-u Right">
			<div class="news">
				<h4><em class="fl">品优购快报</em><span class="fr tip">更多 ></span></h4>
				<div class="clearix"></div>
				<ul class="news-list unstyled">
					<li>
						<span class="bold">[特惠]</span>备战开学季 全民半价购新书
					</li>
					<li>
						<span class="bold">[公告]</span>备战开学季 全民半价购新书
					</li>
					<li>
						<span class="bold">[特惠]</span>备战开学季 全民半价购新书
					</li>
					<li>
						<span class="bold">[公告]</span>备战开学季 全民半价购新书
					</li>
					<li>
						<span class="bold">[特惠]</span>备战开学季 全民半价购新书
					</li>
					<li>
						<span class="bold">[特惠]</span>备战开学季 全民半价购新书
					</li>
					<li>
						<span class="bold">[公告]</span>备战开学季 全民半价购新书
					</li>
					<li>
						<span class="bold">[特惠]</span>备战开学季 全民半价购新书
					</li>
					<li>
						<span class="bold">[公告]</span>备战开学季 全民半价购新书
					</li>
					<li>
						<span class="bold">[特惠]</span>备战开学季 全民半价购新书
					</li>
					<li>
						<span class="bold">[公告]</span>备战开学季 全民半价购新书
					</li>
					<li>
						<span class="bold">[特惠]</span>备战开学季 全民半价购新书
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- 商品排行 -->
<div class="py-container tabbox">
	<div class="py-container tab">
		<div class="tab-tit" style="text-align:center">
			<a href="javascript:;" class="on">
				<p class="img"><i></i></p>
				<p class="text">热卖排行</p>
			</a>
		</div>

	</div>
	<div class="content">
		<ul>
			<li style="display:block;">
			    <?php foreach($list as $v): ?>
				<div class="img-item">
					<p class="tab-pic">
					    <a href="<?php echo url('home/goods/detail', ['id'=>$v['id']]); ?>"><img src="<?php echo $v['goods_logo']; ?>" /></a>
						<!--<span><a href="javascript:;"><img src="<?php echo $v['goods_logo']; ?>"/></a></span>-->
					</p>
					<div class="tab-info">
						<div class="info-title">
							<span><a href="javascript:;"><?php echo $v['goods_name']; ?></a></span>
						</div>
						<p class="info-price">价格：<?php echo $v['goods_price']; ?></p>
					</div>
				</div>
				<?php endforeach; ?>
			</li>
			<li>
				<div class="img-item">
					<p class="tab-pic">
						<span><a href="javascript:;"><img src="/static/home/img/2.jpg"/></a></span>
					</p>
					<div class="tab-info">
						<div class="info-title">
							<span><a href="javascript:;">【官网价直降1100】Apple iPhone 8 Plus 256GB 银色 移动联通电信4G手机</a></span>
						</div>
						<p class="info-price">价格：<?php echo $v['goods_price']; ?></p>
					</div>
				</div>
				<div class="img-item">
					<p class="tab-pic">
						<span><a href="javascript:;"><img src="/static/home/img/1.jpg"/></a></span>
					</p>
					<div class="tab-info">
						<div class="info-title">
							<span><a href="javascript:;">【官网价直降1100】Apple iPhone 8 Plus 256GB 银色 移动联通电信4G手机</a></span>
						</div>
						<p class="info-price">定金：¥100.00</p>
					</div>
				</div>
				<div class="img-item">
					<p class="tab-pic">
						<span><a href="javascript:;"><img src="/static/home/img/1.jpg"/></a></span>
					</p>
					<div class="tab-info">
						<div class="info-title">
							<span><a href="javascript:;">【官网价直降1100】Apple iPhone 8 Plus 256GB 银色 移动联通电信4G手机</a></span>
						</div>
						<p class="info-price">定金：¥100.00</p>
					</div>
				</div>
				<div class="img-item">
					<p class="tab-pic">
						<span><a href="javascript:;"><img src="/static/home/img/2.jpg"/></a></span>
					</p>
					<div class="tab-info">
						<div class="info-title">
							<span><a href="javascript:;">【官网价直降1100】Apple iPhone 8 Plus 256GB 银色 移动联通电信4G手机</a></span>
						</div>
						<p class="info-price">定金：¥100.00</p>
					</div>
				</div>

			</li>
			<li>
				<div class="img-item">
					<p class="tab-pic">
						<span><a href="javascript:;"><img src="/static/home/img/1.jpg"/></a></span>
					</p>
					<div class="tab-info">
						<div class="info-title">
							<span><a href="javascript:;">【官网价直降1100】Apple iPhone 8 Plus 256GB 银色 移动联通电信4G手机</a></span>
						</div>
						<p class="info-price">定金：¥100.00</p>
					</div>
				</div>
				<div class="img-item">
					<p class="tab-pic">
						<span><a href="javascript:;"><img src="/static/home/img/1.jpg"/></a></span>
					</p>
					<div class="tab-info">
						<div class="info-title">
							<span><a href="javascript:;">【官网价直降1100】Apple iPhone 8 Plus 256GB 银色 移动联通电信4G手机</a></span>
						</div>
						<p class="info-price">定金：¥100.00</p>
					</div>
				</div>
				<div class="img-item">
					<p class="tab-pic">
						<span><a href="javascript:;"><img src="/static/home/img/1.jpg"/></a></span>
					</p>
					<div class="tab-info">
						<div class="info-title">
							<span><a href="javascript:;">【官网价直降1100】Apple iPhone 8 Plus 256GB 银色 移动联通电信4G手机</a></span>
						</div>
						<p class="info-price">定金：¥100.00</p>
					</div>
				</div>
				<div class="img-item">
					<p class="tab-pic">
						<span><a href="javascript:;"><img src="/static/home/img/1.jpg"/></a></span>
					</p>
					<div class="tab-info">
						<div class="info-title">
							<span><a href="javascript:;">【官网价直降1100】Apple iPhone 8 Plus 256GB 银色 移动联通电信4G手机</a></span>
						</div>
						<p class="info-price">定金：¥100.00</p>
					</div>
				</div>

			</li>
		</ul>
	</div>
</div>
<script>

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
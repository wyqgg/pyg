<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"/www/wwwroot/pyg/public/../application/home/view/cart/index.html";i:1619201197;s:50:"/www/wwwroot/pyg/application/home/view/layout.html";i:1619203727;}*/ ?>
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


	<title>我的购物车</title>

    <link rel="stylesheet" type="text/css" href="/static/home/css/pages-cart.css" />

	<script type="text/javascript" src="/static/home/js/pages/index.js"></script>

	<!--主内容-->
	<div class="cart py-container">
		<!--All goods-->
		<div class="allgoods">
			<h4>全部商品<span></span></h4>
			<div class="cart-main">
				<div class="yui3-g cart-th">
					<!--<div class="yui3-u-1-4"><input type="checkbox" name="" id="check_all" value="" /> 全部</div>-->
					<div class="yui3-u-1-4">商品</div>
					<div class="yui3-u-1-8">单价（元）</div>
					<div class="yui3-u-1-8">数量</div>
					<div class="yui3-u-1-8">小计（元）</div>
					<div class="yui3-u-1-8">操作</div>
				</div>
				<div class="cart-item-list">
					<!--<div class="cart-shop">-->
					<!--	<input type="checkbox" name="" id="" value="" />-->
					<!--	<span class="shopname self">传智自营</span>-->
					<!--</div>-->
					<div class="cart-body">
						<?php foreach($list as $v): ?>
						<div class="cart-list">
							<ul class="goods-list yui3-g" cart_id="<?php echo $v['id']; ?>" number="<?php echo $v['number']; ?>">
								<li class="yui3-u-1-24">
									<input type="checkbox" class="row_check" name="" id="" value="" <?php if(($v['is_selected'])): ?>checked="checked"<?php endif; ?>/>
								</li>
								<li class="yui3-u-6-24">
									<div class="good-item">
										<div class="item-img"><img src="<?php echo $v['goods']['goods_logo']; ?>" /></div>
										<div class="item-msg"><?php echo $v['goods']['goods_name']; ?></div>
									</div>
								</li>
								<li class="yui3-u-5-24">
									<div class="item-txt"></div>
								</li>
								<li class="yui3-u-1-8"><span class="price"><?php echo $v['goods']['goods_price']; ?></span></li>
								<li class="yui3-u-1-8">
									<a href="javascript:void(0)" class="increment mins">-</a>
									<input autocomplete="off" type="text" value="<?php echo $v['number']; ?>" minnum="1" class="itxt current_number" />
									<a href="javascript:void(0)" class="increment plus">+</a>
								</li>
								<li class="yui3-u-1-8"><span class="sum"><?php echo $v['goods']['goods_price'] * $v['number']; ?></span></li>
								<li class="yui3-u-1-8">
									<a href="javascript:;" class="delete">删除</a><br />
								</li>
							</ul>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="cart-tool">
				<div class="select-all">
					<input type="checkbox" class="check_all" id = "check_all" name="" value="" />
					<span>全选</span>
				</div>
				<div class="option">
				</div>
				<div class="money-box">
					<div class="chosed">已选择<span id="total_number">0</span>件商品</div>
					<div class="sumprice">
						<span><em>总价（不含运费） ：</em><i id="total_price" class="summoney">¥0</i></span>
						<span><em>已节省：</em><i>-¥0</i></span>
					</div>
					<div class="sumbtn">
						<a class="sum-btn" href="javascript:;">结算</a>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="liked">
				<ul class="sui-nav nav-tabs">
					<li class="active">
						<a href="#index" data-toggle="tab">猜你喜欢</a>
					</li>
				</ul>
				<div class="clearfix"></div>
				<div class="tab-content">
					<div id="index" class="tab-pane active">
						<div id="myCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
							<div class="carousel-inner">
								<div class="active item">
									<ul>
									    <?php foreach($lists as $k=>$v): ?>
										<li>
											<img src="<?php echo $v['goods_logo']; ?>" />
											<div class="intro">
												<i><?php echo $v['goods_name']; ?></i>
											</div>
											<div class="money">
												<span>$<?php echo $v['goods_price']; ?></span>
											</div>
											<div class="incar">
												<a href="<?php echo url('home/goods/detail', ['id'=>$v['id']]); ?>" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<?php endforeach; ?>
									</ul>
								</div>
								<div class="item">
									<ul>
									    <?php foreach($lists as $k=>$v): ?>
										<li>
												<img src="<?php echo $v['goods_logo']; ?>" />
											<div class="intro">
												<i><?php echo $v['goods_name']; ?></i>
											</div>
											<div class="money">
												<span>$<?php echo $v['goods_price']; ?></span>
											</div>
											<div class="incar">
												<a href="<?php echo url('home/goods/detail', ['id'=>$v['id']]); ?>" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
                                        <?php endforeach; ?>
									</ul>
								</div>
							</div>
							<a href="#myCarousel" data-slide="prev" class="carousel-control left">‹</a>
							<a href="#myCarousel" data-slide="next" class="carousel-control right">›</a>
						</div>
					</div>
					<div id="profile" class="tab-pane">
						<p>特惠选购</p>
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
	$(function(){
		//重新计算已选商品数量和金额
		var change_total = function(){
			//获取到选中行 row_check选中的
			var total_number = 0;
			var total_price = 0;
			$('.row_check:checked').each(function(i, v){
				total_number += parseInt( $(v).closest('ul').find('.current_number').val() );
				total_price += parseFloat( $(v).closest('ul').find('.sum').html() );
			});
			//将累加的价格和数量放到页面中
			$('#total_number').html(total_number);
			$('#total_price').html('￥' + total_price);
		};

		/**
		 * 修改购买数量
		 * @param number 修改数量
		 * @param element 触发事件的标签
		 */
		var change_num = function(number, element){
			//需要的参数  id  number
			var data = {
				"id":$(element).closest('ul').attr('cart_id'),
				"number":number
			};
			//发送ajax请求
			$.ajax({
				"url":"<?php echo url('home/cart/changenum'); ?>",
				"type":"post",
				"data":data,
				"dataType":"json",
				"success":function(res){
					if(res.code != 200){
						alert(res.msg);return;
					}
					//将新的数量展示到页面
					$(element).closest('ul').find('.current_number').val(number);
					//将新的数量修改到当前行ul的number属性上，用于出错后恢复数据的
					$(element).closest('ul').attr('number', number);
					//重新计算小计金额
					//取当前行的单价
					var price = parseFloat( $(element).closest('ul').find('.price').html() );
					//计算小计金额
					var sum = price * number;
					//将小计金额放到页面中
					$(element).closest('ul').find('.sum').html(sum);
					//重新计算已选商品数量和金额
					change_total();
				}
			});
		};
		//全选效果
		$('#check_all').change(function(){
			//获取全选的选中状态  checked属性
			var status = $(this).prop('checked');
			//将每一行的checkbox状态 和全选设置成一样的
			$('.row_check').prop('checked', status);
			//重新计算已选商品数量和金额
			change_total();
			//修改选中状态到购物车数据中
			//参数  id  status
			var data = {
				"id":"all",
				"status":$(this).prop('checked') ? 1 : 0,
			};
			//发送ajax请求
			$.ajax({
				"url":"<?php echo url('home/cart/changestatus'); ?>",
				"type":"post",
				"data":data,
				"dataType":"json",
				"success":function(res){
					if(res.code != 200){
						alert(res.msg);return;
					}
				}
			});
		});

		//每一行checkbox选中
		$('.row_check').change(function(){
			//判断 全选是否应该选中
			check_all();
			//重新计算已选商品数量和金额
			change_total();
			//修改选中状态到购物车数据中
			//参数  id  status
			var data = {
				"id":$(this).closest('ul').attr('cart_id'),
				"status":$(this).prop('checked') ? 1 : 0,
			};
			//发送ajax请求
			$.ajax({
				"url":"<?php echo url('home/cart/changestatus'); ?>",
				"type":"post",
				"data":data,
				"dataType":"json",
				"success":function(res){
					if(res.code != 200){
						alert(res.msg);return;
					}
				}
			});
		});
		//页面刷新，直接判断 全选是否应该选中
		function check_all(){
			//判断 选中的行数  和 总行数 是否相等
			var status = $('.row_check:checked').length == $('.row_check').length;
			//设置全选的选中状态 checked属性
			$('.check_all').prop('checked', status);
		}
		check_all();
		//重新计算已选商品数量和金额
		change_total();

		//修改购买数量
		//+号
		$('.plus').click(function(){
			var number = parseInt( $(this).closest('ul').find('.current_number').val() );
			number += 1;

			//调用封装的函数
			change_num(number, this);
		});
		//-号
		$('.mins').click(function(){
			var number = parseInt( $(this).closest('ul').find('.current_number').val() );
			if(number == 1) return;
			number -= 1;
			//调用封装的函数
			change_num(number, this);
		});
		//input输入框直接修改
		$('.current_number').change(function(){
			var number = $(this).val();
			//检测输入的值 是否数字
			if(isNaN(number)){
				//不是数字
				alert('购买数量必须是数字');
				var old_number = $(this).closest('ul').attr('number');
				$(this).val(old_number);
				return;
			}
			if(parseInt(number) != number || number <= 0){
				//数量必须是正整数
				alert('购买数量必须是正整数');
				var old_number = $(this).closest('ul').attr('number');
				$(this).val(old_number);
				return;
			}
			//调用封装的函数
			change_num(number, this);
		});

		//删除
		$('.delete').click(function(){
			//获取id 删除条件参数
			var data = {
				"id":$(this).closest('ul').attr('cart_id')
			};
			var that = this;
			//发送ajax请求
			$.ajax({
				"url":"<?php echo url('home/cart/delcart'); ?>",
				"type":"post",
				"data":data,
				"dataType":"json",
				"success":function(res){
					if(res.code != 200){
						alert(res.msg);return;
					}
					//将当前行从页面移除
					//$(that).closest('ul').parent().remove();
					$(that).closest('.cart-list').remove();
					//重新计算已选商品数量和金额
					change_total();
				}
			});
		});

		//结算
		$('.sum-btn').click(function(){
			//判断是否有选中的购物记录
			if($('.row_check:checked').length == 0){
				alert('请选择要结算的商品');
				return;
			}
			//跳转到结算页
			location.href = "<?php echo url('home/order/create'); ?>";
		});
	});
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
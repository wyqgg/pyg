<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"/www/wwwroot/pyg/public/../application/home/view/order/create.html";i:1619179077;s:50:"/www/wwwroot/pyg/application/home/view/layout.html";i:1619203727;}*/ ?>
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


	<title>结算页</title>

    <link rel="stylesheet" type="text/css" href="/static/home/css/pages-getOrderInfo.css" />

	<script type="text/javascript" src="/static/home/js/pages/getOrderInfo.js"></script>

	<!--主内容-->
	<div class="cart py-container">
		<div class="checkout py-container">
			<div class="checkout-tit">
				<h4 class="tit-txt">填写并核对订单信息</h4>
			</div>
			<div class="checkout-steps">
				<!--收件人信息-->
				<div class="step-tit">
					<h5>收件人信息<span><a data-toggle="modal" data-target=".edit" data-keyboard="false" class="newadd">新增收货地址</a></span></h5>
				</div>
				<div class="step-cont">
					<div class="addressInfo">
						<ul class="addr-detail">
							<?php foreach($address as $v): ?>
							<li class="addr-item">
								<div address_id="<?php echo $v['id']; ?>" class="con name <?php if(($v['is_default'])): ?>selected<?php endif; ?>"><a href="javascript:;" ><em><?php echo $v['consignee']; ?></em><span title="点击取消选择">&nbsp;</span></a></div>
								<div class="con address">
									<span class="consignee_name"><?php echo $v['consignee']; ?></span>
									<span class="consignee_address"><?php echo $v['area']; ?> <?php echo $v['address']; ?></span>
									<span class="consignee_phone"><?php echo $v['phone']; ?></span>
									<!--<span class="base">默认地址</span>-->
									<span class="edittext">
										<a class="edit_address" data-id="<?php echo $v['id']; ?>" data-toggle="modal" data-target=".edit" data-keyboard="false" >编辑</a>&nbsp;&nbsp;
										<a class="delete_address" data-id="<?php echo $v['id']; ?>" href="javascript:;">删除</a>
									</span>
								</div>
								<div class="clearfix"></div>
							</li>
							<?php endforeach; ?>
						</ul>
						<!--添加地址-->
                          <div  tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade edit">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
						        <h4 id="myModalLabel" class="modal-title">添加收货地址</h4>
						      </div>
						      <div class="modal-body">
						          
						      	<form action="<?php echo url('home/order/edit_address'); ?>" id="address_form" class="sui-form form-horizontal">
						      		 <div class="control-group">
									    <label class="control-label">收货人：</label>
									    <div class="controls">
									        <input type="hidden" name="id" >
									      <input type="text" name="name" class="input-medium">
									    </div>
									  </div>
									   
									   <div class="control-group">
									    <label class="control-label">省市区名称：</label>
									    <div class="controls">
									      <input type="text" name="area" class="input-large">
									    </div>
									  </div>
									   
									   <div class="control-group">
									    <label class="control-label">详细地址：</label>
									    <div class="controls">
									      <input type="text" name="address" class="input-large">
									    </div>
									  </div>
									   <div class="control-group">
									    <label class="control-label">联系电话：</label>
									    <div class="controls">
									      <input type="text" name="phone" class="input-medium">
									    </div>
									  </div>
						      	</form>
						      	
						      </div>
						      <div class="modal-footer">
						        <button type="button" id="submit" data-ok="modal" class="sui-btn btn-primary btn-large">确定</button>
						        <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
						      </div>
						    </div>
						  </div>
						</div>
						 <!--确认地址-->
					</div>
					<div class="hr"></div>
					<!--<div class="recommendAddr">-->
					<!--	<ul class="addr-detail">-->
					<!--		<li class="addr-item">-->
					<!--			<div class="con name"><a href="javascript:;" class="selected">匹配自提点<span title="点击取消选择">&nbsp;</a></div>-->
					<!--			<div class="con address">时代思远书店 中关村软件园9号楼时代思远书店</div>-->
					<!--		</li>-->
					<!--	</ul>-->
					<!--</div>-->
				</div>
				<div class="hr"></div>
				<!--支付和送货-->
				<div class="payshipInfo">
					<!--<div class="step-tit">-->
						<!--<h5>支付方式</h5>-->
					<!--</div>-->
					<!--<div class="step-cont">-->
						<!--<ul class="payType">-->
							<!--<li class="selected" pay_type="alipay">支付宝<span title="点击取消选择"></span></li>-->
							<!--<li pay_type="wechat">微信付款<span title="点击取消选择"></span></li>-->
							<!--<li pay_type="card">银联<span title="点击取消选择"></span></li>-->
							<!--<li pay_type="cash">货到付款<span title="点击取消选择"></span></li>-->
						<!--</ul>-->
					<!--</div>-->
					<div class="hr"></div>
					<div class="step-tit">
						<h5>送货清单</h5>
					</div>
					<div class="step-cont">
						<ul class="send-detail">
							<li>
								<div class="sendType">
									<span>配送方式：</span>
									<ul>
										<li>
											<div class="con express">天天快递</div>
											<div class="con delivery">配送时间：预计8月10日（周三）09:00-15:00送达</div>
										</li>
									</ul>
								</div>
								<div class="sendGoods">
									<span>商品清单：</span>
									<?php foreach($cart_data as $v): ?>
									<ul class="yui3-g">
										<li class="yui3-u-1-6">
											<span><img src="<?php echo $v['goods_logo']; ?>"/></span>
										</li>
										<li class="yui3-u-7-12">
											<!--<div class="desc"><?php echo $v['goods_name']; ?><br></div>-->
											<div class="seven">7天无理由退货</div>
										</li>
										<li class="yui3-u-1-12">
											<div class="price">￥<?php echo $v['goods_price']; ?></div>
										</li>
										<li class="yui3-u-1-12">
											<div class="num">X<?php echo $v['number']; ?></div>
										</li>
										<li class="yui3-u-1-12">
											<div class="exit"><?php if(($v['goods_number'] >= $v['number'])): ?>有货<?php else: ?>无货<?php endif; ?></div>
										</li>
									</ul>
									<?php endforeach; ?>
								</div>
							</li>
							<li></li>
							<li></li>
						</ul>
					</div>
					<div class="hr"></div>
				</div>
				<div class="linkInfo">
					<div class="step-tit">
						<h5>发票信息</h5>
					</div>
					<div class="step-cont">
						<span>普通发票（电子）</span>
						<span>个人</span>
						<span>明细</span>
					</div>
				</div>
				<div class="cardInfo">
					<div class="step-tit">
						<h5>使用优惠/抵用</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="order-summary">
			<div class="static fr">
				<div class="list">
					<span><i class="number"><?php echo $total_number; ?></i>件商品，总商品金额</span>
					<em class="allprice">¥<?php echo $total_price; ?></em>
				</div>
				<div class="list">
					<span>返现：</span>
					<em class="money">0.00</em>
				</div>
				<div class="list">
					<span>运费：</span>
					<em class="transport">0.00</em>
				</div>
			</div>
		</div>
		<div class="clearfix trade">
			<div class="fc-price">应付金额:　<span class="price">¥<?php echo $total_price; ?></span></div>
			<div class="fc-receiverInfo">寄送至:北京市海淀区三环内 收货人：某某某 159****3201</div>
		</div>
		<div class="submit">
			<a class="sui-btn btn-danger btn-xlarge" href="javascript:;">提交订单</a>
		</div>
	</div>
	<form id="orderForm" action="<?php echo url('home/order/save'); ?>" method="post" style="display: none;">
		<input type="hidden" name="address_id" value="">
	</form>
	<script>
		$(function(){
			//封装函数 将选中的地址，放到页面右下角展示
			var show_address = function(element){
				//获取到选中的地址信息
				if(element){
					var li = $(element).closest('li');
				}else{
					var li = $('.addressInfo').find('.name.selected').closest('li');
				}
				var consignee_address = li.find('.consignee_address').html();
				var consignee_phone = li.find('.consignee_phone').html();
				var consignee_name = li.find('.consignee_name').html();
				//展示到页面右下角
				$('.fc-receiverInfo').html('寄送至:' + consignee_address +' 收货人：' + consignee_name + ' ' + consignee_phone);
			};
			show_address();
            //修改地址信息
            $('.edit_address').click(function(){
                var id = $(this).data('id');
                console.log(id);
                var data = 
                {
                    'id':id
                }
                $.ajax({
                    'url':"<?php echo url('home/order/edit_address_info'); ?>",
                    'type':'post',
                    'dataType':'JSON',
                    'data':data,
                    'success':function(data){
                        $('input[name=id]').val(data.address.id);
                        $('input[name=name]').val(data.address.consignee);
                        $('input[name=phone]').val(data.address.phone);
                        $('input[name=area]').val(data.address.area);
                        $('input[name=address]').val(data.address.address);
                    }
                })
            });
            //提交修改地址信息表单
            $('#submit').click(function(){
                var id = $('input[name=id]').val();
                var name = $('input[name=name]').val();
                var phone = $('input[name=phone]').val();
                var address = $('input[name=address]').val();
                var area = $('input[name=area]').val();
                data={
                    'id':id,
                    'consignee':name,
                    'phone':phone,
                    'address':address,
                    'area':area
                }
                $.ajax({
                    'url':"<?php echo url('home/order/edit_address'); ?>",
                    'type':'post',
                    'dataType':'JSON',
                    'data':data,
                    'success':function(res){
                        // console.log(res);
                        window.location.reload();
                    }
                })
            });
            //删除地址信息
            $('.delete_address').click(function(){
                var id = $(this).data('id');
                var data = {
                    'id':id
                }
                $.ajax({
                    'url':"<?php echo url('home/order/delete_address'); ?>",
                    'type':'post',
                    'dataType':'JSON',
                    'data' :data,
                    'success':function(res){
                        // alert(res.msg)
                        window.location.reload();
                    }
                })
            })
            
			//点击地址 切换右下角的地址
			$('.addressInfo').find('.name').click(function(){
				show_address(this);
			});

			//提交订单
			$('.submit').click(function(){
				//获取选中的收货地址id
				var address_id = $('.addressInfo').find('.name.selected').attr('address_id');
				//将地址id放到表单中
				$('input[name=address_id]').val(address_id);
				//提交表单
				$('#orderForm').submit();
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
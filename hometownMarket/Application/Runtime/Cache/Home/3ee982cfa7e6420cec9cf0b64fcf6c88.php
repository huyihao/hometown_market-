<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<!--CopyRight by AlexGordon
-->
<html lang="zh">
<head>
    	<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>
    		华南农业大学红满堂二手市场
    	</title>
    	<link rel="stylesheet" type="text/css" href="/hometownMarket/Public/Static/bootstrap/css/bootstrap.css" />
    	<link rel="stylesheet" type="text/css" href="/hometownMarket/Public/Css/index.css" />
    	<link rel="stylesheet" href="/hometownMarket/Public/Css/responsive-nav.css">
        <link rel="stylesheet" href="/hometownMarket/Public/Css/styles.css">
        <script src="/hometownMarket/Public/Js/responsive-nav.min.js"></script>
    	<script src="/hometownMarket/Public/Js/jquery-2.1.1.min.js"></script>
    	<script type="text/javascript" src="/hometownMarket/Public/Js/scroll.js"></script>
    	<script src="/hometownMarket/Public/Static/bootstrap/js/bootstrap.min.js"></script>
</head>
<body >
		
		<!-- 定义主页的头部 //-->
	    <div class="container">
	      <div class="row header">
	      	<div class="col-lg-2 col-md-2 col-xs-12">
	         <a href="<?php echo U('Home/Index/index');?>"><img src="/hometownMarket/Public/Img/marketlogo.gif"/></a>
	        </div>
	      </div>
	    </div>
 		<!--定义导航栏-->
	    <div class="container">
	      <div class="nav-collapse">
	      	<ul > 
	      	    <li class="current"><a href="<?php echo U('Home/Index/index');?>">首页</a></li> 
	      	    <?php if(($_SESSION['userid'] == null)): ?><li data-toggle="modal" data-target="#logModal"><a href="#"> 注册/登陆</a></li>
	      	    <?php else: ?>
	      	    <li><a href="<?php echo U('Home/Index/logout');?>"><?php echo ($_SESSION['username']); ?>!欢迎回来,注销请按这</a></li><?php endif; ?>
	      	    <li><a href="<?php echo U('Home/Goods/listType');?>">发布商品</a></li> 
	      	    <li><a href="<?php echo U('Home/Goods/searchGoods');?>">搜索商品</a></li> 
	      	    <li><a href="#">红满堂社区</a></li> 
	      	    <li><a href="#">帮助/必看</a></li>
	      	</ul> 
	      </div>
	    </div>
	    <!-- 登陆弹出框 -->
            <div class="modal fade" id="logModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">登陆框</h4>
                  </div>
                  <form id="Login_form" class="modal-body" action="<?php echo U('Home/Index/login');?>" method="post">
                 	<div id="login_notice"></div>
                    <div class="form-group">
                            <label for="username">用户名</label>
                            <input name="username" type="text" class="form-control" id="username" placeholder
                              ="请输入您的用户名" >
                     </div>
                     <div class="form-group">
                          <label for="password">密码</label>
                          <input name="password" type="password" class="form-control" id="password" placeholder
                            ="请输入您的密码" >
                     </div>
                  </form>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" id="loginbtn" class="btn btn-primary" href="<?php echo U('Home/Index/login');?>">登陆</button>
                    <a href="<?php echo U('Home/Index/register');?>"><button type="button" class="btn btn-success"  >注册</button></a>
                  </div>
                </div>
              </div>
            </div>
            <!--弹出框结束-->
           
	    
		<!-- 定义二手市场主体部分 //-->
		
		<div class="container">
		  <div class="row cvbody">
		  <!-- 这里定义两个区域，布局定义如下：//-->
		  <!-- 左边布局 -->
		  
		<div class="col-lg-9 col-md-9 col-sm-12">
	         <div class="panel panel-default">
	         
					  <div class="panel-heading">
					    <h2 class="panel-title">查看商品信息</h2>
					  </div>
				  <div class="panel-body">
				     <div class="form-group">
                            <label class="" for="goodsname"><b>商品名：</b></label>
                            <label class="" for="goodsname"><h3><?php echo ($goodsDesc["secondgoods_name"]); ?></h3></label>
                     </div>
                     <?php if($picture[count] != 0): ?><div class="form-group">
                            <label class="" for="Pic"><b>商品图片：</b></label>
                            <div id="myCarousel" class="carousel slide bottom-margin">
			     			<!-- 轮播（Carousel）指标 -->
			               <ol class="carousel-indicators">
			               
			                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			               	<?php if(is_array($count)): foreach($count as $key=>$count): ?><li data-target="#myCarousel" data-slide-to="<?php echo ($count); ?>"></li><?php endforeach; endif; ?>
			               </ol>   
					     	<!-- 轮播（Carousel）项目 -->
					        <div class="carousel-inner">
					            <div class="item active">
					               <img src="/hometownMarket/Public/Img/temp_photos.gif"  >
					            </div>
					          <?php if(is_array($picture["data"])): foreach($picture["data"] as $key=>$ul): ?><div class="item">
					               <img src="/hometownMarket/Uploads/<?php echo ($ul["seconduploads_location"]); echo ($ul["seconduploads_bewrite"]); ?>" >
					            </div><?php endforeach; endif; ?>
					      	</div>
					     		<!-- 轮播（Carousel）导航 -->
					           <a class="carousel-control left" href="#myCarousel" 
					              data-slide="prev">&lsaquo;</a>
					           <a class="carousel-control right" href="#myCarousel" 
					              data-slide="next">&rsaquo;</a>
			    	</div>
                     </div><?php endif; ?>
                     <div class="form-group">
                     
                     		<label for="button">
                     	<?php if($_SESSION['userid'] == null): ?><button class="btn btn-default tooltip-hide" data-toggle="tooltip" 
                            data-placement="left" title="请登录后再点击">联系发布者</button>
                            <button class="btn btn-default tooltip-hide" data-toggle="tooltip" 
                            data-placement="right" title="请登录后再点击">下订单</button>
                         <?php else: ?>
                         	<button data-toggle="modal" data-target="#orderSendModal" type="button" class="btn btn-default " >联系发布者</button>
                         	<?php if($goodsDesc[info] == 1): ?><button data-toggle="tooltip" data-placement="right" title="商品已过期或成功交易" type="button"  class="btn btn-default tooltip-hide">下订单</button>
                            <?php else: ?>
                            	<button data-toggle="modal" data-target="#orderModal" type="button" class="btn btn-default">下订单</button><?php endif; endif; ?>
                            </label>
                         
                     </div>
                     <!-- 发送消息弹出框 -->
					            <div class="modal fade" id="orderSendModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					              <div class="modal-dialog">
					                <div class="modal-content">
					                  <div class="modal-header">
					                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					                    <h4 class="modal-title" id="myModalLabel">发送消息</h4>
					                  </div>
					                  <form id="Message_form" class="modal-body" action="<?php echo U('Home/Message/sendMessage');?>" method="post">
					                 	<div id="message_notice"></div>
					                    <div class="form-group">
					                            <label for="title">消息标题</label>
					                            <input name="message_title" type="text" class="form-control" id="message_title" placeholder
					                              ="请输入您的标题" >
					                     </div>
					                     <div class="form-group">
					                          <label for="receiver">消息接收方</label>
					                          <input name="message_to_username" type="text" class="form-control" id="message_to_username" value="<?php echo ($goodsDesc["secondgoods_username"]); ?>" >
					                     </div>
					                     <div class="form-group">
					                          <label for="password">消息发送方</label>
					                          <input name="message_from_username" type="text" class="form-control " disabled id="message_from_userid" value="<?php echo ($_SESSION['username']); ?>" >
					                     </div>
					                     <div class="form-group">
                          					  <label for="desc">消息内容</label>
                            				  <textarea id="message_msg" name="message_msg" class="form-control" rows="5" ></textarea>
                            			</div>
					                  </form>
					                  <div class="modal-footer">
					                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					                    <button type="button" id="sendbtn" class="btn btn-primary" >发送</button>
					                  </div>
					                </div>
					              </div>
					            </div>
            					<!--弹出框结束-->
            					<!-- 订单按钮 -->
            					<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					              <div class="modal-dialog">
					                <div class="modal-content">
					                  <div class="modal-header">
					                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					                    <h4 class="modal-title" id="myModalLabel">感兴趣</h4>
					                  </div>
					                  <form id="Message_form1" class="modal-body" action="<?php echo U('Home/Message/sendOrder',array('secondgoods_id'=>$goodsDesc['secondgoods_id']));?>" method="post">
					                 	<div id="message_ordernotice"></div>
					                    <div class="form-group">
					                            <label for="title">确定感兴趣并下订单？</label>
					                            <input name="message_title" type="hidden" class="form-control" id="message_title" value="商品订购（或感兴趣）:<?php echo ($goodsDesc["secondgoods_name"]); ?>" >
					                     </div>
					                          <input name="message_to_username" type="hidden" class="form-control" id="message_to_username" value="<?php echo ($_SESSION['username']); ?>" >
					                     	  <input name="message_to_userid" type="hidden" class="form-control" id="message_to_userid" value="<?php echo ($_SESSION['userid']); ?>" >
					                     	  <input id="message_msg" type="hidden" name="message_msg" class="form-control" value="该信息由系统自动发送给您!用户：<?php echo ($_SESSION['username']); ?> 订购或对您发布的商品信息表示感兴趣，您可以通过短信方式联系他
													[浏览商品]" >
                            			
					                  </form>
					                  <div class="modal-footer">
					                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					                    <button type="button" id="orderbtn" class="btn btn-primary" >确认</button>
					                  </div>
					                </div>
					              </div>
					            </div>
					            <!-- 订单按钮结束 -->
                     <div class="form-group">
                            <label class="" for="goodsname"><b>感兴趣：</b></label>
                            <label class="" for="goodsname">
                            <h3>
                            <?php echo ($goodsDesc["secondgoods_orders"]); ?>人
                            </h3>
                            </label>
                     </div>
                     <div class="form-group">
                            <label class="" for="goodsname"><b>商品发布者:</b></label>
                            <label class="" for="goodsname"><h3><?php echo ($goodsDesc["secondgoods_username"]); ?></h3></label>
                     </div>
                     <div class="form-group">
                            <label for="goodsclass">商品分类：</label>
                             <label for="goodsclass"><h3><?php echo ($goodsDesc["secondgoods_classname"]); ?></h3></label>
                            
                     </div>
                     <div class="form-group">
                            <label for="goodstradetype">类型：</label>
                            <?php if($goodsDesc['secondgoods_tradetype'] == 0): ?><label for="goodstradetype"><h3>出售</h3></label>
                             <?php else: ?>
                             <label for="goodstradetype"><h3>购买</h3></label><?php endif; ?>
                     </div>
                     <div class="form-group">
                           <label for="hownew">新旧程度：</label>
                           	<?php if($goodsDesc['secondgoods_hownew'] != 0): ?><label for="goodshownew"><h3><?php echo ($goodsDesc["secondgoods_hownew"]); ?>成新</h3></label>
						      <?php else: ?>
						     	<label for="goodshownew"><h3>比较旧了</h3></label><?php endif; ?>
						         
                     </div>
                     <div class="form-group">
                     		<label for="price">每件价格：</label>
                     		<label for="price"><h3><?php echo ($goodsDesc["secondgoods_price"]); ?>元</h3></label>
                     </div>
                     <div class="form-group">
                           <label for="delivertype">交易方式：</label>
						    <label for="delibertype"><h3>
						    <?php if($goodsDesc['secondgoods_delivertype'] == 0): ?>当面交易
						    <?php if($goodsDesc['secondgoods_delivertype'] == 1): ?>邮寄对方付款<?php endif; ?>
						    <?php else: ?>
						    	邮寄方付款<?php endif; ?>
						    </h3>
						    </label>
                     </div>
                    
                     <div class="form-group">
                           <label for="paidtype">付款方式：</label>
						    <?php if($goodsDesc['secondgoods_paidtype'] == 0): ?><label for="paidtype"><h3>现金交易</h3></label>
						   	<?php if($goodsDesc['secondgoods_paidtype'] == 1): ?><label for="paidtype"><h3>银行转账</h3></label><?php endif; ?>
						   	<?php else: ?>
						   		<label for="paidtype"><h3>任意方式</h3></label><?php endif; ?>
                     </div>
                     <div class="form-group">
                     		<label for="goodsnums">数量:</label>
                     		<label for="goodsnums"><h3><?php echo ($goodsDesc["secondgoods_goodsnums"]); ?></h3></label>
                     </div>
                     <?php if($_SESSION['userid'] == $goodsDesc['secondgoods_usercode']): ?><div class="form-group">
                           
                            <?php if($godosDesc['secondgoods_efficiency'] == 2): ?><label for="efficiency">交易状态</label>
                           :商品已过期<?php endif; ?>
                           <?php if($godosDesc['secondgoods_efficiency'] == 0): ?><label for="efficiency">交易状态：设为成功交易后，用户将不能下单</label>
						      <select id="secondgoods_efficiency" name="secondgoods_efficiency" class="form-control" onchange="func()">
						      <option></option>
						       <option value=0 >正常交易</option>
						         <option value=1  >成功交易</option>
						        </select><?php endif; ?> 
                     </div>
                     <?php else: ?>
                     	<div class="form-group">
                            <label for="efficiency">交易状态:</label>
                            <label for="efficiency"><h3><?php echo ($goodsDesc['status']); ?></h3></label>
                     </div><?php endif; ?>
                     <div class="form-group">
                           <label for="secondgoods_pastdate">交易有效时间：</label>
                           	<label for ="secondgoods_pastdate">
                           		<h3>
                           	<?php echo (date("Y-m-d H:i:s",$goodsDesc['secondgoods_postdate'])); ?>&nbsp至&nbsp<?php echo (date("Y-m-d H:i:s",$goodsDesc['secondgoods_pastdate'])); ?>
                           		</h3>
                           	</label>
					 </div>
                     <div class="form-group">
                          <label for="notice">注意事项</label>
                         	 同一条信息（内容）的商品，3天才能重发一次，否则禁用帐号一个星期！
							多件商品请尽量发在同一帖子内，如发现有故意将每件商品独立发布者，禁用帐号一个星期，屡犯者作删号处理！
                     </div>
                     <div class="form-group">
                          <label for="desc">商品描述</label>
                            <textarea id="secondgoods_bewrite" disabled name="secondgoods_bewrite" class="form-control" rows="5"  ><?php echo ($goodsDesc['secondgoods_bewrite']); ?></textarea>
                           
                     </div>
                    
                      
			
				  </div>
			</div>
		</div>
	    

		  <!-- 右边内容 -->
		  
		   <div class="col-lg-3 col-md-3 col-xs-12">
		   <div class="row">
		       	<div class="panel panel-default hidden-panel bottom-margin">
		          <div class="panel-heading"><h4>公告栏</h4></div>
		           <div class="list_notice">
		           <ul>
		           	<?php if(is_array($notice_list["notice"])): foreach($notice_list["notice"] as $key=>$ul): ?><li><?php echo ($ul["notice_title"]); ?></li><?php endforeach; endif; ?>
					</ul>
		           </div>
		        </div>
		   
		        <div class="bbox">
		          <div class="panel-group" id="accordion2">
		            <div class="panel-heading">
		                <strong style="font-size: 30px;">市场目录</strong>
		            </div>
		            <?php if(is_array($cate[0])): foreach($cate[0] as $key=>$ul): ?><div class="panel panel-default">
		                    <div id="collapse1" class="panel-collapse collapse" style="height: 0px;">
		                        <div  class="panel-body">
		                            <ul class="nav nav-pills nav-stacked">
		                            	<?php if(is_array($cate[1])): foreach($cate[1] as $key=>$vo1): ?><li><a href="<?php echo U('Home/Goods/listGoodsByCate',array('cate_class'=>$vo1[cate_class]));?>"><?php echo ($vo1["cate_name"]); ?></a></li><?php endforeach; endif; ?>
		                            </ul>
		                        </div>
		                    </div>
		                    <div id="collapse2" class="panel-collapse collapse" style="height: 0px;">
		                        <div  class="panel-body">
		                            <ul class="nav nav-pills nav-stacked">
		                            	<?php if(is_array($cate[2])): foreach($cate[2] as $key=>$vo2): ?><li><a href="<?php echo U('Home/Goods/listGoodsByCate',array('cate_class'=>$vo2[cate_class]));?>"><?php echo ($vo2["cate_name"]); ?></a></li><?php endforeach; endif; ?>
		                            </ul>
		                        </div>
		                    </div>
		                    <div id="collapse3" class="panel-collapse collapse" style="height: 0px;">
		                        <div  class="panel-body">
		                            <ul class="nav nav-pills nav-stacked">
		                            	<?php if(is_array($cate[3])): foreach($cate[3] as $key=>$vo3): ?><li><a href="<?php echo U('Home/Goods/listGoodsByCate',array('cate_class'=>$vo3[cate_class]));?>"><?php echo ($vo3["cate_name"]); ?></a></li><?php endforeach; endif; ?>
		                            </ul>
		                        </div>
		                    </div>
		                    <div id="collapse4" class="panel-collapse collapse" style="height: 0px;">
		                        <div  class="panel-body">
		                            <ul class="nav nav-pills nav-stacked">
		                            	<?php if(is_array($cate[4])): foreach($cate[4] as $key=>$vo4): ?><li><a href="<?php echo U('Home/Goods/listGoodsByCate',array('cate_class'=>$vo4[cate_class]));?>"><?php echo ($vo4["cate_name"]); ?></a></li><?php endforeach; endif; ?>
		                            </ul>
		                        </div>
		                    </div>
		                    <div id="collapse5" class="panel-collapse collapse" style="height: 0px;">
		                        <div  class="panel-body">
		                            <ul class="nav nav-pills nav-stacked">
		                            	<?php if(is_array($cate[5])): foreach($cate[5] as $key=>$vo5): ?><li><a href="<?php echo U('Home/Goods/listGoodsByCate',array('cate_class'=>$vo5[cate_class]));?>"><?php echo ($vo5["cate_name"]); ?></a></li><?php endforeach; endif; ?>
		                            </ul>
		                        </div>
		                    </div>
		                    <div id="collapse6" class="panel-collapse collapse" style="height: 0px;">
		                        <div  class="panel-body">
		                            <ul class="nav nav-pills nav-stacked">
		                            	<?php if(is_array($cate[6])): foreach($cate[6] as $key=>$vo6): ?><li><a href="<?php echo U('Home/Goods/listGoodsByCate',array('cate_class'=>$vo6[cate_class]));?>"><?php echo ($vo6["cate_name"]); ?></a></li><?php endforeach; endif; ?>
		                            </ul>
		                        </div>
		                    </div>
		                    <div id="collapse7" class="panel-collapse collapse" style="height: 0px;">
		                        <div  class="panel-body">
		                            <ul class="nav nav-pills nav-stacked">
		                            	<?php if(is_array($cate[7])): foreach($cate[7] as $key=>$vo7): ?><li><a href="<?php echo U('Home/Goods/listGoodsByCate',array('cate_class'=>$vo7[cate_class]));?>"><?php echo ($vo7["cate_name"]); ?></a></li><?php endforeach; endif; ?>
		                            </ul>
		                        </div>
		                    </div>
		                    <div  class="panel-heading accordion-toggle" data-toggle="collapse"
		                        data-parent="#accordion2" href="#collapse<?php echo ($ul["cate_class"]); ?>">
		                        <?php echo ($ul["cate_name"]); ?>
		                    </div>
		               </div><?php endforeach; endif; ?>
		            </div>
		         </div>
		        
		        <div class="bbox">
		          <h4>站内链接</h4>
		          <p>
		            <span class="glyphicon glyphicon-tree-deciduous"></span> 广告一
		            <p><span class="glyphicon glyphicon-plane"></span> 广告二</p>
		            <p><span class="glyphicon glyphicon-cutlery"></span> 广告三</p>
		            <p><span class="glyphicon glyphicon-music"></span> 广告四</p>
		          </p>
		        </div>
		    </div>
		    </div>
  
		   </div>
		</div>
		<!-- 底部版权 -->
		
		<div class="container">
		  <div class="row"><div class="footer text-center">CopyRight</div></div>
		</div>
		



<script>
      var navigation = responsiveNav(".nav-collapse", {
        animate: true,                    // Boolean: Use CSS3 transitions, true or false
        transition: 284,                  // Integer: Speed of the transition, in milliseconds
        label: "Menu",                    // String: Label for the navigation toggle
        insert: "after",                  // String: Insert the toggle before or after the navigation
        customToggle: "",                 // Selector: Specify the ID of a custom toggle
        closeOnNavClick: false,           // Boolean: Close the navigation when one of the links are clicked
        openPos: "relative",              // String: Position of the opened nav, relative or static
        navClass: "nav-collapse",         // String: Default CSS class. If changed, you need to edit the CSS too!
        navActiveClass: "js-nav-active",  // String: Class that is added to <html> element when nav is active
        jsClass: "js",                    // String: 'JS enabled' class which is added to <html> element
        init: function(){},               // Function: Init callback
        open: function(){},               // Function: Open callback
        close: function(){}               // Function: Close callback
      });
      
      
    $(function(){
    	
    $('.tooltip-hide').tooltip('hide');
	
	$('#sendbtn').click(function(){
		var action=$('#Message_form').attr('action');
		var Formattr=$('#Message_form').serialize();
		console.log(action);
		$.post(action,Formattr,function(data){
			$('#message_notice').html(data.info);
			console.log(data.info);
			if(data.info=="发送成功!")
				setTimeout("window.location.href=\"<?php echo U('Home/Index/index');?>\"",1000);
			
		});
	})
	$('#orderbtn').click(function(){
		var action=$('#Message_form1').attr('action');
		var Formattr=$('#Message_form1').serialize();
		console.log(Formattr);
		$.post(action,Formattr,function(data){
			$('#message_ordernotice').html(data.info);
			console.log(data.info);
				setTimeout("window.location.reload()",1000);
			
		});
	})
	$('#deleteGoodsbtn').click(function(){
		var action="<?php echo U('Home/Goods/deleteGoods',array('secondgoods_id'=>$ul['secondgoods_id']));?>";
		$.post(action,function(data){
			$('#message_deleteGoodsnotice').html(data.info);
			console.log(data.info);
				setTimeout("window.location.reload()",0);
			
		});
	})
	$("#secondgoods_efficiency").change(function(){
		var goodsId=<?php echo ($goodsDesc['secondgoods_id']); ?>;
		console.log(goodsId);
		var checkValue=$("#secondgoods_efficiency").val(); 
		var action="/hometownMarket/index.php/Home/Goods/setStatus/secondgoods_id/"+goodsId+"/secondgoods_efficiency/"+checkValue+".html"
		console.log(action);
		$.post(action,function(data){
			
			if(data.info='undefine')
				alert('修改状态成功');
			setTimeout("window.location.reload()",0);
		})
	});
	
	
})
	
</script>

</body>
</html>
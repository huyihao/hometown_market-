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
    
    	<script src="/hometownMarket/Public/Static/bootstrap/js/bootstrap.min.js"></script>
</head>
<body >
		
		<!-- 定义主页的头部 //-->
	    <div class="container">
	      <div class="row header">
	      	<div class="col-lg-2 col-md-2 col-xs-12">
	         <a href=""><img src="/hometownMarket/Public/Img/marketlogo.gif"/></a>
	        </div>
	      </div>
	    </div>
 		<!--定义导航栏-->
	    <div class="container">
	      <div class="nav-collapse">
	      	<ul > 
	      	    <li class="current"><a href="#">首页</a></li> 
	      	    <li data-toggle="modal" data-target="#logModal"><a href="#"> 注册/登陆</a></li>
	      	    <li><a href="#">发布商品</a></li> 
	      	    <li><a href="#">搜索商品</a></li> 
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
                  <div class="modal-body">
                    <div class="form-group">
                            <label for="username">用户名</label>
                            <input name="username" type="text" class="form-control" id="exampleInputUser" placeholder
                              ="请输入您的用户名" >
                     </div>
                     <div class="form-group">
                          <label for="password">密码</label>
                          <input name="num" type="password" class="form-control" id="exampleInputPasswd" placeholder
                            ="请输入您的密码" >
                     </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary" href="#">登陆</button>
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
		  
		  	<div class="col-lg-9 col-md-9 col-xs-12">
			      	<div class="row right-margin">
			        <div id="myCarousel" class="carousel slide bottom-margin">
			     			<!-- 轮播（Carousel）指标 -->
			               <ol class="carousel-indicators">
			                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			                  <li data-target="#myCarousel" data-slide-to="1"></li>
			                  <li data-target="#myCarousel" data-slide-to="2"></li>
			               </ol>   
					     	<!-- 轮播（Carousel）项目 -->
					        <div class="carousel-inner">
					            <div class="item active">
					               <img src="/hometownMarket/Public/Img/sunset.jpg" alt="First slide">
					            </div>
					            <div class="item">
					               <img src="/hometownMarket/Public/Img/subway.jpg" alt="Second slide">
					            </div>
					            <div class="item">
					               <img src="/hometownMarket/Public/Img/wood.jpg" alt="Third slide">
					            </div>
					      	</div>
					     		<!-- 轮播（Carousel）导航 -->
					           <a class="carousel-control left" href="#myCarousel" 
					              data-slide="prev">&lsaquo;</a>
					           <a class="carousel-control right" href="#myCarousel" 
					              data-slide="next">&rsaquo;</a>
			    	</div>
			    	<div class="">
			          <ul class="nav nav-tabs nav-justified" id="myTab">
			              <li role="presentation" class="active"><a href="#sales">出售</a></li>
			              <li role="presentation"><a href="#purchase">收购</a></li>
			              <li role="presentation" class="lihidden"><a href="#menu">目录</a></li>
			          </ul>
			        <div class="tab-content">
			        	<div class="tab-pane active" id="sales">
				          	<table class="table  table-hover error">
				          		<thead>
				          			<th>商品名称</th>
				          			<th>交易状态</th>
				          			<th>发布时间</th>
				          			<th>查看数</th>
				          		</thead>
				          		<?php if(is_array($sales_goods_list["goods"])): foreach($sales_goods_list["goods"] as $key=>$ul): ?><tr>
										<td><?php echo ($ul["secondgoods_name"]); ?></td>
										<td><?php echo ($ul["secondgoods_efficiency"]); ?></td>
										<td><?php echo (date("Y-m-d H:i:s",$ul["secondgoods_postdate"])); ?></td>
										<td><?php echo ($ul["secondgoods_views"]); ?></td>
									</tr><?php endforeach; endif; ?>
				          	</table>
			          	</div>
			          	<div class="tab-pane" id="purchase">
				          	<table class="table  table-hover error">
					          		<thead>
					          			<th>商品名称</th>
					          			<th>交易状态</th>
					          			<th>发布时间</th>
					          			<th>查看数</th>
					          		</thead>
					          		<?php if(is_array($purchase_goods_list["goods"])): foreach($purchase_goods_list["goods"] as $key=>$ul): ?><tr>
											<td><?php echo ($ul["secondgoods_name"]); ?></td>
											<td><?php echo ($ul["secondgoods_efficiency"]); ?></td>
											<td><?php echo (date("Y-m-d H:i:s",$ul["secondgoods_postdate"])); ?></td>
											<td><?php echo ($ul["secondgoods_views"]); ?></td>
										</tr><?php endforeach; endif; ?>
					          	</table>
			          	</div>
			          	<div class="tab-pane" id="menu">dfdsf</div>
			          </div>
			      	</div>
			      
			    </div>
		  </div>

		  <!-- 右边内容 -->
		  
		   <div class="col-lg-3 col-md-3 col-xs-12">
		   <div class="row">
		       	<div class="panel panel-default hidden-panel bottom-margin">
		          <div class="panel-heading"><h4>公告栏</h4></div>
		           <div class="panel-body">
		           	<?php if(is_array($notice_list["notice"])): foreach($notice_list["notice"] as $key=>$ul): ?><p><?php echo ($ul["notice_title"]); ?></p><?php endforeach; endif; ?>
		           </div>
		        </div>
		        <div class="bbox">
		          <h4>市场目录</h4>
		          <p></p>
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
      
      $('#myTab a').click(function (e) {
    	  e.preventDefault()
    	  $(this).tab('show')
    	 })
</script>

</body>
</html>
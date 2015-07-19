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
					    <h2 class="panel-title">请选择商品类型</h2>
					  </div>
				  <div class="panel-body">
				    <div class="panel-group" id="accordion2">
		            
		            <?php if(is_array($cate[0])): foreach($cate[0] as $key=>$ul): ?><div class="panel panel-default">
		                    <div id="collapse1" class="panel-collapse collapse" style="height: 0px;">
		                        <div  class="panel-body">
		                            <ul class="nav nav-pills nav-stacked">
		                            	<?php if(is_array($cate[1])): foreach($cate[1] as $key=>$vo1): ?><li><a href="<?php echo U('Goods/addGoods',array('secondgoods_class'=>$vo1['cate_class'],'secondgoods_name'=>$vo1['cate_name']));?>"><?php echo ($vo1["cate_name"]); ?></a></li><?php endforeach; endif; ?>
		                            </ul>
		                        </div>
		                    </div>
		                    <div id="collapse2" class="panel-collapse collapse" style="height: 0px;">
		                        <div  class="panel-body">
		                            <ul class="nav nav-pills nav-stacked">
		                            	<?php if(is_array($cate[2])): foreach($cate[2] as $key=>$vo2): ?><li><a href="<?php echo U('Goods/addGoods',array('secondgoods_class'=>$vo2['cate_class'],'secondgoods_name'=>$vo2['cate_name']));?>"><?php echo ($vo2["cate_name"]); ?></a></li><?php endforeach; endif; ?>
		                            </ul>
		                        </div>
		                    </div>
		                    <div id="collapse3" class="panel-collapse collapse" style="height: 0px;">
		                        <div  class="panel-body">
		                            <ul class="nav nav-pills nav-stacked">
		                            	<?php if(is_array($cate[3])): foreach($cate[3] as $key=>$vo3): ?><li><a href="<?php echo U('Goods/addGoods',array('secondgoods_class'=>$vo3['cate_class'],'secondgoods_name'=>$vo3['cate_name']));?>"><?php echo ($vo3["cate_name"]); ?></a></li><?php endforeach; endif; ?>
		                            </ul>
		                        </div>
		                    </div>
		                    <div id="collapse4" class="panel-collapse collapse" style="height: 0px;">
		                        <div  class="panel-body">
		                            <ul class="nav nav-pills nav-stacked">
		                            	<?php if(is_array($cate[4])): foreach($cate[4] as $key=>$vo4): ?><li><a href="<?php echo U('Goods/addGoods',array('secondgoods_class'=>$vo4['cate_class'],'secondgoods_name'=>$vo4['cate_name']));?>"><?php echo ($vo4["cate_name"]); ?></a></li><?php endforeach; endif; ?>
		                            </ul>
		                        </div>
		                    </div>
		                    <div id="collapse5" class="panel-collapse collapse" style="height: 0px;">
		                        <div  class="panel-body">
		                            <ul class="nav nav-pills nav-stacked">
		                            	<?php if(is_array($cate[5])): foreach($cate[5] as $key=>$vo5): ?><li><a href="<?php echo U('Goods/addGoods',array('secondgoods_class'=>$vo5['cate_class'],'secondgoods_name'=>$vo5['cate_name']));?>"><?php echo ($vo5["cate_name"]); ?></a></li><?php endforeach; endif; ?>
		                            </ul>
		                        </div>
		                    </div>
		                    <div id="collapse6" class="panel-collapse collapse" style="height: 0px;">
		                        <div  class="panel-body">
		                            <ul class="nav nav-pills nav-stacked">
		                            	<?php if(is_array($cate[6])): foreach($cate[6] as $key=>$vo6): ?><li><a href="<?php echo U('Goods/addGoods',array('secondgoods_class'=>$vo6['cate_class'],'secondgoods_name'=>$vo6['cate_name']));?>"><?php echo ($vo6["cate_name"]); ?></a></li><?php endforeach; endif; ?>
		                            </ul>
		                        </div>
		                    </div>
		                    <div id="collapse7" class="panel-collapse collapse" style="height: 0px;">
		                        <div  class="panel-body">
		                            <ul class="nav nav-pills nav-stacked">
		                            	<?php if(is_array($cate[7])): foreach($cate[7] as $key=>$vo7): ?><li><a href="<?php echo U('Goods/addGoods',array('secondgoods_class'=>$vo7['cate_class'],'secondgoods_name'=>$vo7['cate_name']));?>"><?php echo ($vo7["cate_name"]); ?></a></li><?php endforeach; endif; ?>
		                            </ul>
		                        </div>
		                    </div>
		                    <div  class="panel-heading" data-toggle="collapse"
		                        data-parent="#accordion2" href="#collapse<?php echo ($ul["cate_class"]); ?>">
		                        <?php echo ($ul["cate_name"]); ?>
		                    </div>
		               </div><?php endforeach; endif; ?>
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
    	$('#myTab a').click(function (e) {
      	  e.preventDefault()
      	  $(this).tab('show')
      	 })
    $('.tooltip-hide').tooltip('hide');
	$('#loginbtn').click(function(){
		var action=$('#Login_form').attr('action');
		var Formattr=$('#Login_form').serialize();
		console.log(Formattr);
		$.post(action,Formattr,function(data){
			$('#login_notice').html(data.info);
			//setTimeout("location.href='"+data.jumpUrl+"'",1000);
			setTimeout("window.location.href=\"<?php echo U('Home/Index/index');?>\"",1000);
		});
	})
	
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
	$('#registerbtn').click(function(){
		var params =$('#register_form').serialize();
		var $action=$('#register_form').attr('action');
		console.log(params);
		$.post($action,params,function(data){
			$('#usernametip').html('');
			$('#passwordtip').html('');
			$('#repeatPasswordtip').html('');
			$('#identitycardtip').html('');
			$('#mobiletip').html('');
			$('#emailtip').html('');
			$('#notice').html('');
			console.log(data);
				if(data.status== '0'){
					
					$('#usernametip').html(data.members_username);
					$('#passwordtip').html(data.members_password);
					$('#repeatPasswordtip').html(data.members_repeatPassword);
					$('#identitycardtip').html(data.members_identitycard);
					$('#mobiletip').html(data.members_mobile);
					$('#emailtip').html(data.members_email);
				
				}else{
					$('#notice').html('注册成功，2秒后返回首页！');
					setTimeout("window.location.href=\"<?php echo U('Home/Index/index');?>\"",2000);
				}
			
			/**else{
				$('#notice').html('需要管理员审核完才能正常登陆！');
				
				setTimeout("window.location.href=\"<?php echo U('Home/Index/index');?>\"",2);
			}**/
	});
		
	})
	$('#addbtn').click(function(){
		var params =$('#addGoods_form').serialize();
		var $action=$('#addGoods_form').attr('action');
		console.log(params);
		$.post($action,params,function(){
		
				window.location.href="<?php echo U('Home/Index/index');?>"
			
	},'json');
		
	})
	$('#uploadbtn').click(function(){
		$('#upload_form').html('');
		var params =$('#upload_form').serialize();
		var $action=$('#upload_form').attr('action');
		console.log(params);
		$.post($action,params,function(data){
			$('#upload_form').html(data.info);
		})
	})
	$('#uploadpic').click(function(){
		
		$('#uploadpic').append("<input   id='photo[]' type='file' name='photo[]' />")
	});
	$('#searchbtn').click(function(){
		var params =$('#search_form').serialize();
		var $action=$('#search_form').attr('action');
		console.log(params);
		$('tbody').remove();
		$.post($action,params,function(data){
			console.log(data.good_info);
			console.log(data.page);
			if(data!=null){
				if(typeof(data.length) == 'undefined'){
				 $('#attention').html(data.info);
				var tbody= "<tbody id=\"data\">";
				 $.each(data.good_info, function (n, value) { 
		              var trs = "";  
		              if(value.secondgoods_efficiency=='0')
		            	  value.secondgoods_efficiency="正常交易";
		              if(value.secondgoods_efficiency=='1')
		            	  value.secondgoods_efficiency="成功交易";
		              if(value.secondgoods_efficiency=='2')
		            	  value.secondgoods_efficiency="商品已过期";
		              trs += "<tr><td><a href=\"/hometownMarket/index.php/Home/Goods/listGoods/secondgoods_id/"+value.secondgoods_id+".html\">" + value.secondgoods_name + "</a></td> <td>" 
		              + value.secondgoods_efficiency + "</td><td>"+Date(value.secondgoods_postdate+'000').substring(4,25)
		              +"</td><td>"+value.secondgoods_views+ "</td></tr>";  
		              tbody += trs;  
		          }); 
				 tbody=tbody+"</tbody>"
				 $(tbody).insertAfter("thead");
				
				}else{
					
				}
			}
			
	});
		
	})
	$("div.list_notice").myScroll({
		speed:40, 
		rowHeight:68 
	});
	/**$("#secondgoods_efficiency").change(function(){
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
	**/
	$("button[id^='closebtn']").click(function(){
		var id=$(this).attr("id").substring(8);
		console.log(id);
		$.post("<?php echo U('Home/Message/setStatus');?>",{message_id:id});
	})
	
})
	
</script>

</body>
</html>
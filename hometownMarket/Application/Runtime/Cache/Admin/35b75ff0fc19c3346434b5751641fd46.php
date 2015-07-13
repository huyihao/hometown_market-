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
    	<link rel="stylesheet" type="text/css" href="/hometownMarket/Public/Css/admin.css" />
    	<link rel="stylesheet" href="/hometownMarket/Public/Css/responsive-nav.css">
        <link rel="stylesheet" href="/hometownMarket/Public/Css/styles.css">
        <script src="/hometownMarket/Public/Js/responsive-nav.min.js"></script>
    	<script src="/hometownMarket/Public/Js/jquery-2.1.1.min.js"></script>
    	<script type="text/javascript" src="/hometownMarket/Public/Js/scroll.js"></script>
    	<script src="/hometownMarket/Public/Static/bootstrap/js/bootstrap.min.js"></script>
</head>
<body >
		
		<div class="container-fluid head">
		<div class="row">
			<nav class="navbar navbar-inverse" role="navigation">
				   <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" 
				         data-target="#example-navbar-collapse">
				         <span class="sr-only">切换导航</span>
				         <span class="icon-bar"></span>
				         <span class="icon-bar"></span>
				         <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand info" href="#"><h2>二手市场后台</h2></a>
				   </div>
				   <div class="collapse navbar-collapse" id="example-navbar-collapse">
				      <ul class="nav navbar-nav">
				         <li class="dropdown">
				            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				               	<button class="btn "> 审核用户</button> <b class="caret"></b>
				            </a>
				            <ul class="dropdown-menu">
				                <li><a href="<?php echo U('Admin/User/checked');?>">已审核用户</a></li>
				                <li><a href="<?php echo U('Admin/User/NotChecked');?>">未审核用户</a></li>
				                <li><a href="<?php echo U('Admin/User/failedChecked');?>">审核失败用户</a></li>
				                <li><a href="<?php echo U('Admin/User/ForbiddenUser');?>">禁止访问用户</a></li>
				                <li><a href="<?php echo U('Admin/User/ApplyForModify');?>">申请修改关键资料</a></li>
				            </ul>
				         </li>
				         <li><a href="<?php echo U('Admin/Index/frontpage');?>"><button class="btn"> 删除商品</button></a></li>
				         <li class="dropdown">
				            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				               	<button class="btn "> 公告</button> <b class="caret"></b>
				            </a>
				            <ul class="dropdown-menu">
				                <li><a href="<?php echo U('Home/Index/index');?>">添加公告</a></li>
				                <li><a href="<?php echo U('Home/Index/index');?>">删除公告</a></li>
				            </ul>
				         </li>
				         <li class="dropdown">
				           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				              	<button class="btn"> 广告</button> <b class="caret"></b>
				            </a> 
				            <ul class="dropdown-menu">
				                <li><a href="<?php echo U('Home/Index/index');?>">添加广告</a></li>
				                <li><a href="<?php echo U('Home/Index/index');?>">删除广告</a></li>
				            </ul>
				         </li>
				         <li class="dropdown">
				            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				               	<button class="btn"> 用户</button> <b class="caret"></b>
				            </a>
				            <ul class="dropdown-menu">
				                <li><a href="<?php echo U('Home/Index/index');?>">退出登录</a></li>
				               <li class="divider"></li>
				               <li><a href="#">分离的链接</a></li>
				               <li class="divider"></li>
				               <li><a href="#">另一个分离的链接</a></li>
				            </ul>
				         </li>
				      </ul>
				   </div>
				</nav>
		</div>
	</div>

		<!-- 定义二手市场主体部分 //-->
		
		<div class="container">
		  <div class="row cvbody">
		  <!-- 这里定义两个区域，布局定义如下：//-->
		  <!-- 左边布局 -->
		  
		  	
		  	<div class="userinterval"></div>
		  	
	          <div class="col-lg-12 col-md-12 col-xs-12">
	         <div class="panel panel-default">
					  <div class="panel-heading">
					  
	    <h2 class="panel-title">已审核用户</h2>
	
					  </div>
				  <div class="panel-body">
				    <div class="">
			          <ul class="nav nav-tabs nav-justified" id="myTab">
			              <li role="presentation" class="active"><a href="#">用户信息</a></li>
			              </if>
			          </ul>
			        <div class="tab-content">
			        	<div class="tab-pane active" id="sales">
				          	<table class="table  table-hover error">
				          		<thead>
				          			<th>用户名</th>
				          			<th>真实姓名</th>
				          			<th>手机号码</th>
				          			<th>qq号</th>
				          			<th>审核状态</th>
				          			<th>看帖</th>
				          		</thead>
				          		
								<?php if(is_array($users["users"])): foreach($users["users"] as $key=>$ul): ?><tr>
										<td><?php echo ($ul["members_username"]); ?></td>
										<td><?php echo ($ul["members_truename"]); ?></td>
										<td><?php echo ($ul["members_mobile"]); ?></td>
										<td><?php echo ($ul["members_qqnum"]); ?></td>
										<td><select id="members_visitset<?php echo ($ul["members_id"]); ?>" name="members_visitset<?php echo ($ul["members_id"]); ?>" class="form-control" >
										      <option><?php echo ($ul["members_visitsetname"]); ?></option>
										       <option value=1 >未审核</option>
										       <option value=2 >审核未通过</option>
										       <option value=3 >禁止访问</option>
										       <option value=0 >审核通过</option>
										        </select>
										        
										</td>
										
										<td><button id="viewUser" type="button" class="btn">看帖</button></td>
									</tr><?php endforeach; endif; ?>
								<tfoot>
										<th colspan="6"><?php echo ($users["page"]); ?></th>
									</tfoot>
				          	</table>
			          	</div>
			          	
			         
			          </div>
			      	</div>
				  </div>
			</div>
			</div>
		</div>
		
		
		  
		   </div>
		</div>
		<!-- 底部版权 -->
		
		<nav class=" navbar-default navbar-bottom">
		  <div class="container">
				<div class="foot-text"><span>CopyRight by AlexGordon</span></div>
		  </div>
		</nav>
		



</block>

</body>

<script>
	$("select[id^='members_visitset']").change(function(){
			 var id=$(this).attr("id").substring(15);
			var checkValue=$(this).val(); 
			var action="<?php echo U('Admin/User/setVisitset');?>";
	
			console.log(checkValue);
	 		//var action="/hometownMarket/index.php/Admin/Goods/setCategory/secondgoods_id/"+id+"/secondgoods_class/"+checkValue+".html"
			console.log(action);
			$.post(action,{members_id:id,members_visitset:checkValue},function(data){
				console.log(data);
				//if(data.info='undefine')
					//alert('修改状态成功');
				//setTimeout("window.location.reload()",0);
			})
		});
</script>

</html>
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
					  
					    <h2 class="panel-title"> </h2>
					    
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
										
										<td><button id="viewUser<?php echo ($ul["members_id"]); ?>" data-toggle="modal" data-target="#functionModal<?php echo ($ul["members_id"]); ?>" type="button" class="btn">看帖</button></td>
										
									</tr>
									<!-- 信息显示弹出框 -->
					            <div class="modal fade" id="functionModal<?php echo ($ul["members_id"]); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					              <div class="modal-dialog">
					                <div class="modal-content">
					                  <div class="modal-header">
					                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					                    <h4 class="modal-title" id="myModalLabel">用户详细信息</h4>
					                  </div>
					                 
					                    <div class="form-group">
					                            <label for="username">用户名</label>
					                            <input name="username" type="text" class="form-control" disabled value="<?php echo ($ul["members_username"]); ?>" id="username">
					                     </div>
					                     <div class="form-group">
					                            <label for="gender">性别：<?php if($ul["members_gender"] == '0'): ?>靓仔<?php else: ?>靓女<?php endif; ?></label>
					                     </div>
					                     <div class="form-group">
					                            <label for="truename">真实姓名</label>
					                            <input name="truename" type="text" class="form-control" disabled value="<?php echo ($ul["members_truename"]); ?>" id="truename">
					                     </div>
					                     <div class="form-group">
					                            <label for="identitycard">身份证</label>
					                            <input name="identitycard" type="text" class="form-control" disabled value="<?php echo ($ul["members_identitycard"]); ?>" id="identitycard">
					                     </div>
					                     <div class="form-group">
					                            <label for="studentscard">学号</label>
					                            <input name="studentscard" type="text" class="form-control" disabled value="<?php echo ($ul["members_studentscard"]); ?>" id="studentscard">
					                     </div>
					                     <div class="form-group">
					                            <label for="address">联系地址</label>
					                            <input name="address" type="text" class="form-control" disabled value="<?php echo ($ul["members_address"]); ?>" id="address">
					                     </div>
					                     
					                     <div class="form-group">
					                            <label for="mobile">电话号码</label>
					                            <input name="mobile" type="text" class="form-control" disabled value="<?php echo ($ul["members_mobile"]); ?>" id="mobile">
					                     </div>
					                     <div class="form-group">
					                            <label for="qqnum">QQ号</label>
					                            <input name="qqnum" type="text" class="form-control" disabled value="<?php echo ($ul["members_qqnum"]); ?>" id="qqnum">
					                     </div>
					                     <div class="form-group">
					                            <label for="email">电子邮件</label>
					                            <input name="email" type="text" class="form-control" disabled value="<?php echo ($ul["members_email"]); ?>" id="email">
					                     </div>
					                     <div class="form-group">
					                            <label for="schoolname">学校名称</label>
					                            <input name="schoolname" type="text" class="form-control" disabled value="<?php echo ($ul["members_schoolname"]); ?>" id="schoolname">
					                     </div>
					                     <div class="form-group">
					                            <label for="bewrite">个人描述</label>
					                            <input name="bewrite" type="text" class="form-control" disabled value="<?php echo ($ul["members_bewrite"]); ?>" id="bewrite">
					                     </div>
					                     <div class="form-group">
					                            <label for="lastlogindate">最后登陆时间</label>
					                            <input name="lastlogindate" type="text" class="form-control" disabled value="<?php echo ($ul["members_lastlogindate"]); ?>" id="lastlogindate">
					                     </div>
					                     <div class="form-group">
					                            <label for="lastloginip">最后登陆ip</label>
					                            <input name="lastloginip" type="text" class="form-control" disabled value="<?php echo ($ul["members_lastloginip"]); ?>" id="lastloginip">
					                     </div>
					                  <div class="modal-footer">
					                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					                    <button>
					                    	  <select id="members_visitset<?php echo ($ul["members_id"]); ?>" name="members_visitset<?php echo ($ul["members_id"]); ?>" class="form-control" >
										      <option><?php echo ($ul["members_visitsetname"]); ?></option>
										       <option value=1 >未审核</option>
										       <option value=2 >审核未通过</option>
										       <option value=3 >禁止访问</option>
										       <option value=0 >审核通过</option>
										        </select>
										</button>
					                  </div>
					                </div>
					              </div>
					            </div>
            					<!--显示框结束--><?php endforeach; endif; ?>
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
			 var id=$(this).attr("id").substring(16);
			var checkValue=$(this).val(); 
			var action="<?php echo U('Admin/User/setVisitset');?>";
			console.log(checkValue);
	 		//var action="/hometownMarket/index.php/Admin/Goods/setCategory/secondgoods_id/"+id+"/secondgoods_class/"+checkValue+".html"
			console.log(action);
			$.post(action,{members_id:id,members_visitset:checkValue},function(data){
				console.log(data);
				if(data='1')
					alert('修改状态成功');
				setTimeout("window.location.reload()",0);
			})
		});
</script>

</html>
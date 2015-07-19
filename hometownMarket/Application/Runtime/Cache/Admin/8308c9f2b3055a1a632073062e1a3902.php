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
				                <li><a href="<?php echo U('Home/Index/index');?>">已审核用户</a></li>
				                <li><a href="<?php echo U('Home/Index/index');?>">未审核用户</a></li>
				                <li><a href="<?php echo U('Home/Index/index');?>">审核失败用户</a></li>
				                <li><a href="<?php echo U('Home/Index/index');?>">禁止访问用户</a></li>
				                <li><a href="<?php echo U('Home/Index/index');?>">申请修改关键资料</a></li>
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
		  
		  	<div class="col-lg-9 col-md-9 col-sm-12">
		  	<div class="interval"></div>
	         <div class="panel panel-default">
	         
					  <div class="panel-heading">
					    <h2 class="panel-title">所有分类聚合信息</h2>
					  </div>
				  <div class="panel-body">
				    <div class="">
			          <ul class="nav nav-tabs nav-justified" id="myTab">
			              <li role="presentation" class="active"><a href="#sales">出售</a></li>
			              <li role="presentation"><a href="#purchase">收购</a></li>
			              </if>
			          </ul>
			        <div class="tab-content">
			        	<div class="tab-pane active" id="sales">
				          	<table class="table  table-hover error">
				          		<thead>
				          			<th>商品名称</th>
				          			<th>板块</th>
				          			<th>交易状态</th>
				          			<th>发布时间</th>
				          			<th><button id="deleteAllGoodsbtn" type="button" class="btn">删除</button></th>
				          		</thead>
				          		
								<form name="checkbox_form" method="post" action="<?php echo U('Admin/Goods/deleteAllGoods');?>">
				          		<?php if(is_array($sale_goods_list["goods"])): foreach($sale_goods_list["goods"] as $key=>$ul): ?><tr>
										<td><a href="<?php echo U('Home/Goods/listGoods',array('secondgoods_id'=>$ul['secondgoods_id']));?>"><?php echo ($ul["secondgoods_name"]); ?></a></td>
										<td><select id="secondgoods_class<?php echo ($ul["secondgoods_id"]); ?>" name="secondgoods_class<?php echo ($ul["secondgoods_id"]); ?>" class="form-control" >
										      <option><?php echo ($ul["secondgoods_classname"]); ?></option>
										      <?php if(is_array($cateSelect)): foreach($cateSelect as $key=>$ca): ?><option value=<?php echo ($ca["cate_class"]); ?> ><?php echo ($ca["cate_name"]); ?></option><?php endforeach; endif; ?>
										        </select>
										        
										</td>
										<td><?php echo ($ul["secondgoods_efficiency"]); ?></td>
										<td><?php echo (date("Y-m-d H:i",$ul["secondgoods_postdate"])); ?></td>
										<td><input id="id[]" name="id[]" type="checkbox" value="<?php echo ($ul["secondgoods_id"]); ?>"></td>
									</tr><?php endforeach; endif; ?>
								</form>
								<tfoot>
										<th colspan="6"><?php echo ($sale_goods_list["page"]); ?><button id="checkAll1" type="button" class="btn">全选</button><button id="delAll1" type="button" class="btn">反选</button></th>
									</tfoot>
				          	</table>
			          	</div>
			          	<div class="tab-pane" id="purchase">
				          	<table class="table  table-hover error">
					          		<thead>
				          			<th>商品名称</th>
				          			<th>板块</th>
				          			<th>交易状态</th>
				          			<th>发布时间</th>
				          			<th><button id="deleteAllGoodsbtn1" type="button" class="btn">删除</button></th>
				          		</thead>
					          		<?php if(is_array($purchase_goods_list["goods"])): foreach($purchase_goods_list["goods"] as $key=>$ul): ?><tr>
										<td ><a href="<?php echo U('Home/Goods/listGoods',array('secondgoods_id'=>$ul['secondgoods_id']));?>"><?php echo ($ul["secondgoods_name"]); ?></a></td>
										<td><?php echo ($ul["secondgoods_classname"]); ?></td>
										<td><?php echo ($ul["secondgoods_efficiency"]); ?></td>
										<td><?php echo (date("Y-m-d H:i",$ul["secondgoods_postdate"])); ?></td>
										<td><input id="id1[]" name="id1[]" type="checkbox" value="<?php echo ($ul["secondgoods_id"]); ?>"></td>
									</tr><?php endforeach; endif; ?>
									<tfoot>
										<th colspan="6"><?php echo ($purchase_goods_list["page"]); ?><button id="checkAll" type="button" class="btn">全选</button><button id="delAll" type="button" class="btn">反选</button></th>
									</tfoot>
					          	</table>
			          	</div>
			         
			          </div>
			      	</div>
				  </div>
			</div>
		</div>

		  <!-- 右边内容 -->
		  
		   <div class="col-lg-3 col-md-3 col-xs-12">
		   <div class="row">
		       
		   
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
		    </div>
  
		   </div>
		</div>
		<!-- 底部版权 -->
		
		<nav class=" navbar-default navbar-bottom">
		  <div class="container">
				<div class="foot-text"><span>CopyRight by AlexGordon</span></div>
		  </div>
		</nav>
		



<script>
    
      
     
	 
    
    $(function(){
    	$('#myTab a').click(function (e) {
      	  e.preventDefault()
      	  $(this).tab('show')
      	 })
      	 
    $('#checkAll1').click(function(){
    	$("input[name='id[]']").each(function(){
    		this.checked=true;  
    		  });  
    })
    $('#checkAll').click(function(){
    	$("input[name='id1[]']").each(function(){
    		this.checked=true;  
    		  });  
    })
    $('#delAll1').click(function(){
    	$("input[name='id[]']").each(function(){
  	      this.checked=!this.checked;  
  	    
  	     })
    })
    $('#delAll').click(function(){
    	$("input[name='id1[]']").each(function(){
    	      this.checked=!this.checked;  
    	    
    	     })
    })
	$('#loginbtn').click(function(){
		var action=$('#login_form').attr('action');
		var Formattr=$('#login_form').serialize();
		console.log(Formattr);
		$.post(action,Formattr,function(data){
			$('#notice').html(data.info);
			if(data.info=='登陆成功！')
				setTimeout("window.location.href=\"<?php echo U('Admin/Index/frontpage');?>\"",1000);
			if(data.info=='登陆失败!')
				setTimeout("window.location.reload()",0);
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
	
	$('#deleteGoodsbtn').click(function(){
		var action="<?php echo U('Home/Goods/deleteGoods',array('secondgoods_id'=>$ul['secondgoods_id']));?>";
		$.post(action,function(data){
			$('#message_deleteGoodsnotice').html(data.info);
			console.log(data.info);
				setTimeout("window.location.reload()",0);
			
		});
	})
	$('#deleteAllGoodsbtn').click(function(){
		var action="<?php echo U('Admin/Goods/deleteAllGoods');?>";
		 var $check_boxes = $("input[type='checkbox']:checked");  
            if($check_boxes.length<=0){ alert('您未勾选，请勾选！');return;   }  
            if(confirm('您确定要删除吗？')){  
                var dropIds = new Array();  
                $check_boxes.each(function(){  
                    dropIds.push($(this).val());  
                });  
                console.log(dropIds);
                $.ajax({  
                    type:'post',  
                    traditional :false,  
                    url:action,  
                    data:{dropIds},  
                    success:function(data){  
                        if(data='1'){
                        	alert('删除成功！');
                        	setTimeout("window.location.reload()",0);
                        }
                    }  
                });  
            }  
            return false;  
        
	})
	$('#deleteAllGoodsbtn1').click(function(){
		var action="<?php echo U('Admin/Goods/deleteAllGoods');?>";
		 var $check_boxes = $("input[type='checkbox']:checked");  
            if($check_boxes.length<=0){ alert('您未勾选，请勾选！');return;   }  
            if(confirm('您确定要删除吗？')){  
                var dropIds = new Array();  
                $check_boxes.each(function(){  
                    dropIds.push($(this).val());  
                });  
                console.log(dropIds);
                $.ajax({  
                    type:'post',  
                    traditional :false,  
                    url:action,  
                    data:{dropIds},  
                    success:function(data){  
                        if(data='1'){
                        	alert('删除成功！');
                        	setTimeout("window.location.reload()",0);
                        }
                    }  
                });  
            }  
            return false;  
        
	})
	
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
	$("select[id^='secondgoods_class']").change(function(){
		 var id=$(this).attr("id").substring(17);
		var checkValue=$(this).val(); 
		var action="<?php echo U('Admin/Goods/setCategory');?>";

		console.log(action);
 		//var action="/hometownMarket/index.php/Admin/Goods/setCategory/secondgoods_id/"+id+"/secondgoods_class/"+checkValue+".html"
		console.log(action);
		$.post(action,{secondgoods_id:id,secondgoods_class:checkValue},function(data){
			
			if(data.info='undefine')
				alert('修改状态成功');
			setTimeout("window.location.reload()",0);
		})
	});
	
	$("button[id^='closebtn']").click(function(){
		var id=$(this).attr("id").substring(8);
		console.log(id);
		$.post("<?php echo U('Home/Message/setStatus');?>",{message_id:id});
	})
	
})
	
</script>

</body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=yes">
<link type="text/css" rel="stylesheet" href="__PUBLIC__/acss/base.css" />
<link type="text/css" rel="stylesheet" href="__PUBLIC__/acss/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="__PUBLIC__/acss/style.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/acss/category.css" />
<title>标题</title>
<script src="__PUBLIC__/ajs/jquery-1.9.1.min.js"></script>
<script src="__PUBLIC__/ajs/Validform_v5.3.2_min.js"></script>
<script charset="utf-8" src="__PUBLIC__/ajs/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="__PUBLIC__/ajs/kindeditor/lang/zh_CN.js"></script>
<link rel="stylesheet" href="__PUBLIC__/ajs/kindeditor/themes/default/default.css" />
<script type="text/javascript" src="__PUBLIC__/ajs/picker/WdatePicker.js"></script>

</head>

<script>
$(function(){
	$('header .nav').click(function(){
		$('nav').slideToggle(0);
		$('#content, aside').toggleClass('margin'); 
  	});
})
</script>

<body>
<!--头部-->
<header>
	<div class="nav">
    	 <ul>
         <li></li>
         <li></li>
         <li></li>
         </ul>	 
    </div>
	<div style="position:absolute;right:10px;top:0px;margin-top:8px;font-size:14px;color:white;">您好！:<?php echo (session('username')); ?> 【管理员】<a style="color:white;" href="__APP__/Login/doLogout">【退出】</a></div>
</header>
<!--左侧导航-->
<nav>
	<div class="navTop">
    	 <dl><img src="__PUBLIC__/aimages/avatar2.jpg" width="120" height="120"></dl>
         <ul>
         	<li class="navTop_01"><a href="/" title="返回首页">返回首页</a></li>
            <li class="navTop_02"><a href="__APP__/Site/site" title="网站设置">网站设置</a></li>
            <li class="navTop_03"><a href="__APP__/Login/doLogout" title="退出后台">退出后台</a></li>
         </ul>
    </div>
    <div class="navList">
    	 <ul>
			 <li><a  <?php if($_GET['cls'] == 1): ?>class="this"<?php endif; ?> href="__APP__/Index/index/cls/1" >默认页面</a></li>
			 <li><a <?php if($_GET['cls'] == 2): ?>class="this"<?php endif; ?>  href="__APP__/Category/category/cls/2" >栏目</a></li>
			 <li><a <?php if($_GET['cls'] == 7): ?>class="this"<?php endif; ?>  href="__APP__/Try/index/status/1/cls/7">试用中心</a></li> 
			 <li><a <?php if($_GET['cls'] == 5): ?>class="this"<?php endif; ?>  href="__APP__/Index/picture/cls/5">首页图片</a></li> 
			 <li><a <?php if($_GET['cls'] == 3): ?>class="this"<?php endif; ?>  href="__APP__/Link/index/cls/3">二级菜单</a></li> 
			 <li><a <?php if($_GET['cls'] == 6): ?>class="this"<?php endif; ?>  href="__APP__/Link/parameter/cls/6">产品参数</a></li> 
			 <li><a <?php if($_GET['cls'] == 8): ?>class="this"<?php endif; ?>  href="__APP__/Try/questionnaire/cls/8">问卷调查</a></li> 
			 <li><a <?php if($_GET['cls'] == 4): ?>class="this"<?php endif; ?>  href="__APP__/Index/admin/cls/4">后台用户</a></li>
         </ul>
    </div>
</nav>
<!--快捷导航-->
<aside>
	 <ul>

        <li><a href="__APP__/Index/addAdmin/cls/4" class="backgroundColorLan">新增用户</a></li>
     </ul>
</aside>
<!--内容-->
<script src="__PUBLIC__/js/diy.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/acss/theme.blue.css" />
<script src="__PUBLIC__/ajs/dialog.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/acss/dialog.css" />
<script>
$(function() {
  $("table").tablesorter({ theme : 'blue' });
});

</script>
<div id="content">

<!--breadcrumbs-->
<div id="breadcrumb"> <a href="__APP__/Index/index/cls/1" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>主页</a><span class="nadd">->&nbsp;&nbsp;&nbsp;<?php if($_GET[status] == 1): ?>待审核<?php elseif($_GET[status] == 2): ?>待用户填写地址<?php elseif($_GET[status] == 3): ?>待发货<?php elseif($_GET[status] == 4): ?>带评论<?php elseif($_GET[status] == 5): ?>已完成<?php elseif($_GET[status] == 0): ?>已取消<?php endif; ?></span></div>

<!--End-breadcrumbs-->

<!--Action boxes-->

  <div class="container-fluid">

    <div class="quick-actions_homepage">

      <ul class="quick-actions">

       <li class="bg_lb"> <a href="__APP__/Try/index/status/1/cls/7"> <i class="icon-pencil"></i>待审核</a></li>
	   
	   <li class="bg_ls"> <a href="__APP__/Try/index/status/2/cls/7"> <i class="icon-dashboard"></i>待用户填写地址</a></li>

	   <li class="bg_lb"> <a href="__APP__/Try/index/status/3/cls/7"> <i class="icon-pencil"></i>待发货</a></li>

	   <li class="bg_ls"> <a href="__APP__/Try/index/status/4/cls/7"> <i class="icon-dashboard"></i>待评论</a></li>
	   
	   <li class="bg_lb"> <a href="__APP__/Try/index/status/5/cls/7"> <i class="icon-pencil"></i>已完成</a></li>
	   
	   <li class="bg_ls"> <a href="__APP__/Try/index/status/0/cls/7"> <i class="icon-pencil"></i>已取消</a></li>
      </ul>

    </div>

<!--End-Action boxes--> 

 <div class="row-fluid">

     <div class="span12">

        <div class="widget-box">

          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>

            <h5>列表-<?php if($_GET[status] == 1): ?>待审核<?php elseif($_GET[status] == 2): ?>待用户填写地址<?php elseif($_GET[status] == 3): ?>待发货<?php elseif($_GET[status] == 4): ?>带评论<?php elseif($_GET[status] == 5): ?>已完成<?php elseif($_GET[status] == 0): ?>已取消<?php endif; ?></h5>
			
				 <div id="searchBox">
					  <form action="__URL__/conSearch/status/<?php echo ($_GET[status]); ?>/cls/7" method="get">
						  <dl>	
								<span>
								<select name="factor">
									<option value="1">用户名</option>
									<option value="2">产品名</option>
								</select>
								</span>
								<dd><input name="search" type="text"></dd>
								<dt><input name="" type="submit" value=""></dt>
						  </dl>
					  </form>
				 </div>
				 
          </div>

          <div class="widget-content nopadding">

		  <form action="__URL__/conOrder" method="post">

          	<table class="table table-bordered table-striped">

             <thead>

              <tr>

			    <th width="5%">ID</th>

                <th width="10%">用户名</th>

				<th width="30%">产品</th>
				

				<th width="15%">申请时间</th>

				<th width="15%" class="{sorter: false}">操作</th>

              </tr>

            </thead>

            <tbody>

          <?php if(is_array($try_list)): foreach($try_list as $key=>$v): ?><tr>
				
			    <td style="text-align:center;"><?php echo ($v["id"]); ?></td>

				<td style="text-align:center;"><?php echo ($v["username"]); ?></td>
				
				<td style="text-align:center;"><?php echo ($v["title"]); ?>&nbsp;&nbsp;<?php echo ($v["capacity"]); ?></td>
					
				
				<td style="text-align:center;"><?php echo date("Y-m-d H:i:s",$v['inputtime']); ?></td>



	 		  	<td style="text-align:center;">

	 		  	<?php if($v["status"] == 1): ?><a href="javascript:void(0);" onclick="pass(<?php echo ($v["id"]); ?>,'<?php echo ($v["username"]); ?>');" class="btn btn-primary btn-mini">通过</a>
					|<?php endif; ?>
				<?php if($v["status"] == 3): ?><a href="javascript:void(0);" onclick="fahuo(<?php echo ($v["id"]); ?>,'<?php echo ($v["username"]); ?>');" class="btn btn-primary btn-mini">确认发货</a>
					|<?php endif; ?>
				<?php if($v["status"] >= 3 && $v["status"] <= 5): ?><a href="javascript:showDialog(<?php echo ($v["id"]); ?>,'<?php echo ($v["username"]); ?>')" class="btn btn-primary btn-mini">查看</a>
					|<?php endif; ?>

				<?php if($v["status"] >= 1 && $v["status"] <= 5): ?><a href="javascript:void(0);" onclick="cancel(<?php echo ($v["id"]); ?>,'<?php echo ($v["username"]); ?>');" class="btn btn-danger btn-mini">取消</a><?php endif; ?>
				<?php if($v["status"] == 0): ?><a href="javascript:void(0);" onclick="del(<?php echo ($v["id"]); ?>,'<?php echo ($v["username"]); ?>');" class="btn btn-danger btn-mini">删除</a><?php endif; ?>
	 		  	</td>
					
	 		  </tr><?php endforeach; endif; ?>
			  
			  <tr><td colspan="10"><?php echo ($show); ?></td></tr>
			  
            </tbody>
			
          </table>

		  </form>

		  <div class='fanye clearfix'></div>
		  <script type="text/javascript">

		    
			function del(val,name){

				if(confirm("是否永久删除用户："+name+"的试用产品?")){

					delsendRequest(val);

				}

			}

			function delsendRequest(val){

				$.ajax({

					   type: "POST",

					   url: "__URL__/delsyPro/",

					   data: "id="+val,

					   success: function(data){

					     if(data){
								alert("删除成功");

					     	 window.location.reload();
						

					     }

					     else{

					    	 alert("删除失败");

						 }

					   }

					}); 

			}
			
			
		  
		  
		  
		  
		  
		  
		  
		  
		  
			function cancel(val,name){

				if(confirm("是否取消用户："+name+"的试用产品?")){

					sendRequest(val);

				}

			}

			function sendRequest(val){

				$.ajax({

					   type: "POST",

					   url: "__URL__/cancel/",

					   data: "id="+val,

					   success: function(data){

					     if(data){
								alert("取消成功");

					     	 window.location.reload();
						

					     }

					     else{

					    	 alert("取消失败");

						 }

					   }

					}); 

			}
			
			
				function pass(val,name){

				if(confirm("是否通过用户："+name+"的审核?")){

					sendRequest1(val);

				}

			}

			function sendRequest1(val){

				$.ajax({

					   type: "POST",

					   url: "__URL__/passTry/",

					   data: "id="+val,

					   success: function(data){

					     if(data){

						     alert("通过成功");

					     	 window.location.reload();

					     }

					     else{

					    	 alert("通过失败");

						 }

					   }

					}); 

			}
			
			
			
			function fahuo(val,name){

				if(confirm("请确认用户:"+name+"的产品是否已发货?")){

					fahuosendRequest(val);

				}

			}

			function fahuosendRequest(val){

				$.ajax({

					   type: "POST",

					   url: "__URL__/fhchange/",

					   data: "id="+val,

					   success: function(data){

					     if(data){
								alert("确认成功");

					     	 window.location.reload();
						

					     }

					     else{

					    	 alert("确认失败");

						 }

					   }

					}); 

			}


		  </script>
		<script>
		function showDialog(id,name){
						  window.top.art.dialog({title:'查看用户'+name+'的详情',id:'edit',iframe:"__APP__/Try/selMessage/id/"+id,width:'800',height:'550'}, function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;d.document.getElementById('dosubmit').click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
						}

		</script>


          </div>

        </div>

    </div>

  </div>

  <div class="row-fluid">

  <div id="footer"> <small>

      <!-- Remove this notice or replace it with whatever you want -->

      CopyRight ©2005-2013  Shanghai MoFang Design Co.,Ltd

 </small> </div>

    <!-- End #footer -->

  </div>

  <!-- End #main-content -->

</div>

</body>


</html>
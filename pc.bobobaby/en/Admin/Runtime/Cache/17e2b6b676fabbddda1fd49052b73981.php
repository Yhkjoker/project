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
<script src="__PUBLIC__/js/jquery.metadata.js"></script>
<script src="__PUBLIC__/js/jquery.tablesorter.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/theme.blue.css" />
<script>
$(function() {
  $("table").tablesorter({ theme : 'blue' });
});

</script>
<div id="content">

<!--breadcrumbs-->
<div id="breadcrumb"> <a href="__APP__/Index/index/cls/1" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>主页</a><span class="nadd">->&nbsp;&nbsp;&nbsp;列表</span></div>

<!--End-breadcrumbs-->

<!--Action boxes-->

  <div class="container-fluid">

    <div class="quick-actions_homepage">

      <ul class="quick-actions">

       <li class="bg_lb"> <a href="__APP__/Content/addContent/catid/<?php echo ($catid); ?>/cls/2"> <i class="icon-pencil"></i>新增</a></li>

	   <li class="bg_ls"> <a href="__APP__/Category/category/cls/2"> <i class="icon-dashboard"></i>栏目</a></li>

      </ul>

    </div>

<!--End-Action boxes--> 

 <div class="row-fluid">

     <div class="span12">

        <div class="widget-box">

          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>

            <h5>列表</h5>
			
				 <div id="searchBox">
					  <form action="__URL__/conSearch/catid/<?php echo ($catid); ?>/cls/2" method="get">
						  <dl>	
								<span>
								<select name="factor">
									<option value="1">名称</option>
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

				<th width="8%" class="{sorter: false}">排序</th>

			    <th width="5%">ID</th>

                <th>名称</th>

				<th width="10%">显示</th>
				
				<th width="10%">推荐</th>

				<th width="15%">发表时间</th>

				<th width="15%" class="{sorter: false}">操作</th>

              </tr>

            </thead>

            <tbody>

          <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
					
				<td><input type="text" name="conorder[<?php echo ($v["id"]); ?>]" value="<?php echo ($v["conorder"]); ?>" style="width:40px; text-align:center; margin:0 0 0 8px;"/></td>

			    <td style="text-align:center;"><?php echo ($v["id"]); ?></td>

				<td><?php echo ($v["title"]); ?></td>
				

				<td style="text-align:center;">


					<select name="status" onchange="chk(this.value,<?php echo ($v["id"]); ?>);" style="width:150px;">
						<option value="0" <?php if($v["status"] == 0): ?>selected<?php endif; ?> >不显示</option>
						<option value="1" <?php if($v["status"] == 1): ?>selected<?php endif; ?> >wap端显示</option>
						<option value="2" <?php if($v["status"] == 2): ?>selected<?php endif; ?> >pc端显示</option>
						<option value="3" <?php if($v["status"] == 3): ?>selected<?php endif; ?> >pc和wap端显示</option>
				</select>
				
				
					<input type="hidden"  name="catid" value="<?php echo ($catid); ?>"/>	
				</td>

				 <td style="text-align:center;">
				<input type="checkbox" name="posid" value="<?php echo ($v["posid"]); ?>" <?php if($v["posid"] == 1): ?>checked<?php endif; ?> onclick="poschk(this.checked?1:0,<?php echo ($v["id"]); ?>)"/>
				<span class="posxs<?php echo ($v["id"]); ?>"><?php if($v["posid"] == 1): ?>已推荐<?php else: ?>未推荐<?php endif; ?></span>
				</td> 
				
				<td style="text-align:center;"><?php echo date("Y-m-d H:i:s",$v['inputtime']); ?></td>



	 		  	<td style="text-align:center;">

	 		  	<a href="__APP__/Content/upContent/catid/<?php echo ($catid); ?>/id/<?php echo ($v["id"]); ?>/cls/2" class="btn btn-primary btn-mini">编辑</a>

				|

				<a href="javascript:void(0);" onclick="del(<?php echo ($v["id"]); ?>);" class="btn btn-danger btn-mini">删除</a>

	 		  	</td>
					
	 		  </tr><?php endforeach; endif; ?>
			  
			  <tr><td colspan="10"><?php echo ($show); ?></td></tr>
			  
			  <tr><td colspan="10"><input type="submit" value="排序" class="btn btn-primary"/></td></tr>
            </tbody>
			
          </table>

		  </form>

		  <div class='fanye clearfix'></div>
		  <script type="text/javascript">

			function del(val){

				if(confirm("是否删除?")){

					sendRequest(val);

				}

			}

			function sendRequest(val){

				$.ajax({

					   type: "POST",

					   url: "__URL__/delContent/",

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

			function chk(a,b){

				$.ajax({

					   type: "POST",

					   url: "__URL__/show",

					   data: "id="+b+"&status="+a,
					   
					   success:function(data){
						
							
						}
					

					});
			}
			
					function poschk(a,b){

				$.ajax({

					   type: "POST",

					   url: "__APP__/Content/posid",

					   data: "id="+b+"&posid="+a,
					   
					   success:function(data){
							if(data){
								if(a){
									$(".posxs"+b).html("已推荐");
								}else{
									$(".posxs"+b).html("未推荐");
								}
							}
							
						}
					

					});
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
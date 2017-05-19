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
			 <li><a <?php if($_GET['cls'] == 5): ?>class="this"<?php endif; ?>  href="__APP__/Index/picture/cls/5">首页图片</a></li> 
			 <li><a <?php if($_GET['cls'] == 3): ?>class="this"<?php endif; ?>  href="__APP__/Link/index/cls/3">二级菜单</a></li> 
			 <li><a <?php if($_GET['cls'] == 6): ?>class="this"<?php endif; ?>  href="__APP__/Link/parameter/cls/6">产品参数</a></li> 
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
<script  type="text/javascript" src="__PUBLIC__/ajs/pic.js"></script><script  type="text/javascript" src="__PUBLIC__/ajs/colpick.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/acss/colpick.css" />
<!--内容-->
<div id="content">
<div id="breadcrumb"> <a href="__APP__/Index/index" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>主页</a>->添加颜色参数</span></div>
<div class="quick-actions_homepage">

      <ul class="quick-actions">


			 <li class="bg_ls"> <a href="javascript:history.go(-1);"> <i class="icon-dashboard"></i>返回</a></li>
      </ul>

    </div>
 <div class="row-fluid">

     <div class="span12">

        <div class="widget-box">

          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>

            <h5>添加颜色参数</h5>
				
          </div>
		<form action="__APP__/Link/doParameter/action/add" id="myform" class="myForm" method="post" >	
     	<table class="table table-bordered table-striped">

			  <tr >		  <td width="100px"><span>颜色参数名称：</span></td>		  <td>				<input type="text" name="info[name]" />		  </td>		  </tr>				
     	
		  <tr >
		  <td width="100px"><span>颜色参数：</span></td>
		  <td>
			 <div id="picker"></div>
			<input type="hidden" id="colorname" name="info[colorname]" value="#00000" />			<input type="hidden" name="info[typeid]" value="1" />
		  </td>
		  </tr>
        <tr><td colspan="2"><input name="" type="submit" class="an" value="保存发布"></td></tr>


		</table>		</form>
	</div>
	
	 
</div>
</div>	
<script>$('#picker').colpick({    flat:true,    layout:'hex',    submit:0,	color: '00000',	onChange:function(hsb,hex,rgb,el,bySetColor) {		$("#colorname").attr("value","#"+hex);			}});
  $('.myForm').Validform({

				tiptype:3,

				ajaxPost:true,

				callback:function(data){

					if(data.status=='y'){

						setTimeout(function(){window.location="__APP__/Link/parameter/cls/6";},1000);

					}

				}

			  })
</script>

<!--尾巴-->
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
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
<link rel="stylesheet" href="__PUBLIC__/css/style.css" type="text/css" media="all" />

<!--内容-->
<div id="content">
<div id="breadcrumb"> <a href="__APP__/Index/index" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>主页</a><span class="nadd">->&nbsp;&nbsp;&nbsp;添加用户</span></div>
	 <div class="main">
<div class="quick-actions_homepage">

      <ul class="quick-actions">

             <li class="bg_lb"> <a href="__APP__/Index/admin/cls/4"> <i class="icon-pencil"></i>用户管理</a></li>
      </ul>

    </div>
<br/><br/><br/><br/><br/><br/>
 
        <form class="registerform" action="__APP__/Index/doAdmin" method="post">
            <table width="100%" style="table-layout:fixed;">
                <tr>
                    <td class="need" style="width:10px;color:red">*</td>
                    <td style="width:70px;">账号：</td>
                    <td style="width:205px;"><input type="text" value="" name="username" class="inputxt" datatype="s6-18" ajaxurl="__APP__/Index/checkAdmin" nullmsg="请输入账号！" errormsg="账号至少6个字符,最多18个字符！" /></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                <tr>
                    <td class="need" style="color:red">*</td>
                    <td>密码：</td>
                    <td><input type="password" value="" name="password" class="inputxt" datatype="*6-16" nullmsg="请设置密码！" errormsg="密码范围在6~16位之间！" /></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                <tr>
                    <td class="need" style="color:red">*</td>
                    <td>确认密码：</td>
                    <td><input type="password" value="" name="repassword" class="inputxt" datatype="*" recheck="password" nullmsg="请再输入一次密码！" errormsg="您两次输入的账号密码不一致！" /></td>
                    <td><div class="Validform_checktip"></div></td>
                </tr>
                <tr>
                    <td class="need"></td>
                    <td></td>
                    <td colspan="2" style="padding:10px 0 18px 0;">
                        <input type="submit" value="提 交" class="an"/> <input type="reset" value="重 置" class="an" />
                    </td>
                </tr>
            </table>
        </form>
        


<script type="text/javascript" src="__PUBLIC__/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/Validform_v5.3.2_min.js"></script>

<script type="text/javascript">
	$(function(){
		$(".registerform").Validform({
			tiptype:2,
			callback:function(form){
				var check=confirm("您确定要提交表单吗？");
				if(check){
					form[0].submit();
				}		
				return false;
			}
		});
	})
</script>

</div>
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
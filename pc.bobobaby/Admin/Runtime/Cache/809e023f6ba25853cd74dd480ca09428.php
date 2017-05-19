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
<script>
KindEditor.ready(function(K) {
	K.create('#ke_demo', {
		allowFileManager : true,
		afterBlur: function(){this.sync();}
	});
});
</script>
<div id="content">
<div id="breadcrumb"> <a href="__APP__/Index/index/cls/1" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>主页</a><span class="nadd">->&nbsp;&nbsp;&nbsp;编辑信息</span></div>
<!--breadcrumbs-->

  <div class="container-fluid">

    <div class="quick-actions_homepage">

      <ul class="quick-actions">

	   <li class="bg_lb"> <a href="__APP__/Index/picture/cls/3"> <i class="icon-dashboard"></i>返回</a></li>

      </ul>

    </div>

<!--End-breadcrumbs-->

 <div class="row-fluid">

     <div class="span12">

        <div class="widget-box">

          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>

            <h5>编辑</h5>

          </div>

          <div class="widget-content nopadding">

          <form class="myForm" action="__APP__/Index/doPicture/action/edit/id/<?php echo ($_GET['id']); ?>" method="post">

           <table class="table table-bordered table-striped">

		
			<tr>

			  <td><span class="needed">*</span>标题：</td>

			  <td><input type="text" name="info[title]" value="<?php echo ($index_pic_arr["title"]); ?>" datatype="*" nullmsg="标题为空"/>

			  </td>

			</tr>

			<tr><td><span>上传大图：</span></td><td>
			<input type="text" id="url3" name="info[picurl]"   class="ke-input-text" value="<?php echo ($index_pic_arr["picurl"]); ?>"/> <input type="button" id="image3" class="btn btn-success delpic" value="选择图片" style="margin-bottom:10px"/>
</td></tr>
			<tr><td><span>上传小图：</span></td><td>
			<input type="text" id="url1" name="info[picwzurl]" value="<?php echo ($index_pic_arr["picwzurl"]); ?>" class="ke-input-text"/> <input type="button" id="image1" class="btn btn-success delpic" value="选择图片" style="margin-bottom:10px"/>
</td></tr>
	<tr><td><span>连接地址：</span></td><td>
					<input type="text" name="info[vidurl]" value="<?php echo ($index_pic_arr["vidurl"]); ?>"  class="ke-input-text"/> 例：http://www.baidu.com
		</td></tr>

			<tr>
		

			  <td><span class="needed">*</span>发表时间：</td>

			  <td><input type='text' name='info[updatetime]' value="<?php  echo date('Y-m-d H:i:s',time()); ?>" class='text-input small-input Wdate'  onBlur="FireEvent(this,'onchange');" onFocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss',readOnly:true})"   readonly=""/></td>

			</tr>

             <tr>

             	<td colspan="2"><input type="reset" class="an" value="重置信息"/>&nbsp;&nbsp;<input type="submit" value="保存发布" name="dosubmit"  class="an"/></td>

             </tr>

          </table>

          </form>

          <script type="text/javascript">
			  $('.myForm').Validform({

				tiptype:3,

				ajaxPost:true,

				callback:function(data){

					if(data.status=='y'){

						setTimeout(function(){window.location="__APP__/Index/picture/cls/3";},1000);

					}

				}

			  })
			  
			KindEditor.ready(function(K) {
			var editor = K.editor({
					allowFileManager : true
				});
				K('#image3').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							showRemote : false,
							imageUrl : K('#url3').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#url3').val(url);
								editor.hideDialog();
							}
						});
					});
				});
			});
			KindEditor.ready(function(K) {
			var editor = K.editor({
					allowFileManager : true
				});
				K('#image1').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							showRemote : false,
							imageUrl : K('#url1').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#url1').val(url);
								editor.hideDialog();
							}
						});
					});
				});
			});
			
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
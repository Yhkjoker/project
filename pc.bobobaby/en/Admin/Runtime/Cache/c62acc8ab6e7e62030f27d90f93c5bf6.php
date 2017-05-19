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
<div id="breadcrumb"> <a href="__APP__/Index/index/cls/1" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>主页</a><span class="nadd">->&nbsp;&nbsp;&nbsp;编辑问卷</span></div>
<!--breadcrumbs-->

  <div class="container-fluid">

    <div class="quick-actions_homepage">

      <ul class="quick-actions">

	   <li class="bg_lb"> <a href="__APP__/Try/questionnaire/cls/8"> <i class="icon-dashboard"></i>问卷调查</a></li>

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

          <form class="myForm" action="__APP__/Try/doQuestionnaire/action/edit/id/<?php echo ($prom_arr["id"]); ?>" method="post">

           <table class="table table-bordered table-striped">

			<tr>

			  <td width="80px"><span class="needed">*</span>栏目：</td>

			  <td>问卷调查
			  </td>

			</tr>

			<tr>

			  <td><span class="needed">*</span>问卷名称：</td>

			  <td><input type="text" name="info[title]" datatype="*" nullmsg="标题为空" value="<?php echo ($prom_arr["title"]); ?>"/>
			  </td>

			</tr>

				<tr><td><span> 问卷信息：</span><br/><span style="color:#f00;">注:<br/>字段：只能输入英文字母且一份问卷中的字段名称不能重复;</span><br/><span style="color:#f00;">选项：填写的每个选项必须以-分隔;<br/>(例：男-女)</span></td><td>
					
					<table width="100%" >
     
							<tbody>
								<tr>
									<th width="100" style="background-color: #f5f5f5;">问题名称</th>
									<th width="50" style="background-color: #f5f5f5;">字段</th>	
									<th width="50" style="background-color: #f5f5f5;">问题类型</th>
									<th width="250" style="background-color: #f5f5f5;">选项</th>	
									<th width="50" style="background-color: #f5f5f5;"></th>
							  </tr>
							 </tbody>
							 
							 <tbody id="addTrr">
							 
							 <?php if(is_array($prom_list)): foreach($prom_list as $key=>$v): ?><tr id="d_<?php echo ($v["id"]); ?>">
									<td>
											<input type="text"  style="width:100px;" name="info_up[<?php echo ($v["id"]); ?>][quesname]" value="<?php echo ($v["quesname"]); ?>"/>	
									</td>
								
									<td>
											<input type="text"  style="width:50px;"  name="info_up[<?php echo ($v["id"]); ?>][fieldname]" value="<?php echo ($v["fieldname"]); ?>"/>
									</td>
							
									 <td >
										<select name="info_up[<?php echo ($v["id"]); ?>][typeid]" style="width:70px;margin:0px">
											<option value="1" <?php if($v[typeid] == 1): ?>selected<?php endif; ?>>单选</option>
											<option value="2" <?php if($v[typeid] == 2): ?>selected<?php endif; ?>>多选</option>
										</select>
								  </td>
								  
								  		<td>
											<textarea name="info_up[<?php echo ($v["id"]); ?>][content]" style="margin:0px;width: 414px; height: 42px; "><?php echo ($v["content"]); ?></textarea>
			
											
									</td>
									<td>
													<a style='color:#307cb8;cursor:pointer;' onClick='getIDDele(<?php echo ($v["id"]); ?>,"d_<?php echo ($v["id"]); ?>")'> 删除</a>
									</td>
								</tr><?php endforeach; endif; ?>
						
						  </tbody>
						
							<tbody><tr>
								<td style="border:none;" colspan="2">
								<div class="fl zjjgqj">
									<a id="getCtr" href="javascript:void(0);">
											<img src="__PUBLIC__/aimages/jia.jpg">
									<span>增加问题 </span>
									</a>
								</div>
								</td>
								</tr>
							
						  </tbody></table>

					

		</td></tr>
		
					
             </tr>



             <tr>

             	<td colspan="2"><input type="reset" class="an" value="重置信息"/>&nbsp;&nbsp;<input type="submit" value="保存发布" name="dosubmit"  class="an"/></td>

             </tr>

          </table>

          </form>

          <script type="text/javascript">
		  
		  	$(function(){

    $("#getCtr").click(function(){     

		 var y_id=$("#addTrr tr").length;


        var str='';
        str+="<tr id='p"+y_id+"'>";
        str+="<td><input type='text' style='width:100px;' name='info[quesname][]' /></td>";
		str+="<td><input type='text'  style='width:50px;'  name='info[fieldname][]' /></td>";
		str+='<td ><select name="info[typeid][]" style="width:70px;margin:0px"><option value="1">单选</option><option value="2">多选</option></select></td>';	
		str+='<td><textarea name="info[content][]" style="margin:0px;width: 414px; height: 42px; "></textarea></td>';
		str+="<td><a style='color:#307cb8;cursor:pointer;' onClick='getDele(this)'> 删除</a></td>";
        str+="</tr>";

			$("#addTrr").append(str);
    
    });
});
		  

	
function getIDDele(val,j){
		$.ajax({
			type:"POST",
			url:"__APP__/Try/delQues_data",
			data:"id="+val,
			success:function(data){
					if(data){
						 $("#"+j).remove(); 
					
					}
			
			
			}
		
		
		
		})
		
			

	
}	
		  
		  
			  $('.myForm').Validform({

				tiptype:3,

				ajaxPost:true,

				callback:function(data){

					if(data.status==1){

						setTimeout(function(){window.location="__APP__/Try/questionnaire/cls/8";},1000);

					}

				}

			  })
function getDele(j){
    $(j).parent().parent().remove();     
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
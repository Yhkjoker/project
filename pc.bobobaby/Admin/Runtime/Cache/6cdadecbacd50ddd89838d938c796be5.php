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
KindEditor.ready(function(K) {
	K.create('#ke_demo_one', {
		allowFileManager : true,
		afterBlur: function(){this.sync();}
	});
});
</script>
<div id="content">
<div id="breadcrumb"> <a href="__APP__/Index/index/cls/1" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>主页</a><span class="nadd">->&nbsp;&nbsp;&nbsp;添加产品</span></div>
<!--breadcrumbs-->

  <div class="container-fluid">

    <div class="quick-actions_homepage">

      <ul class="quick-actions">

	   <li class="bg_lb"> <a href="__APP__/Product/product/catid/<?php echo ($cate_arr["catid"]); ?>/cls/2"> <i class="icon-dashboard"></i><?php echo ($cate_arr["catname"]); ?></a></li>

      </ul>

    </div>

<!--End-breadcrumbs-->

 <div class="row-fluid">

     <div class="span12">

        <div class="widget-box">

          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>

            <h5>新增</h5>

          </div>

          <div class="widget-content nopadding">

          <form  action="__APP__/Product/doProduct/action/add" method="post" enctype="multipart/form-data">

           <table class="table table-bordered table-striped">

			<tr>

			  <td><span class="needed">*</span>栏目：</td>

			  <td><?php echo ($cate_arr["catname"]); ?>
			  </td>

			</tr>

			<tr>

			  <td><span class="needed">*</span>标题：</td>

			  <td><input type="text" name="info[title]" datatype="*" nullmsg="标题为空"/>
			  <input type="hidden" name="info[catid]" value="<?php echo ($cate_arr["catid"]); ?>"/>
			  </td>

			</tr>
			
			<tr>

			  <td>二级栏目：</td>

			  <td>
				<select name="info[linkageid]">
					<option value="0">无二级栏目</option>	
					<?php if(is_array($link_list)): foreach($link_list as $key=>$v): ?><option value="<?php echo ($v["linkageid"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
				</select>
			  </td>

			</tr>
			<tr>

             	<td><span class="needed">*</span>是否能试用产品：</td>

             	<td><input type="radio" name="info[actstatus]" value="0" <?php if($pro_arr["actstatus"] == 0): ?>checked<?php endif; ?>/>否<input type="radio" name="info[actstatus]" value="1" <?php if($pro_arr["actstatus"] == 1): ?>checked<?php endif; ?>/>是</td>

             </tr>
			
				<tr>

			  <td>调查卷：</td>

			  <td>
				<select name="info[pmid]">
					<option value="0">请选择调查卷</option>	
					<?php if(is_array($problem_list)): foreach($problem_list as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["title"]); ?></option><?php endforeach; endif; ?>
				</select>
			  </td>

			</tr>

			<tr>

             	<td><span class="needed">*</span>活动介绍：</td>

             	<td><textarea name="info[activity]" id="ke_demo_one" style="width:800px;height:350px;" datatype="*" ignore="ignore" nullmsg="不能为空"></textarea></td>

             </tr>
			


             <tr>

             	<td><span class="needed">*</span>内容：</td>

             	<td><textarea name="info[content]" id="ke_demo" style="width:800px;height:350px;" datatype="*" ignore="ignore" nullmsg="不能为空"></textarea></td>

             </tr>
		<tr><td><span>上传封面图片：</span></td><td>
			<input type="text" id="url3" name="info[picurlpc]" value="" class="ke-input-text"/> <input type="button" id="image3" class="btn btn-success delpic" value="选择图片" style="margin-bottom:10px"/>
</td></tr>


		</tr>
					<tr><td><span> 价格信息：</span></td><td>
					
					<table width="950" >
     
							<tbody>
								<tr>
									<th width="100" style="background-color: #f5f5f5;">容量</th>
									<th width="100" style="background-color: #f5f5f5;">价格</th>	
									<th width="300" style="background-color: #f5f5f5;">材质</th>	
									<th width="350" style="background-color: #f5f5f5;">封面图</th>	
									<th width="50" style="background-color: #f5f5f5;"></th>
							  </tr>
							 </tbody>
							 
							 <tbody id="addTrr">
						
							 
								<tr id="p0">
									<td>
											<input type="text"  style="width:100px;" name="info_price[capacity][]"/>	
									</td>
								
									<td>
											<input type="text"  style="width:100px;"  name="info_price[price][]"/>
									</td>
							
									 <td >
									<ul >
								  <?php if(is_array($texture_list)): foreach($texture_list as $key=>$vo): ?><li style="float:left;"><div><input type="checkbox" name="info_price[texturelist][0][]" value="<?php echo ($vo["id"]); ?>"  ><?php echo ($vo["colorname"]); ?></div></li><?php endforeach; endif; ?>
									</ul>
								  </td>
								  
								  		<td>
												<input type="file"  name="fmpicurl[]"  class="ke-input-text" /> 
											
									</td>
									<td>
											<a style='color:#307cb8;cursor:pointer;' onClick='getDele(this)'> 删除</a>
									</td>
								</tr>

						
						  </tbody>
						
							<tbody><tr>
								<td style="border:none;" colspan="2">
								<div class="fl zjjgqj">
									<a id="getCtr" href="javascript:void(0);">
											<img src="__PUBLIC__/aimages/jia.jpg">
									<span>增加价格区间 </span>
									</a>
								</div>
								</td>
								</tr>
							
						  </tbody></table>

					

		</td></tr>
		
			
		
				<tr><td colspan="2">
				<div id="J_imageView">
								</div>
				
				</td></tr>

		

			<tr>
		

			  <td><span class="needed">*</span>发表时间：</td>

			  <td><input type="hidden" name="info[picurlpcall]" id="purl" value=""/><input type='text' name='info[inputtime]' value="<?php  echo date('Y-m-d H:i:s',time()); ?>" class='text-input small-input Wdate'  onBlur="FireEvent(this,'onchange');" onFocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss',readOnly:true})"   readonly=""/></td>

			</tr>
			
			
			
			
             <tr>

             	<td colspan="2"><input type="hidden" id="msgcount" value="0"><input type="reset" class="an" value="重置信息"/>&nbsp;&nbsp;<input type="button" id="J_selectImage" class="an" value="批量上传" />&nbsp;&nbsp;<input type="submit" value="保存发布" name="dosubmit"  class="an"/></td>

             </tr>

          </table>

          </form>

          <script type="text/javascript">
			  $('.myForm').Validform({

				tiptype:3,

				ajaxPost:true,

				callback:function(data){

					if(data.status=='y'){

						setTimeout(function(){window.location="__APP__/Product/product/catid/<?php echo ($cate_arr["catid"]); ?>/cls/2";},1000);

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
			


var string = '<?php echo ($msg); ?>';		
			
KindEditor.ready(function(K) {
				var editor = K.editor({
				});
				var _id = 0;
				K('#J_selectImage').click(function() {			
					editor.loadPlugin('multiimage', function() {
						editor.plugin.multiImageDialog({
					
						clickFn : function(urlList) {
								var url=document.getElementById("purl").value;		
								var div = K('#J_imageView');
								K.each(urlList, function(i, data) {
								string = string.replace(/xxx\d/g,"xxx"+_id);
											div.append('<div>'+string+'<p><img src="'+data.url+'" width="200px" height="200px"/></p><hr/></div>');
											url=url+","+data.url;	
												_id++;
								});		
								
								if (url.substr(0,1)==',') 
								url=url.substr(1);
								
								document.getElementById("purl").value=url;
								
								editor.hideDialog();
							}
						});
					});
				});
			});
			
	$(function(){

    $("#getCtr").click(function(){     

		 var y_id=$("#addTrr tr").length;


        var str='';
        str+="<tr id='p"+y_id+"'>";
        str+="<td> <input type='text' style='width:100px'   name='info_price[capacity][]' /></td>";
		str+="<td> <input type='text' style='width:100px;' name='info_price[price][]'/></td>";
		str+="<td ><ul >";
				  <?php if(is_array($texture_list)): foreach($texture_list as $key=>$v): ?>str+='<li style="float:left;"><div><input type="checkbox" name="info_price[texturelist]['+y_id+'][]" value="<?php echo ($v["id"]); ?>"><?php echo ($v["colorname"]); ?></div></li>';<?php endforeach; endif; ?>
		str+="</ul></td>";	
		str+='<td><input type="file"  name="info_price[fmpicurl][]" value="" class="ke-input-text"/> </td>';
		str+="<td><a style='color:#307cb8;cursor:pointer;' onClick='getDele(this)'> 删除</a></td>";
        str+="</tr>";

			$("#addTrr").append(str);
			
	
	
		
       
    });
});
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
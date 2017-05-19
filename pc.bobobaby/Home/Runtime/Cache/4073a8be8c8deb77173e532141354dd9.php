<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no'>
    <title><?php echo ($site_arr["stitle"]); ?></title>
    <link rel="shortcut icon" href="__PUBLIC__/img/favicon.ico" />
    <link type="text/css" rel="stylesheet" href="__PUBLIC__/css/lib.min.min.css" />
    <link type="text/css" rel="stylesheet" href="__PUBLIC__/css/lib.mincss.css" />
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/css/style.css" />
    <meta name="description" content="<?php echo ($site_arr["sdescription"]); ?>">
    <meta name="keywords" content="<?php echo ($site_arr["skeywords"]); ?>">
    <link href="" rel="stylesheet">
    <link href="__PUBLIC__/css/lib.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="static/js/html5shiv.min.js"></script>
      <script src="static/js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="__PUBLIC__/js/main.min.js"></script>
    
</head>


<body>
    <div class="container">
    
        <!-- top header -->
        <div class="header">
            <div class="top-bar inner">
                <a href="__APP__" class="logo"><img src="__PUBLIC__/img/logo.png"></a>
                <!-- search -->
				
				
                <div class="search-wrap">
					<form action="<?php echo U('Product/product_search');?>" method="get">
						<input type="text" name="keyword" class="" placeholder="请输入您要搜索的内容">
                        <input class="btn-search" type="submit" value="" />
                        <div class="btn-searchTop"></div>
					</form>	
                </div>
                <script>
                    $('.btn-searchTop').click(function(){
					    $(this).hide();	
					});
                </script>
                <!-- language select -->
                <div class="lang-wrap">
                    <div class="dian_01">·</div>
                    <a href="#" class="btn-lang"><i class="icon-lang"></i></a>
                    <span>
                        <a href="http://t.mofang.cn/bobo2/en">English</a> | <a href="javascript:;">中文</a>
                    </span>
                    <div class="dian_02">·</div>
                </div>
                
                <!-- social -->
                <div class="social-wrap">
                    <ul>
                        <li>
                            <a href="#" class="btn-wchat">
                                <i class="icon-wchat"></i>
                                <span class="erweima"><img src="__PUBLIC__/img/erweima.png"></span>
                            </a>
                        </li>
                        <li>
                            <a href="http://wpa.qq.com/msgrd?v=3&uin=1912526886&site=qq&menu=yes" target="_blank" class="btn-qq"><i class="icon-qq"></i></a>
                        </li>
                        <li>
                            <a href="http://weibo.com/bobochina?refer_flag=1005055013" target="_blank" class="btn-weibo"><i class="icon-weibo"></i></a>
                        </li>
                    </ul>
                    <div class="dian_03">·</div>
                </div>
                <!-- user -->
                <div class="user-wrap">
<?php  session_start(); if(!$_SESSION['bobo_pc_user_id']){ ?>  
<a href="javascript:" class="btn-login" id="btn-login">登录</a>
<?php }else{ ?>
<a href="<?php echo U('Member/outMember');?>" class="btn-login">退出</a>

<?php } ?>
                </div>
                <div class="hello_bobo"><?php  if($_SESSION['bobo_pc_user_id']){ ?>  您好&nbsp;,&nbsp;<?php } if(empty($_SESSION['bobo_pc_user_nickname'])){echo $_SESSION['bobo_pc_user_name'];}else{ echo $_SESSION['bobo_pc_user_nickname']; } ?>
				</div>
            </div>
            <div class="nav-wrap">
                <ul class="nav-bar inner">
                    <li class="near">
                        <a href="__APP__" title="">首页</a>
                    </li>
                    <li class="">
                        <a href="<?php echo U('Index/about',array('catid'=>29));?>" title="">品牌专区</a>
                        <div class="sub-nav brand">
                            <ul class="cp-catalog">
                                <li class="active">
                                    <a href="<?php echo U('Index/about',array('catid'=>29));?>" data-for="bobo-about">关于bobo</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Content/content',array('catid'=>23));?>" data-for="bobo-event">活动资讯</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Content/content',array('catid'=>24));?>" data-for="bobo-knowledge">bobo宝典</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Content/content',array('catid'=>25));?>" data-for="bobo-news">bobo新闻</a>
                                </li>
                            </ul>
                            <div class="cp-list">
                                <ul id="bobo-about" class="active">
									<li <?php if($k == 0): ?>class="active"<?php endif; ?> ><a href="<?php echo U('Index/about',array('catid'=>29));?>" data-img="<?php echo ($page_header_arr["picurl"]); ?>"><?php echo ($page_header_arr["title"]); ?></a></li>
                                </ul>
                                <ul id="bobo-event">
									<?php if(is_array($con_list_one)): foreach($con_list_one as $k=>$v): ?><li <?php if($k == 0): ?>class="active"<?php endif; ?> ><a href="<?php echo U('Content/news_xq',array('catid'=>$v[catid],'id'=>$v[id]));?>" data-img="<?php echo ($v["headerpic"]); ?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>
                                </ul>
                                <ul id="bobo-knowledge">
                                   		<?php if(is_array($con_list_two)): foreach($con_list_two as $k=>$v): ?><li <?php if($k == 0): ?>class="active"<?php endif; ?> ><a href="<?php echo U('Content/news_xq',array('catid'=>$v[catid],'id'=>$v[id]));?>" data-img="<?php echo ($v["headerpic"]); ?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>
                                </ul>
                                <ul id="bobo-news">
                                       <?php if(is_array($con_list_three)): foreach($con_list_three as $k=>$v): ?><li <?php if($k == 0): ?>class="active"<?php endif; ?> ><a href="<?php echo U('Content/news_xq',array('catid'=>$v[catid],'id'=>$v[id]));?>" data-img="<?php echo ($v["headerpic"]); ?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>
                                </ul>
                            </div>
                            <div class="cp-photo"><img src="__PUBLIC__/img/bobonav.png" width="282" height="212"></div>
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo U('Product/product_all');?>" title="">产品专区</a>
                        <div class="sub-nav">
                            <ul class="cp-catalog">
                                <li class="active">
                                    <a href="<?php echo U('Product/product',array('catid'=>14));?>" data-for="cp-new">新品推荐</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Product/product_all');?>" data-for="cp-all">全部产品</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Video/video',array('catid'=>26));?>" data-for="cp-video">产品视频</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Report/report',array('catid'=>27));?>" data-for="cp-report">检测报告</a>
                                </li>
                            </ul>
                            <div class="cp-list">
                                <ul id="cp-new" class="active">
								<?php if(is_array($pro_header)): foreach($pro_header as $k=>$v): ?><li <?php if($k == 0): ?>class="active"<?php endif; ?>><?php if($v["xqstatus"] == 1): ?><a href="<?php echo U('Product/product_details',array('catid'=>$v[catid],'pid'=>$v[id],'ppid'=>$v[ppid]));?>" data-img="<?php echo ($v["picurlpc"]); ?>"><?php else: ?><a href="javascript:alert('此产品已下架')" data-img="<?php echo ($v["picurlpc"]); ?>"><?php endif; echo ($v["title"]); ?></a></li><?php endforeach; endif; ?> 
                                </ul>
                                <ul id="cp-all">
                            
									<?php if(is_array($catname_list)): foreach($catname_list as $k=>$v): ?><li <?php if($k == 0): ?>class="active"<?php endif; ?>><a href="<?php echo U('Product/product',array('catid'=>$v[catid]));?>" data-img="<?php echo ($v["caturl"]); ?>"><?php echo ($v["catname"]); ?></a></li><?php endforeach; endif; ?>	
                                
                                </ul>
                                <ul id="cp-video">
								<?php if(is_array($video_header)): foreach($video_header as $k=>$v): ?><li <?php if($k == 0): ?>class="active"<?php endif; ?>><a href="<?php echo U('Video/video',array('catid'=>$v[catid]));?>" data-img="<?php echo ($v["headerpic"]); ?>"><?php echo ($v["vtitle"]); ?></a></li><?php endforeach; endif; ?>
                                </ul>
                                <ul id="cp-report">
								<?php if(is_array($jcbg_header)): foreach($jcbg_header as $k=>$v): ?><li <?php if($k == 0): ?>class="active"<?php endif; ?>><a href="<?php echo U('Report/report',array('catid'=>$v[catid]));?>" data-img="<?php echo ($v["headerpic"]); ?>"><?php echo ($v["vtitle"]); ?></a></li><?php endforeach; endif; ?>
          
                                </ul>
                            </div>
                            <div class="cp-photo"><img src="__PUBLIC__/img/bobonav.png" width="282" height="212"></div>
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo U('Member/member');?>" title="">会员服务</a>
                        <div class="sub-nav">
                            <ul class="cp-catalog">
                                <li class="active">
                                    <a href="<?php echo U('Try/product_list',array('cls'=>3));?>" data-for="cp-new">申请试用</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Try/index',array('cls'=>2));?>" data-for="cp-all">我的试用</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Member/product',array('cls'=>1));?>" data-for="cp-all">我的收藏</a>
                                </li>
                            </ul>
                            <div class="cp-list">
                                <ul id="cp-new" class="active">
                                <?php if(is_array($pro_header)): foreach($pro_header as $k=>$v): ?><li <?php if($k == 0): ?>class="active"<?php endif; ?>><?php if($v["xqstatus"] == 1): ?><a href="<?php echo U('Product/product_details',array('catid'=>$v[catid],'pid'=>$v[id],'ppid'=>$v[ppid]));?>" data-img="<?php echo ($v["picurlpc"]); ?>"><?php else: ?><a href="javascript:alert('此产品已下架')" data-img="<?php echo ($v["picurlpc"]); ?>"><?php endif; echo ($v["title"]); ?></a></li><?php endforeach; endif; ?> 
                                </ul>
                                <ul id="cp-all">
                            
                                    <?php if(is_array($catname_list)): foreach($catname_list as $k=>$v): ?><li <?php if($k == 0): ?>class="active"<?php endif; ?>><a href="<?php echo U('Product/product',array('catid'=>$v[catid]));?>" data-img="<?php echo ($v["caturl"]); ?>"><?php echo ($v["catname"]); ?></a></li><?php endforeach; endif; ?>  
                                
                                </ul>
                                <ul id="cp-video">
                                <?php if(is_array($video_header)): foreach($video_header as $k=>$v): ?><li <?php if($k == 0): ?>class="active"<?php endif; ?>><a href="<?php echo U('Video/video',array('catid'=>$v[catid]));?>" data-img="<?php echo ($v["headerpic"]); ?>"><?php echo ($v["vtitle"]); ?></a></li><?php endforeach; endif; ?>
                                </ul>
                                <ul id="cp-report">
                                <?php if(is_array($jcbg_header)): foreach($jcbg_header as $k=>$v): ?><li <?php if($k == 0): ?>class="active"<?php endif; ?>><a href="<?php echo U('Report/report',array('catid'=>$v[catid]));?>" data-img="<?php echo ($v["headerpic"]); ?>"><?php echo ($v["vtitle"]); ?></a></li><?php endforeach; endif; ?>
          
                                </ul>
                            </div>
                            <div class="cp-photo"><img src="__PUBLIC__/img/bobonav.png" width="282" height="212"></div>
                        </div>
                    </li>
                    <li>
                        <a class="Appxiazai" href="javascript:;" title="">APP下载</a>
                    </li>
                </ul>
            </div>
        </div>



        <!--弹出app下载二维码-->
        <div id="Apptan">
            <div class="Apperweidi"></div>
            <div class="Apperwei">
                <div class="ApperweiNei">
                    <img class="APPGbBtn" src="__PUBLIC__/img/gbbg.png" onClick="_kongxi()">
                    <img src="__PUBLIC__/img/APPxiazai01.png">
                    <div class="kongxi" onClick="_kongxi()"></div>
                    <img src="__PUBLIC__/img/APPxiazai02.png">
                    <div class="kongxi" onClick="_kongxi()"></div>
                    <img src="__PUBLIC__/img/APPxiazai03.png">
                </div>
            </div>
        </div>


        <script type="text/javascript">
                $('.Appxiazai').click(function(){
                    $('#Apptan').show();
                });
                $('.Apperweidi').click(function(){
                    $('#Apptan').hide();
                });
				function _kongxi(){
					$('#Apptan').hide();
				};

        </script>






















        <!--内容-->
        <div class="Product_list_content shiyong">
			          <div class="Product_list_left f_left marg">
                <div>
					<h1><a href="<?php echo U('Try/product_list',array('cls'=>3));?>" <?php if($_GET[cls] == 3): ?>class="dba"<?php endif; ?>>试用中心</a></h1>
					<h1><a href="<?php echo U('Try/index',array('cls'=>2));?>" <?php if($_GET[cls] == 2): ?>class="dba"<?php endif; ?>>我的试用</a></h1>
                    <h1><a href="<?php echo U('Member/product',array('cls'=>1));?>" <?php if($_GET[cls] == 1): ?>class="dba"<?php endif; ?>>我的收藏</a></h1>
                </div>
          </div>
            <div class="Product_list_right f_right">
                <div class="Product_list_right_photo">
                    <img class="Product_list_right_photo01" src="<?php echo ($try_arr["picurlpc"]); ?>" />
                    <div class="Product_list_right_photo_DW"></div>
                    <div class="Product_list_right_photo_TxtDW">
                        <h2><?php echo ($try_arr["title"]); ?><span><?php echo ($try_arr["capacity"]); ?></span></h2>
                    </div>
                </div>
                <div class="Product_list_right_content">
                    <div class="Product_list_right_contentTop">
					<form action="<?php echo U('Try/doAddress',array('id'=>$id));?>" method="post">
                        <h2>快递地址</h2>
                        <table>
                          <tr>
                            <td width="140px">收货人姓名：</td>
                            <td><input class="Product_list_right_contentTop_Txt" type="text" id="name" /></td>
                          </tr>
                          <tr>
                            <td width="140px">邮寄地址：</td>
                            <td><input class="Product_list_right_contentTop_Txt" type="text" id="address" /></td>
                          </tr>
                          <tr>
                            <td width="140px">联系电话：</td>
                            <td><input class="Product_list_right_contentTop_Txt" type="text" id="phone"/></td>
                          </tr>
                        </table>
                        <div class="Product_list_right_contentTop_Btn">
                            <input class="Product_list_right_contentTop_Btn01" type="button" value="确认" onclick="shtj();"/>
                            <input class="Product_list_right_contentTop_Btn02" type="reset" value="重填" />
                        </div>
					</form>	
                    </div>
				<?php if($try_list ): ?><div class="Product_list_right_contentBottom">
                       <h3>您的其他申请</h3>
                       <ul>
						<?php if(is_array($try_list)): foreach($try_list as $key=>$v): ?><li>
                              <img class="Product_list_right_contentBottom_photo01" src="<?php echo ($v["picurlpc"]); ?>" />
                              <div class="Product_list_right_contentBottom_DW"></div> 
                              <div class="Product_list_right_contentBottom_TxtDW">
                                  <h2><?php echo ($v["title"]); ?><span><?php echo ($v["capacity"]); ?></span></h2>
                              </div>
                           </li><?php endforeach; endif; ?>  
                          
                       </ul>
                    </div><?php endif; ?>
                </div>
	        </div>
	    </div>
        <!-- footer -->
        <div class="zhankai"></div>
        
       <!--地址提交成功 弹出窗-->
        <div class="TryUseBg">
            <i></i>
        </div>
        <div class="TryUseBgDiv">
            <i></i>
            <h3>地址提交成功！</h3>
            <p>感谢选择bobo产品试用！</p>
            <p>可至“我的试用”查看进度，请耐心等待！</p>
        </div>
        <!-- 2016-05-24修改弹窗样式 -->
         
         <div class="shiyongtclbBg" onclick="guanbi()"><img class="shiyongtclbBgGb" src="/bobo2/Public/img/gbbg.png" /></div>
         <div class="shiyongtclb">
             <i class="cuoicon"></i>
             <p class="tanchaungtxt"></p>
         </div>

        <div class="footers"><div class="inner inner-ban">
                <div class="f_left">
                    <ul class="nav-footer">
                        <li><a href="#">网站地图</a> | </li>
                        <li><a href="#">个人隐私保护政策</a> | </li>
                        <li><a href="#">使用条款</a></li>
                    </ul>
                    <p>新文越婴童用品（上海）有限公司 版权所有
                        <br>Solaris Children Care (Shang Hai) Company Limited All Copyrights Reserved</p>
                </div>
                <div class="f_right">
                    <img src="__PUBLIC__/img/icp-logo.png">沪ICP备14026024号
                </div>
            </div></div>
    
    </div>
    <style>
    .backb { background:url("/bobo2/Public/img/iconc1.png") no-repeat !important;}
    </style>
    <div class="bgbg"></div>
    <div class="dlzc" >
         <div class="denglu">

             <div class="dengluLeft">登&nbsp;&nbsp;录</div>
             <div class="dengluRight">注&nbsp;&nbsp;册</div>
		<form class="registerform" action="__APP__/Member/dologin"  method="post">
             <dl>
               <dt>用户名</dt>
               <dd><input class="inqut_border" name="username" type="text" placeholder="手机号码"  datatype="m" nullmsg=" " errormsg=" ">
               </dd>
               <dt>密码</dt>
               <dd><input class="inqut_border" name="password" type="password" placeholder="6到16位英文或者数字" nullmsg=" " datatype="*6-16" errormsg=" ">
               </dd>
               <div class="tijiao"><input type="reset" class="chongtian" value="重&nbsp;填"/><span>•</span><input type="submit" class="queren" value="确&nbsp;认"/></div>
               
             </dl>
		</form>	 
         </div>
    </div>

    <form id="signupForm" method="post" action="__APP__/Member/doregister" class="zcform">
        <div class="dengluLeft_01">注&nbsp;&nbsp;册</div>
        <div class="dengluRight_01">登&nbsp;&nbsp;录</div>
        <div class="clearfix posi">
        	<p class="mageinn">用户名</p>
        	<input id="telphone" type="text" name="info[username]" class="required inqut_border"  placeholder="手机号码"  datatype="m" nullmsg=" " errormsg=" "/>
         
            <a class="get_code" href="javascript:sendcode();" id="ntc" />验&nbsp;&nbsp;证</a>
        </div>
		
        <div class="clearfix">
        	<p class="mageinn">输入验证码</p>
            <input class="identifying_code inqut_border" type="text"  name="info[code]"  datatype="*" nullmsg=" "  placeholder="输入您手机收到的校验码" />
          
        </div>
		
        <div class="clearfix">
         	<p class="mageinn">密码</p>
        	<input id="password" name="info[password]"   datatype="*6-16" nullmsg=" " errormsg=" " type="password" class="{required:true,rangelength:[8,20],} inqut_border" value placeholder="6到16位英文或者数字" />
         
        </div>
		
        <div class="clearfix">
        	<p class="mageinn">重复密码</p>
        	<input id="confirm_password" name="repassword"  type="password" class="{required:true,equalTo:'#password'} inqut_border" value placeholder="6到16位英文或者数字" datatype="*" recheck="info[password]" nullmsg=" " errormsg=" "/>

        </div>
	
        <p class="last"><input type="reset" class="chongtian" value="重&nbsp;填"/><span>•</span><input type="submit" class="tijiao" value="提&nbsp;交"/></p>
        <!--<p class="last"><a class="chongtian" href="#">重填</a><span>·</span><a class="tijiao" href="#">提交</a></p>-->
    </form>
    </div>

    
        <!--收藏成功 弹出窗-->
        <div class="TryUseBg00">
            <i></i>
        </div>
        <div class="TryUseBgDiv00">
            <i></i>
            <p>收藏成功</p>
        </div>
        
        <!--取消收藏 弹出窗-->
        <div class="TryUseBg01">
            <i></i>
        </div>
        <div class="TryUseBgDiv01">
            <i></i>
            <p>取消收藏成功</p>
        </div>
    
    
    <script type="text/javascript" src="__PUBLIC__/js/jquery-1.8.3-min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/jquery.validate.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/jquery.metadata.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/slick.min.js"></script>
    <!-- <script type="text/javascript" src="__PUBLIC__/js/resgin.js"></script> -->
    <!--<script type="text/javascript" src="__PUBLIC__/js/main.min.js"></script>-->
	<script type="text/javascript" src="__PUBLIC__/js/Validform_v5.3.2_min.js"></script>

    <script type="text/javascript">
      //点击按钮


    /*banner*/
    jQuery(function($) {
        $('.slider-wrapper').slick({
            dots: true,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear'
        });
    })
    /*头部搜索点击*/
    $('.search-wrap').click(function() {
        $(this).animate({
            width: '200px'
        }, 500);
    })

    $('.zhankai').click(function() {
        $('.inner-ban').slideDown();
        var a = $(window).scrollTop() + 150;
        $('html,body').animate({
            scrollTop: a
        }, 500);
        $(this).hide()
    })
    $('.inner-ban').click(function() {
        $(this).slideUp();
        $('.zhankai').show()
    })
   
   var heightBody = $(window).height();
    $('.bgbg').height(heightBody);


    $('#btn-login').click(function() {
        $('.dlzc, .bgbg').show();
    })

    $('.bgbg').click(function() {
        $('.dlzc, .bgbg, .zcform').hide();
    })

    $('.dengluRight').click(function() {
        $('.dlzc').hide();
        $('.zcform').show();
    })
    $('.dengluRight_01').click(function() {
        $('.zcform').hide();
        $('.dlzc').show();
    })
   </script> 
    <script type="text/javascript">
	$(function(){	
		$(".registerform").Validform({
			ajaxPost:true,
			tiptype:3,
			callback:function(arr){
			if(arr.status=="y"){
				setTimeout(function(){
					//window.location.reload();
				},2000);
			}else if(arr.status=="n" || arr.status=='nn'){
                $('.zcform').siblings('#Validform_msg').find('.Validform_title').addClass('backb');
				setTimeout(function(){
					//window.location.reload();
				},2000);
			}
		}
		
		});		
	})
	
	
	 function sendcode(){
	  	var ph = $('#telphone').val();
		var reg=/^[1][3][0-9]{9}$/;
		var re = new RegExp(reg);
			if(!re.test(ph)){
			
				alert("请正确填写手机号！");
			}else{
				settime();
					$.post("__APP__/Member/message",{phone:ph},function(data){
							if(data.status=="n"){
								alert(data.info);
							}
					},'json');
			}
		}
   

 
 

	var countdown=60; 
	function settime() { 
	
		var obj=document.getElementById('ntc');
		if (countdown == 0) { 
			obj.href="javascript:sendcode(this);";
			obj.innerHTML="验证"; 
			countdown = 60; 
			return;
		} else { 
			obj.href="javascript:void(0);";
			obj.innerHTML="(" + countdown + ")"; 
			countdown--; 
		} 
		setTimeout(function() { 
		settime(obj) }
		,1000) 
	}

	
	
	
	$(function(){	
		$(".zcform").Validform({
			ajaxPost:true,
			tiptype:3,
			callback:function(arr){
			if(arr.status=="y"){
				setTimeout(function(){
				//	window.location.reload();
				},2000);
			}else if(arr.status=="n" || arr.status=='nn'){
                 $('.zcform').siblings('#Validform_msg').find('.Validform_title').addClass('backb');
				setTimeout(function(){
					//window.location.reload();
				},2000);
			}
            

            
             
            
		}
		
		});		
	});
	

  /*全部产品 收藏点击*/
  
  function collect_tj(ppid){
		$.post("<?php echo U('Product/addCollect');?>",{ppid:ppid},function(data){
				if(data){
					$('.TryUseBg00,.TryUseBgDiv00').show();
					setTimeout(function(){window.location.reload();},5000)
				}
		
		
		})
  
  
  }
  /*关闭弹窗*/
  $('.TryUseBg00').click(function(){
      $(this).hide().next().hide();
	  window.location.reload();
  });
  
  function collect_del(colid){
	$.post("<?php echo U('Product/delCollect');?>",{colid:colid},function(data){
				if(data){
					$('.TryUseBg01,.TryUseBgDiv01').show();
					setTimeout(function(){window.location.reload();},5000)
				}
		
		
		})
  
  }
  /*关闭弹窗*/
  $('.TryUseBg01').click(function(){
      $(this).hide().next().hide();
	  window.location.reload();
  });
  
  	function hhhhh(){
			$('.dlzc, .bgbg').show();
	}	  
  
  
  
  

  
/*兼容输入框*/

$(function(){
if(!placeholderSupport()){   // 判断浏览器是否支持 placeholder
    $('[placeholder]').focus(function() {
        var input = $(this);
        if (input.val() == input.attr('placeholder')) {
            input.val('');
            input.removeClass('placeholder');
        }
    }).blur(function() {
        var input = $(this);
        if (input.val() == '' || input.val() == input.attr('placeholder')) {
            input.addClass('placeholder');
            input.val(input.attr('placeholder'));
        }
    }).blur();
};
})
function placeholderSupport() {
    return 'placeholder' in document.createElement('input');
}
	
	
	/*设置产品中心左侧菜单的高度*/
 
 var _heig = $('.Product_list_content').height();
 $('.Product_list_left').css({
    'height':_heig+'px' 
	 
 });	
</script>


</body>

</html>


<script>

function shtj(){
	var name=$("#name").val();
	var address=$("#address").val();
	var phone=$("#phone").val();
	$.post("<?php echo U('Try/doAddress');?>",{name:name,address:address,phone:phone,id:<?php echo ($id); ?>},function(data){
    
			if(data.status=='n'){
				// alert(data.info);
        $('.shiyongtclbBg,.shiyongtclb').show();
        $('.tanchaungtxt').html(data.info)
			}else if(data.status=='y'){
				$('.TryUseBg,.TryUseBgDiv').show();
				setTimeout(function(){window.location.href="__APP__/Try/schedule/cls/2/id/<?php echo ($id); ?>";},5000);
			}
	
	
	
	},"json");
	


};
/*弹出窗关闭*/
function guanbi(){
      $('.shiyongtclbBg,.shiyongtclb').hide();
 
}

     
	
		/*菜单*/
	$('.nav-bar li:first').hover(function(){
		$(this).removeClass('near')
	},function(){
		$(this).addClass('near')
		})

/*地址提交成功 弹出窗*/
	   

	  $('.TryUseBg').click(function(){
		  
		$(this).hide().next().hide();
		window.location.href="__APP__/Try/schedule/cls/2/id/<?php echo ($id); ?>";
      });

</script>
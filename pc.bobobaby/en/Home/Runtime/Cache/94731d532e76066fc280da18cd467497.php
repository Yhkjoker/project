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
                        <a href="javascript:;">English</a> | <a href="http://t.mofang.cn/bobo2">中文</a>
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
                        <a href="__APP__" title="">Home</a>
                    </li>
                    <li class="">
                        <a href="<?php echo U('Index/about',array('catid'=>29));?>" title="">About bobo</a>
                        <div class="sub-nav brand">
                            <ul class="cp-catalog">
                                <li class="active">
                                    <a href="<?php echo U('Index/about',array('catid'=>29));?>" data-for="bobo-about">Brand Story</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Content/content',array('catid'=>23));?>" data-for="bobo-event">Activity Info</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Content/content',array('catid'=>24));?>" data-for="bobo-knowledge">Parenting Tips</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Content/content',array('catid'=>25));?>" data-for="bobo-news">News</a>
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
                        <a href="<?php echo U('Product/product_all');?>" title="">Our Products</a>
                        <div class="sub-nav">
                            <ul class="cp-catalog">
                                <li class="active">
                                    <a href="<?php echo U('Product/product',array('catid'=>14));?>" data-for="cp-new">New Products</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Product/product_all');?>" data-for="cp-all">All Products</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Video/video',array('catid'=>26));?>" data-for="cp-video">Videos</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Report/report',array('catid'=>27));?>" data-for="cp-report">Test Report</a>
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
                        <a href="<?php echo U('Member/member');?>" title="">Member Service</a>
                        <div class="sub-nav">
                            <ul class="cp-catalog">
                                <li class="active">
                                    <a href="<?php echo U('Try/product_list',array('cls'=>3));?>" data-for="cp-new">Application for trial</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Try/index',array('cls'=>2));?>" data-for="cp-all">My trial</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Member/product',array('cls'=>1));?>" data-for="cp-all">My collection</a>
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
                        <a class="Appxiazai" href="javascript:;" title="">App</a>
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
        <div class="Product_list_content">
			          <div class="Product_list_left f_left">
                <div>
                    <h1><a href="<?php echo U('Product/product');?>">最新产品</a></h1>
                </div>
                <div>
                    <h1 class="Product_this"><a href="<?php echo U('Product/product_all');?>">全部产品</a></h1>
					<?php if(is_array($catname_list)): foreach($catname_list as $key=>$v): ?><p><a href="<?php echo U('Product/product',array('catid'=>$v[catid]));?>" <?php if($_GET[catid] == $v[catid]): ?>class="Product_this_bg"<?php endif; ?>><?php echo ($v["catname"]); ?></a></p><?php endforeach; endif; ?>
                </div>
                <div>
                    <h1><a href="<?php echo U('Video/video',array('catid'=>26));?>">产品视频</a></h1>
                </div>
                <div>
                    <h1><a href="<?php echo U('Report/report',array('catid'=>27));?>">检测报告</a></h1>
                </div>
            </div>
            <div class="Product_list_right f_right">
                <!--banner-->
                <div class="Product_list_banner"><img src="__PUBLIC__/img/cplbvbanner.jpg" width="100%"></div>
                <!--参数显示-->
                <div class="Product_parameter">
                    <div class="Product_parameter_top">
                          <ul>
                              <li><?php if($_GET[price_search] ): echo $_GET['price_search']; ?><i></i><?php else: ?>价格<i></i><?php endif; ?>
                                  <div class="Product_parameter_topNei">
                                      <input class="radioclass" type="button" name="price_search" value="全部" onclick="searchfun(this.name,this.value);" >
                                      <input class="radioclass" type="button" name="price_search" value="0-50" onclick="searchfun(this.name,this.value);" >
                                       <input class="radioclass" type="button" name="price_search" value="50-100" onclick="searchfun(this.name,this.value);" >
                                      <input class="radioclass" type="button" name="price_search" value="100-300" onclick="searchfun(this.name,this.value);" >
                                      <input class="radioclass" type="button" name="price_search" value="300-1000" onclick="searchfun(this.name,this.value);" >
                                  </div>
                              </li>
                              <li><?php if($_GET[texturelist_search] ): echo $_GET['texturelist_search']; ?><i></i><?php else: ?>材质<i></i><?php endif; ?>
                                  <div class="Product_parameter_topNei">
                                      <input class="radioclass" type="button" name="texturelist_search" value="全部" onclick="searchfun(this.name,this.value);" >
                                       <input class="radioclass" type="button" name="texturelist_search" value="玻璃" onclick="searchfun(this.name,this.value);" >
                                     <input class="radioclass" type="button" name="texturelist_search" value="塑胶" onclick="searchfun(this.name,this.value);" >
                                      <input class="radioclass" type="button" name="texturelist_search" value="PPSU" onclick="searchfun(this.name,this.value);" >
                                  </div>
                              </li>
                              <li><?php if($_GET[capacity_search] ): echo $_GET['capacity_search']; ?><i></i><?php else: ?>容量<i></i><?php endif; ?>
                                  <div class="Product_parameter_topNei">
                                      <input class="radioclass" type="button" name="capacity_search" value="全部" onclick="searchfun(this.name,this.value);" >
                                      <input class="radioclass" type="button" name="capacity_search" value="50ml-100ml" onclick="searchfun(this.name,this.value);" >
                                      <input class="radioclass" type="button" name="capacity_search" value="100ml-200ml" onclick="searchfun(this.name,this.value);" >
                                      <input class="radioclass" type="button" name="capacity_search" value="200ml以上" onclick="searchfun(this.name,this.value);" >
                                  </div>
                              </li>

                          </ul> 
                    </div>
	
                    <div class="Product_parameter_photo">
						<?php if($pro_list ): if(is_array($pro_list)): foreach($pro_list as $k=>$v): ?><div class="Product_photo_single">
				
							<div class="Product_photo_nei">
							<?php if($v[xqstatus] == 1): ?><a href="<?php echo U('Product/product_details',array('catid'=>$v['catid'],'pid'=>$v['id'],'ppid'=>$v['ppid']));?>">
							<?php else: ?>
									<a href='javascript:alert("此产品已下架")'><?php endif; ?>
					
							<div class="Product_photowai">

							<?php if($v[fmpicurl] ): ?><img class="Product_photo_img" src="<?php echo ($v["picurlpc"]); ?>">
							<?php else: ?>
								<img class="Product_photo_img" src="<?php echo ($v["fmpicurl"]); ?>"><?php endif; ?>
							
				
							</div><h3><?php echo ($v["catname"]); ?><div class="Product_sekuai">
						<?php $color_count=count($v['para_list']);?>
							<?php if($color_count > 1): if(is_array($v[para_list])): foreach($v[para_list] as $key=>$val): ?><span style="background-color:<?php echo ($val["colorname"]); ?>"></span><?php endforeach; endif; endif; ?>

					</div></h3><h2><?php echo ($v["title"]); ?><span><?php echo ($v["capacity"]); ?></span></h2></a><div class="Product_price"><h4><i>￥</i><?php echo ($v["price"]); ?>
					<?php  session_start(); if(!$_SESSION['bobo_pc_user_id']){?>
							<a href="javascript:hhhhh();"><img class="Product_follow Product_followBtn1" src="__PUBLIC__/img/botombg.png"></a>
					<?php }else{?>
								<?php if($v[colid] ): ?><a href="javascript:collect_del(<?php echo ($v[colid]); ?>);"><img class="Product_follow Product_followBtn1" src="__PUBLIC__/img/botombg1.png"></a>
								<?php else: ?>
									<a href="javascript:collect_tj(<?php echo ($v["ppid"]); ?>);"><img class="Product_follow Product_followBtn1" src="__PUBLIC__/img/botombg.png"></a><?php endif; ?>
					<?php }?>
					</h4></div></div></div><?php endforeach; endif; ?>
						<?php else: ?>
						<div class="cpkBg"></div><?php endif; ?>
                    </div>
				
                </div>
				            <div style="clear:both;"></div>
<!-- 					          <div class="product_more" style="text-align:center">点击加载更多产品</div> -->
                    <a class="Product_document" href="javascript:">您的足迹</a>
                    <div class="Product_document_bottom">
                           <?php if(is_array($pro_list_fw)): foreach($pro_list_fw as $key=>$v): ?><div class="Product_document_nei">
                                   <?php if($v["status"] == 1): ?><a href="<?php echo U('Product/product_details',array('catid'=>$v[catid],'pid'=>$v[pid],'ppid'=>$v[id]));?>"><?php else: ?><a href="javascript:alert('此产品已经下架');"><?php endif; ?>
                                        <div class="Product_document_cnei">
                                            <img class="Product_photo_imeagh" src="<?php echo ($v["picurlpc"]); ?>">
                                            <h3 style="position: relative;"> <?php echo ($v["catname"]); ?>
                                                <div class="Product_sekuai_s22" style="position: absolute; right: 8%;">
													<?php $color_count_one=count($v['colorlist']);?>
													<?php if($color_count_one > 1): if(is_array($v[colorlist])): foreach($v[colorlist] as $key=>$vo): ?><span style="background-color:<?php echo ($vo["colorname"]); ?>"></span><?php endforeach; endif; endif; ?>
                                                </div>
                                            </h3>
                                            <h2><?php echo ($v["title"]); ?><span><?php echo ($v["capacity"]); ?></span></h2>
                                            </a>
                                            <div class="Product_price01">
                                                <h4>
                                                   <i>￥</i><?php echo ($v["price"]); ?>
											<?php  session_start(); if(!$_SESSION['bobo_pc_user_id']){?>
													<a href="javascript:hhhhh();"><img class="Product_follow Product_followBtn1" src="__PUBLIC__/img/botombg.png"></a>
											<?php }else{?>
														<?php if($v[colid] ): ?><a href="javascript:collect_del(<?php echo ($v[colid]); ?>);"><img class="Product_follow Product_followBtn1" src="__PUBLIC__/img/botombg1.png"></a>
														<?php else: ?>
															<a href="javascript:collect_tj(<?php echo ($v["id"]); ?>);"><img class="Product_follow Product_followBtn1" src="__PUBLIC__/img/botombg.png"></a><?php endif; ?>

											
											<?php }?>
                                                </h4>
                                            </div>
                                       </div>
                                    
                               </div><?php endforeach; endif; ?>	
                    </div>
            </div>
        </div>
        <!-- footer -->
        <div class="zhankai"></div>

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
					window.location.reload();
				},2000);
			}else if(arr.status=="n" || arr.status=='nn'){
                $('.zcform').siblings('#Validform_msg').find('.Validform_title').addClass('backb');
				setTimeout(function(){
					window.location.reload();
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
					window.location.reload();
				},2000);
			}else if(arr.status=="n" || arr.status=='nn'){
                 $('.zcform').siblings('#Validform_msg').find('.Validform_title').addClass('backb');
				setTimeout(function(){
					window.location.reload();
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
function searchfun(name,value){
	var hrefstr,pos,url='';
	hrefstr = window.location.href;
	pos = hrefstr.indexOf("?"); 
	var value=encodeURI(value);
	var bool=1;
	if(pos=="-1"){
		url=hrefstr+"?"+name+'='+value;
		window.location.href=url;
	}else{
			var returnurl="";
			var setparam="";
	     	url = hrefstr.substr(hrefstr.indexOf('?') + 1);

		    arr = url.split('&');
			for (i in arr) {
					if(arr[i].split('=')[0]==name){
						if(name=='price_search' || name=='texturelist_search' || name=='capacity_search' || name=='color_search'){
							arr[i]=name+"="+value;//url名与传进的名相同，存在修改
						}
						bool=0;break;
					}
			}
			if(bool==1){
				arr.push(name+"="+value);//url名与传进的名不同，存在不变
			}	
			for(j in arr){
				returnurl+=arr[j]+"&";	
			}
		      returnurl = returnurl.substr(0, returnurl.length - 1); 
			 url=hrefstr.substr(0, hrefstr.indexOf('?')) + "?" +returnurl;
			window.location.href=url;
	}
}








 
  
		/*颜色焦点*/
    $('.Product_sekuai span').click(function() {
        $(this).addClass('Product_border').siblings().removeClass('Product_border')

    });
	$('.Product_Color span').click(function() {
        $(this).addClass('Product_border').siblings().removeClass('Product_border')

    });
      /*参数*/
		 $('.Product_parameter_top').find('li').hover(function(){
		      $(this).find('.Product_parameter_topNei').stop(false,true).stop().slideDown(400);
		 },function(){
			  $(this).find('.Product_parameter_topNei').slideUp(400);
		 });
		 
		 $('.Product_parameter_top').find('li').hover(function(){
		      $(this).find('i').addClass('Product_parameter_topThis');
		 },function(){
			  $(this).find('i').removeClass('Product_parameter_topThis');
	     });
		 
		 $('.radioclass').hover(function(){
		      $(this).addClass('radioclassThis'); 
		 },function(){
			  $(this).removeClass('radioclassThis')
		 });
		 
    /*内容图片*/
    $('.Product_photo_nei').live('mouseover',function() {
        $(this).addClass('Product_shadow')
    })
	  $('.Product_photo_nei').live('mouseout',function() {
        $(this).removeClass('Product_shadow')
    })

    /*足迹*/
    $('.Product_sekuai_s2 span').click(function() {
        $(this).addClass('Product_border').siblings().removeClass('Product_border')

    })
	
		/*菜单*/
	$('.nav-bar li:first').hover(function(){
		$(this).removeClass('near')
	},function(){
		$(this).addClass('near')
		})
		
	/*点击切换*/
	$('.Product_document_nei').find('.Product_document_cnei:first').show()
	$('.Product_sekuai_s22 span').click(function(){
       var WholeDian=$(this).index()
		 $(this).parents('.Product_document_nei').find('.Product_document_cnei').hide()
		 $(this).parents('.Product_document_nei').find('.Product_document_cnei').eq(WholeDian).show() 
		 $(this).addClass('Product_border').siblings().removeClass('Product_border')
		})


</script>
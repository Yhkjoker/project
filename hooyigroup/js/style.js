// JavaScript Document
window.onload = function(){
	  /*去除点击出现的边框*/
	  $("a,input,button").focus(function(){this.blur()});	

	  /*首页邑通动态文字数量限制*/
	  $(document).ready(function(){
	  //限制字符个数
		  $(".home-centnet-01 ul li p").each(function(){
			  var maxwidth=74;
			  if($(this).text().length>maxwidth){
				  $(this).text($(this).text().substring(0,maxwidth));
				  $(this).html($(this).html()+'…');
			  }
		  });
	  });


	  function widthsize(){
		  _window_Width = $(window).width(); /*页面宽度*/
		  
		  
		  $('#HomeBanner').css({'width':_window_Width+'px'});
		  
		  /*banner文字定位*/
		  var _HomeBannerTxtTop = $('.HomeBannerTxt').height();
		  var _HomeBannerTxtLeft = $('.HomeBannerTxt').width();
		  $('.HomeBannerTxt').css({'margin-left':-_HomeBannerTxtLeft/2+'px','margin-top':-_HomeBannerTxtTop/2+'px'})	
		  
		  /*设置首页banner 图的宽度*/
		  $('#HomeBanner li').css({'width':parseInt(_window_Width*0.7656)+'px'})
		  
		  /*合作设计*/
		  $('.home-codesign-txt').css({'height':$('.home-codesign-photo img').height()+'px'});
		  /*首页banner宽度定义*/
		  $('#HomeBanner').css({'width':_window_Width+'px'});

		  /*邑通案例*/
          var _Case_Centnet_LeftUl = $('.Case-Centnet-LeftUl').width();
          var _number_Case = $('.Case-Centnet-LeftUl').find('li').length+60;
          $('.Case-Centnet-LeftUl').css({'width':_Case_Centnet_LeftUl*_number_Case+'px'});
          $('.Case-Centnet-LeftUl ul li').css({'width':$('.Case-Centnet-Left').width()+'px'});
          $('.Case-list-Left-DivNei p').css({'width':$('.Case-list-Left-DivNei img').width()+'px'});
          var neileft = $('.Case-Centnet-Left').height();
          var neiright = $('.Case-Centnet-Right').height();
          if(neileft > neiright){
              $('.Case-Centnet-Right').css({'height':neileft+60+'px'});
          }else if(neiright > neileft){
              $('.Case-Centnet-Left').css({'height':neiright+'px'});
          };
		  
		  
	  };
	  /*浏览器动态*/
	  widthsize();
	  $(window).resize(function(){
		  widthsize();
	  });	

	
	
	  /*首页banner轮播*/
	  var Index = 0;
	  var Time   = null;
	  var Aout   = true;
	  var HomeBanner_Li = $('#HomeBanner ul li');
	  var Banner = function (){
		  bannerStop();     //清除定时器
		  if(Index < 0){  
			  Index = 3;	
		  }else if(Index >=4){
			  Index = 0;
		  }
		  var BnanerLi = HomeBanner_Li.length;
		  for(var i=0; i<BnanerLi; i++){
			  if(i<=Index){
				  var left = i*parseInt(_window_Width*0.0783);/*每个banner图的偏移位置*/
			  }else{
				  var left = parseInt(_window_Width*0.7656) + i*parseInt(_window_Width*0.0783) - parseInt(_window_Width*0.0783);
			  }
			  HomeBanner_Li.eq(i).stop(false,true).stop().animate({'left':left+'px'}, 500);
		  }
		  if (Aout) Time = setTimeout( function(){ Index++; Banner(); }, 5000 );
	  };
	  var bannerStop = function (){ clearTimeout(Time); }
	  /*点击banner显示当前*/
	  HomeBanner_Li.click(function(){
		  Index = $(this).index();
		  Banner();
	  });
	  Banner();

	 

	  /*banner图定位*/
	  var _HomeLiHei = $('#HomeBanner ul li img').height();
	  $('#HomeBanner').css({'height':_HomeLiHei+'px'});
	  
	  /*var image=new Image();
	  image.src='../images/homecenterBg03.png';
	  image.onload=function(){
		  var divelement = document.getElementsByClassName('home-partner')
		  divelement.style.height=(image.height*divelement.offsetWidth)/image.width +"px";
	  };*/


	  /*首页公司简介*/
	 
	  $('.About-UsIconUl-Icon').hover(function(){
		  $(this).find('a .homecentericonOne').hide();
		  $(this).find('a .homecentericonTwo').show();
		  var g = $(this).index()
		  $(this).find('a').find('span').addClass('About_UsIcon_ThisLi'+(g+1));
	  },function(){
		  $(this).find('a .homecentericonTwo').hide();
		  $(this).find('a .homecentericonOne').show();
		  $(this).find('a').find('span').removeClass();
	  });
	 

	   /*首页弹出窗*/
    var _window_height = $(window).height();
	$('.tcPwai').css({'height':_window_height*.6+'px'});
	
	$('.About-UsIconUl-Icon').click(function(){
		$('.TcBg').show();
	    $(this).find('.TcDiv').show(500);	
		
	});
	
	
	/*点击背景关闭弹窗*/
	$('.TcBg').click(function(){
	    $('.TcBg,.TcDiv').hide();	
		
	});
	
	$('.tcgb').on('click',function(e){
		e.stopPropagation();
	    $('.TcBg,.TcDiv').hide();
	});

	
	  /*首页  邑通案列*/
	  $('.home-centnet-photo-wrapper').eq(0).show();
	  $('.home-centnet-Btn').find('button').eq(0).addClass('home_centnet_Btn_This');
	  $('.home-centnet-photo-wrapper ul li p').css({'width':$('.home-centnet-photo-wrapper ul li').eq(0).width()+'px'});
	  $('.home-centnet-photo-wrapper ul li').hover(function(){
		  $(this).find('p').stop(false,true).stop().animate({'bottom':'0px'},300).addClass('home-centnet-photo_PThis').siblings('img').addClass('home-centnet-photoThis');
	  },function(){
		  $(this).find('p').stop(false,true).stop().animate({'bottom':'-46px'},300).removeClass('home-centnet-photo_PThis').siblings('img').removeClass('home-centnet-photoThis');
	  });	
	
	  /*邑通案列选项卡*/
	  $('.home-centnet-Btn').find('button').hover(function(){
		  var home_case_Btn = $(this).index();
		  $('.home-centnet-Btn').find('button').removeClass('home_centnet_Btn_This');
		  $('.home-centnet-Btn').find('button').eq(home_case_Btn).addClass('home_centnet_Btn_This');
		  $('.home-centnet-photo-wrapper').hide();
		  $('.home-centnet-photo-wrapper').eq(home_case_Btn).show();
	  });	
	
	
	  /*首页合作伙伴轮播*/
	  var home_partner_index = 0;
	  var home_partner_null = null;
	  var home_partner_true = true;
	  var home_partner_ul = $('.home-partner ul');
	  var home_partner_span = $('.home-partner-cententIcon-block span');
	  
	  $('.home-partner ul').eq(0).show();
	  var home_partner = function(){
		  if(home_partner_index>=home_partner_ul.length){
			 home_partner_index = 0;
		  }
		  home_partner_ul.hide();
		  home_partner_span.removeClass('This');
		  home_partner_move();
	  };
	  var home_partner_move = function(){
		  home_partner_Stop();
		  home_partner_ul.eq(home_partner_index).show();	
		  home_partner_span.eq(home_partner_index).addClass('This');
		  if(home_partner_true)home_partner_null = setTimeout(function(){home_partner_index++;home_partner();},3000);
	  };
	  var home_partner_Stop = function(){clearTimeout(home_partner_null)};/*停止计时器*/
	  /*开启*/
	  home_partner();
	  /*鼠标接触事件*/
	  home_partner_span.hover(function(){
			  home_partner_index = home_partner_span.index(this);
			  home_partner_true = true;
			  home_partner();
	  });
	  
	  
	  /*内页*/
	/*邑通案例列表*/
	$('.Case-list-Left-DivNei').hover(function(){
		$(this).find('p').stop(false,true).stop().animate({'margin-bottom':'0px'},300).addClass('home-centnet-photo_PThis').siblings('img').addClass('home-centnet-photoThis');
	},function(){
		$(this).find('p').stop(false,true).stop().animate({'margin-bottom':'-50px'},300).removeClass('home-centnet-photo_PThis').siblings('img').removeClass('home-centnet-photoThis');;
	});
		
		  
		  /*邑通案例*/
	var _Case_Centnet_LeftUl = $('.Case-Centnet-LeftUl').width();
	var _number_Case = $('.Case-Centnet-LeftUl').find('li').length+60;
	$('.Case-Centnet-LeftUl').css({'width':_Case_Centnet_LeftUl*_number_Case+'px'});
	$('.Case-Centnet-LeftUl ul li').css({'width':$('.Case-Centnet-Left').width()+'px'});
	
	
	//停留事件
	$('.Case-Centnet-Left').hover(function(){
		$('.Case-Btn-Left,.Case-Btn-Right').show();
	},function(){
		$('.Case-Btn-Left,.Case-Btn-Right').hide();
	});
	//轮播
	var Case_Box = $('.Case-Centnet-LeftUl ul');
	var Case_Html = $('.Case-Centnet-LeftUl ul').html();
	var Case_Banner = Case_Box.find('li');
	var Case_Number = Case_Banner.length;
	var Case_Index = 0;
	var Case_Null = null;
	var Case_True = true;
	
	Case_Box.append(Case_Html);
	
	var Case_Sta = function(){
		if(Case_Index >= Case_Number+1){ 
			Case_Box.stop(false,true).stop().animate({'left':'0px'},500);
			Case_Index = 1; 
		}else if(Case_Index < 0){ 
			Case_Box.stop(false,true).stop().animate({'left':$('.Case-Centnet-Left').width() * (Case_Index-2)+'px'},500);
			Case_Index = Case_Number - 1;
		};
		Case_Move();
	};
	
	var Case_Move = function(){
		Case_Stop();
		var Case_Width = $('.Case-Centnet-Left').width() * Case_Index;
		Case_Box.stop(false,true).stop().animate({'left':'-'+Case_Width+'px'},500);
		if(Case_True)Case_Null = setTimeout(function(){Case_Index++;Case_Sta();},3000)
	
	};
	
	var Case_Stop = function(){clearTimeout(Case_Null)};
	
	Case_Sta();
	
	//点击
	$('.Case-Btn-Left').click(function(){
		Case_Index--;
		Case_Sta();
	});
	$('.Case-Btn-Right').click(function(){
		Case_Index++;
		Case_Sta();
	});



};

	
	
	
	
	

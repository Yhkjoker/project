





function widthsize(){
	var WinWidth = $(window).width();
/*导航下拉菜单 开始*/
    if(WinWidth>767){
    	$('.header .Nav-Wra .navbar-collapse .navbar-nav .dropdown').hover(function(){
            $(this).addClass('dropdown-menuThis').find('.dropdown-menu').show();
        },function(){
    	    $(this).removeClass('dropdown-menuThis').find('.dropdown-menu').hide();
        });



/*良工优势布局显示 开始*/
        $('.Home-ContentRig').css({'margin-left':0+'px'});
/*良工优势布局显示 结束*/



/*热装楼盘 开始*/
        $('.Content4-Href').hover(function(){
            $(this).find('.Content4-Img').stop(false,true).animate({
                'width':'110%',
                'margin':'-5% 0 0 -5%'
            },400);
            $(this).find('.Content4-Txt').css({'opacity':'.9'})
        },function(){
            $(this).find('.Content4-Img').stop(false,true).animate({
                'width':'100%',
                'margin':'0'
            },400);
            $(this).find('.Content4-Txt').css({'opacity':'1'})
        });

/*热装楼盘 结束*/





/*返回顶部 开始*/
    function myEvent(obj,ev,fn){
    if(obj.attachEvent){
        obj.attachEvent('on'+ev,fn);
    }else{
        obj.addEventListener(ev,fn,false);
    }
}
myEvent(window,'load',function(){
    var oRTT=document.getElementById('rtt');
    var sho=document.getElementById('sho');
    var pH=document.documentElement.clientHeight;
    var timer=null;
    var scrollTop;
    window.onscroll=function(){
        scrollTop=document.documentElement.scrollTop||document.body.scrollTop;
        if(scrollTop>=pH-500){
            sho.style.display='block';
            // setTimeout(function(){
            //     sho.style.display='none';
            // },5000);
        }else{
            sho.style.display='none';
        }
        return scrollTop;
    };

    oRTT.onclick=function(){
        clearInterval(timer);
        timer=setInterval(function(){
            var now=scrollTop;
            var speed=(0-now)/10;
            speed=speed>0?Math.ceil(speed):Math.floor(speed);
            if(scrollTop==0){
                clearInterval(timer);
            }
            document.documentElement.scrollTop=scrollTop+speed;
            document.body.scrollTop=scrollTop+speed;
        }, 30);
    }
});
/*返回顶部 结束*/



}else if(WinWidth<=767){
		$('.header .Nav-Wra .navbar-nav li').click(function() {
            $('.header .Nav-Wra .navbar-nav li .dropdown-menu').slideUp();
            $(this).children('.dropdown-menu').stop(false,true).stop().slideToggle('400');
        });
    

       /*返回顶部 开始*/
       
      var sho1=document.getElementById('sho');
      sho1.style.display='none';

       /*返回顶部 结束*/


/*良工优势布局显示 开始*/
        $('.Home-ContentRig').css({'margin-left':$('.Home-ContentRig').width()/2+'px'});
/*良工优势布局显示 结束*/




/*设计团队 开始*/
           
        var fu_w = $('.Home-Content5').width();
        var _Content5_Aa_Ab_H = (260/768)*fu_w;
        $('.Home-Content5-Ab, .Home-Content5-Aa').height(_Content5_Aa_Ab_H);
        var _Content5_B1a_B1b_H = (290/768)*fu_w;
        $('.Home-Content5-B1a,.Home-Content5-B1b').height(_Content5_B1a_B1b_H);
        var _Content5_B2a_B2b_B2c_H = (196/768)*fu_w;
        $('.Home-Content5-B2a, .Home-Content5-B2b, .Home-Content5-B2c').height(_Content5_B2a_B2b_B2c_H);

/*设计团队 结束*/



/*移动端 经典案例选项卡 开始*/
        $('.Classic-Case-StyleRight').width($('.Classic-Case-Style').width()-20);
        $('.Design-Team-StyleDiv .Classic-Case-StyleRight').width($('.Classic-Case-Style').width());
        var _StyleHeiL = $('.Classic-Case-StyleLeft').height();
       
        var arr1 = [];
        for(var i=0; i<$('.Classic-Case-StyleDiv').length; i++){
            var sdf = $('.Classic-Case-StyleDiv').eq(i).find('.Classic-Case-StyleRight').height();
            arr1[i] = sdf;
        };
        var _StyleHeiRhei = Math.max.apply(null, arr1);
        var _StyleHeiR = _StyleHeiRhei;
        

        // var _StyleHei = _StyleHeiR + _StyleHeiL + 64;
        // $('.Classic-Case-Style').height(_StyleHei);
        $('.Classic-Case-StyleDiv').eq(0).css({'border-left':'1px solid #540000'});//经典案例 选项卡按钮点击第一个设置边框

        
/*移动端 经典案例选项卡 结束*/



} 

 /*内页 
 经典案例
 热装楼盘
   开始 
 */  
if(WinWidth>1199){


    //经典案例 恢复宽度
    $('.Classic-Case-StyleRight').css({"width":"1076px"});
    $('.Classic-Case-StyleLeft').css({"width":"120px"});


}else if(WinWidth<=1199 && WinWidth>767){

 $('.Classic-Case-StyleDiv').eq(0).css({'border-left':'0'});//经典案例 选项卡按钮点击第一个设置边框
 $('.Classic-Case-StyleRight').width($('.Classic-Case-StyleDiv').width()-20).show();//经典案例 恢复宽度
 $('.Classic-Case-StyleLeft,.Classic-Case-StyleRight').css({"width":"100%"});
}else if(WinWidth<767){
 $('.Classic-Case-StyleRight').hide();





}




  
 /*内页 
 经典案例
 热装楼盘
   结束 
 */  



/*导航下拉菜单 结束*/



//首页Banner移动显示块定位
    $('.flicking_con').css({'margin-left':-$('.flicking_con').width()/2+'px'});



/*设置Banner的宽度高度 开始*/
    var B_Height = 580;
    var B_Width = 1920;
    var Img_Wid = B_Height/B_Width*WinWidth;
    $('.main_image ul').width($('.main_image ul li').length*$('.main_image ul li').width());//定义banner图的父元素的宽度
    $('.main_image,main_image ul,.main_image li,.main_image li .BannerImg').height(Img_Wid);
    $('.main_image li .BannerImg').width(WinWidth);
/*设置Banner的宽度高度 结束*/



/*热装楼盘 开始*/
    var Content4_Img = 369/290*$('.Content4-ImgWai').width();
    $('.Content4-ImgWai').height(Content4_Img);    
/*热装楼盘 结束*/




/*经典案例 开始*/
    $('.Home-Content3-PhotoCon').css({
        'margin-top':-$('.Home-Content3-PhotoCon').height()/2+'px',
        'margin-left':-$('.Home-Content3-PhotoCon').width()/2+'px'
    })
/*经典案例 结束*/




/*良工服务流程指南 开始*/
    $('.Home-guide-DivA-2Nei dl').eq(6).css({'margin-right':'0px'});
/*良工服务流程指南 结束*/



/*设计团队 开始*/
    $('.Content5-Nei').css({'margin-top':-$('.Content5-Nei').height()/2+'px'});
/*设计团队 结束*/




/*装修计算器 开始*/
    
          $('.Home-Content1B ul li label').click(function() {
              $(this).parents("li").find("i").hide();
              $(this).find('i').show();
          });
           
/*装修计算器 结束*/



/*活动资讯列表定义布局的高度 开始*/

$('.Activity-Information-Content-Data').height($('.Activity-Information-Content-Txt').height());
$('.Activity-Information-Content-TxtHr').width($('.Activity-Information-Content-Txt').width()+20);

/*活动资讯列表定义布局的高度 结束*/






/*经典案例 热装楼盘 开始*/
$('.Hot-Property-Details-C span').click(function(){
    $(this).siblings('ul').slideToggle();
    $(this).toggleClass('this');
});

if(WinWidth<768){
    $('.Hot-Property-Details-C ul li a').click(function(){
        $('.Hot-Property-Details-C ul').hide();
        $('.Hot-Property-Details-C span').removeClass('this');
    });
};








}//宽度监听结尾标签


/*浏览器动态*/
  widthsize();
  $(window).resize(function(){
	  widthsize();
  });





$('.Classic-Case-Style .Classic-Case-StyleDiv .Classic-Case-StyleLeft').click(function(){
    var WindowWidth = $(window).width();
    if(WindowWidth<768){
        var li = $(this).parent().index();
        var list = $('.Classic-Case-Style .Classic-Case-StyleDiv').length;
        for(var i=0; i<list; i++){
            if(i==li){
                $('.Classic-Case-Style .Classic-Case-StyleDiv .Classic-Case-StyleLeft').eq(i).siblings('.Classic-Case-StyleRight').slideToggle();
                $('.Classic-Case-StyleLeft').eq(i).toggleClass('Classic-Case-StyleLeftThis');
            }else{
                $('.Classic-Case-Style .Classic-Case-StyleDiv .Classic-Case-StyleLeft').eq(i).siblings('.Classic-Case-StyleRight').hide();
                $('.Classic-Case-StyleLeft').eq(i).removeClass('Classic-Case-StyleLeftThis');
            };
        };  
    }; 
        
});

$('.Classic-Case-StyleRight a').click(function(){
    var WindowWidth = $(window).width();
    if(WindowWidth<768){
        $('.Classic-Case-StyleRight').slideUp();
        $('.Classic-Case-StyleLeft').removeClass('Classic-Case-StyleLeftThis');
    };
});

/*经典案例 热装楼盘 结束*/





/*切换分公司 开始*/

$('.header-Company').click(function(){
    $('.header-Company-Toggle').stop(false,true).stop().slideToggle();
});
/*切换分公司 结束*/




/*移动端导航显示 开始*/
var navToggle = 1; //nav-toggle是否点击控制器
$(".header .container-fluid .navbar-toggle").click(function(event) {
    if (navToggle) {
        $(this).addClass("active-toggle");
        navToggle = 0
    } else {
        $(this).removeClass("active-toggle");
        navToggle = 1
    };
	$('.header .Nav-Wra .navbar-nav li .dropdown-menu').slideUp();
});
/*移动端导航显示 结束*/




/*首页Banner 滑动轮播*/
    
    $(".main_visual").hover(function(){
        $("#btn_prev,#btn_next").fadeIn();
    },function(){
        $("#btn_prev,#btn_next").fadeOut();
    });
    
    $dragBln = false;
    
    $(".main_image").touchSlider({
        flexible : true,
        speed : 200,
        btn_prev : $("#btn_prev"),
        btn_next : $("#btn_next"),
        btn_prev1 : $("#btn_prev1"),
        btn_next1 : $("#btn_next1"),
        paging : $(".flicking_con a"),
        counter : function (e){
            $(".flicking_con a").removeClass("on").eq(e.current-1).addClass("on");
        }
    });
    
    $(".main_image").bind("mousedown", function() {
        $dragBln = false;
    });
    
    $(".main_image").bind("dragstart", function() {
        $dragBln = true;
    });
    
    $(".main_image a").click(function(){
        if($dragBln) {
            return false;
        }
    });
    
    timer = setInterval(function(){
        $("#btn_next").click();
    }, 5000);
    
    $(".main_visual").hover(function(){
        clearInterval(timer);
    },function(){
        timer = setInterval(function(){
            $("#btn_next").click();
        },5000);
    });
    
    $(".main_image").bind("touchstart",function(){
        clearInterval(timer);
    }).bind("touchend", function(){
        timer = setInterval(function(){
            $("#btn_next").click();
        }, 5000);
    });
/*首页Banner 滑动轮播 结束*/


/*标题边框*/
$('.Breadcrumb .Title:last').css({"border":"0"});


/*底部 导航 定义相同高度  开始*/
var arr_footer = [];
for(var i=0; i<$('.footer-MapContent div').length; i++){
    var sdf_footer = $('.footer-MapContent div').eq(i).height();
    arr_footer[i] = sdf_footer;
};
var _StyleFooter = Math.max.apply(null, arr_footer);

$('.footer-MapContent div').height(_StyleFooter);

/*底部 导航 定义相同高度  结束*/













// JavaScript Document
$(function(){

/*主导航*/
var _tru = null;
var _Ltop = $(document).scrollTop();

$('#Nav').click(function(){
    $('.Mainbav').stop(false,true).stop().slideToggle('slow').siblings('.SearchForm').css({'display':'none'});
    $(this).find('i').toggleClass('NavI');
	event.stopPropagation();//阻止冒泡
	_tru = true;
});

$(window).scroll(function(){
	$('.Mainbav,.SearchForm,.Product-Subnav').css({'display':'none'});
	$('#Nav').find('i').removeClass('NavI');
	_tru = false;
});

/*点击页面导航关闭*/
$("body").click(function(){
     $(".Mainbav,.SearchForm").hide();
});


/*头部搜索*/
$('.Search-Sta').click(function(){
    $('.SearchForm').stop(false,true).stop().slideToggle(300).siblings('.Mainbav').css({'display':'none'});	
	event.stopPropagation();//阻止冒泡
	_tru = true;
});

/*页脚*/

$('.footerClick').click(function(){
    $('.copyright').slideDown(500);
	var a = $(window).scrollTop() + 150;
        $('html,body').animate({
            scrollTop: a
        }, 500);
        $(this).hide()
});
$('.copyright').click(function(){
    $(this).slideUp(500);
	$('.footerClick').show();	
});

/*登陆 注册*/

$('.User').click(function(){
	$('.DzBg,.login').show();
});
$('.DzBg').click(function(){
	$('.DzBg,.Dz').hide();
});

$('.Zcqh').click(function(){
	$(this).parent().hide().siblings('.regsiter').show();
	
});
$('.Dlqh').click(function(){
	$(this).parent().hide().siblings('.login').show();
	
});

/*返回顶部*/
$(".ReturnTop").hide();

$(window).scroll(function(){
        var sc=$(window).scrollTop();
        var rwidth=$(window).width()+$(document).scrollLeft();
        var rheight=$(window).height()+$(document).scrollTop();
        if(sc>500){
            $(".ReturnTop").css("display","block");
        }else{
            $(".ReturnTop").css("display","none");
        }
    });
$(".ReturnTop-Top").click(function () {
        $('body,html').animate({ scrollTop: 0 }, 200);
        return false;
 });

/*底部显示的产品*/
/*收藏点击*/
$('.AppearBottomBottom').find('i').click(function(){
    $(this).toggleClass('AppearBottomBottomThis');	
});
/*色块点击显示边框*/
$('.ColorBlock').find('span').click(function(){
    $(this).addClass('ColorBlockThis').siblings().removeClass('ColorBlockThis');	
});

/*我的收藏*/
/*点击色块*/
$('.ColorDiv').find('span').click(function(){
	$(this).addClass('ColorDivThis').siblings().removeClass('ColorDivThis');
});
/*点击收藏*/
$('.My-Collection-productBottom').find('em').click(function(){
	$(this).toggleClass('My-Collection-productBottomThis');
});


/*试用弹窗*/

$('.Address-PopupBtn,.Use-DetailedBtn-My').click(function(){
	$('.Bg-Popup-Address,.Content-Popup-Address').show();
});
$('.Bg-Popup-Address').click(function(){
    $(this).hide().next().hide();	
});

/*产品详细页收藏*/
$('.Use-Detailed-TopTxt').find('h2').find('i').click(function(){
    $(this).toggleClass('Use-Detailed-TopTxtThis');	
});

/*产品选项下拉菜单*/
$('.ProductNav').find('li').click(function(){
    $(this).find('.Product-Subnav').show().parent('li').siblings().find('.Product-Subnav').hide();
    _tru = false;
});













});




























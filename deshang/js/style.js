// top banner Swiper
$('.header-A-swiper .swiper-slide > img').height($(window).height());//首页头部高度
$(window).resize(function() {
    $('.header-A-swiper .swiper-slide > img').height($(window).height());//首页头部高度
});

//pc导航显示
function NavShow(){
    $('.Nav-Wra').toggleClass('active');
    $('.Nav-content-Nei').removeClass('active');
    $('.Nav-Wra .Nav ul li a.Click-Nav').removeClass('active');
};

//二级导航菜单
$('.Nav-Wra .Nav ul li a.Click-Nav').click(function(){
    var indexNav = $(this).parents('.Nav-Wra .Nav > ul > li').index();
    $('.Nav-content-Nei').addClass('active'); 
    $('.Nav-content').hide();
    $('.Nav-content').eq(indexNav).show();
    $('.Nav-Wra .Nav ul li a').removeClass('active');
    $(this).addClass('active');
    //导航二级菜单显示的文本标题
    $('.Nav-Wra .Txt span').text($('.Nav-Wra .Nav > ul > li a.active').text());
});

/*底部的锚点滑动*/
$('.Content_4_click').click(function () {
    $('.Nav-Wra').addClass('active');
    $("html, body").animate({scrollTop: $($(this).attr("href")).offset().top + "px"}, 800);
    return false;//不要这句会有点卡顿
});





//头部
function widthsize(){
    
    var windowWidth = $(window).width();
    

};


    




/*浏览器动态*/
widthsize();
$(window).resize(function(){
  widthsize();
});


//截取字符
var hide_txt1 = 75;
$(".News-Div-Wra .row > a p").each(function() {
    if ($(this).text().length > hide_txt1) {
        $(this).html($(this).text().replace(/\s+/g, "").substr(0, hide_txt1) + "...")
    }
 });






/*移动端导航显示 开始*/
var navToggle = 1; //nav-toggle是否点击控制器
$(".header .container-fluid .navbar-toggle").click(function(event) {
    if (navToggle) {
        $(this).addClass("active-toggle");
        $('.header .container-fluid .navbar-collapse').stop(false,true).stop().stop(false,true).stop().animate({'left':'0px'},500);
        navToggle = 0
    } else {
        $(this).removeClass("active-toggle");
        $('.header .container-fluid .navbar-collapse').animate({'left':'-100%'},500);
        navToggle = 1
    };
	$('.header .Nav-Wra .navbar-nav li .dropdown-menu').animate({'left':'-100%'},500);
});
/*移动端导航显示 结束*/



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
            $('#sho').show();
        }else{
            $('#sho').hide();
        }
        return scrollTop;
    };
    $('#rtt').click(function(){
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
    });
});
/*返回顶部 结束*/

//页面动画
function animation(obj, animate) {//两个参数 第一个是时间 第二个是动画方式
    var sh = $(document).scrollTop(); //滚动条高度
    var wh = $(window).height(); //浏览器下窗口可视区域高度
    $(obj).each(function(index, el) {
        var tt = $(this).offset().top;  //偏移头部的距离
        var delay = "delay" + parseInt(index + 1);
        if (tt < sh + wh) {
            $(this).addClass(animate + " " + delay);
        }
    });

    $(window).scroll(function() {
        sh = $(document).scrollTop(); //滚动条高度
        wh = $(window).height(); //浏览器时下窗口可视区域高度
        $(obj).each(function() {
            var tt = $(this).offset().top;
            if (tt < sh + wh) {
                $(this).addClass('delay1 ' + animate);
            }
        });
    })
}




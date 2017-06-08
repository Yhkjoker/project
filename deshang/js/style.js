// top banner Swiper
$('.header-A-swiper .swiper-slide > img').height($(window).height());//首页头部高度
$(window).resize(function() {
    $('.header-A-swiper .swiper-slide > img').height($(window).height());//首页头部高度
});

//pc导航显示
function NavShow(){
    $('.Nav-Wra').toggleClass('active');
    $('.Nav-content-Nei').removeClass('active');
    // $('.Nav-Wra .Nav ul li a.Click-Nav').removeClass('active');
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
//首页第一屏按钮
$('.home-bottom-Arrow').click(function(){
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


$('.Product-Div-B .Click-Top .f-r a').eq(0).click(function(){
    $('.Product-Div-B .content-1 ul li:first-child .f-r').html('<span>NORMA</span><span>NOHARD A</span><span>HARDNORMA</span>');
    $('.Product-Div-B .content-1 ul li:last-child .f-r').html('<span>NORMA</span><span>NOHARD A</span>');
    $('.Product-Div-B .content-2 .se div').width('30%');
    $('.Product-Div .f-r.width > img').attr('src','images/p-11-1.jpg');
    $('.Product-Div-B .content-3 ul li .f-r p').html('DIN ISO 7619 / DIN 3213 ISO 868<br />DIN ISO 7619 / 3213 EN ISO 868');
    $('.Product-Div-B .content-3 ul li .f-r dl dt img').attr('src','images/p-2-1.jpg');
});
$('.Product-Div-B .Click-Top .f-r a').eq(1).click(function(){
    $('.Product-Div-B .content-1 ul li:first-child .f-r').html('<span>NORMA21232</span><span>32131 A</span><span>32132</span>');
    $('.Product-Div-B .content-1 ul li:last-child .f-r').html('<span>NORMA</span><span>NOHARD A</span><span>NOHARD A</span>');
    $('.Product-Div-B .content-2 .se div').width('50%');
    $('.Product-Div .f-r.width > img').attr('src','images/p-11-2.jpg');
    $('.Product-Div-B .content-3 ul li .f-r p').html('DIN ISO 7619 / DIN 212454 ISO 868<br />32132 ISO 7619 / 3213 EN ISO 868');
    $('.Product-Div-B .content-3 ul li .f-r dl dt img').attr('src','images/p-2-2.jpg');
});
$('.Product-Div-B .Click-Top .f-r a').click(function(){
    $(this).addClass('active').siblings().removeClass('active');
});





















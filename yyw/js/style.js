function widthsize(){
  var windowWidth = $(window).width();
  if(windowWidth < 992) {
      //右侧浮动导航 开始   
      $('.Right-Nav ul li').click(function(){
        $(this).addClass('active').siblings('li').removeClass('active');
        $('.Jd').show();
      });   
      $('.Jd').click(function(){
        $(this).hide();
        $('.Right-Nav ul li').removeClass('active');
      });
      //右侧浮动导航 结束
  };

};

/*浏览器动态检测*/
widthsize();
$(window).resize(function(){
  widthsize();
});

/*头部搜索框*/
$("*").click(function () {
 $('#header .Nav-Wra .Top2-Nav ul li').eq(0).removeClass('active'); 
});
$('#header .Nav-Wra .Top2-Nav ul li').eq(0).click(function(event){
       $(this).addClass('active'); 
       $(this).find("input[type='text']").focus();
       event.stopPropagation(); 
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
$("#header .container-fluid .navbar-toggle").click(function(event) {
    if (navToggle) {
        $(this).addClass("active-toggle");
        $('#header .container-fluid .navbar-collapse').stop(false,true).stop().stop(false,true).stop().animate({'left':'0px'},500);
        navToggle = 0
    } else {
        $(this).removeClass("active-toggle");
        navToggle = 1
    };
});
/*移动端导航显示 结束*/



/*返回顶部*/

$('#Return-Top').click(function(){
    $("html, body").animate({scrollTop: 0+ "px"}, 400);
    return false;
});

$(document).ready(function(){
    $(document).scroll(function(){
        //页面右侧浮动导航 开始
        $('.Right-Nav ul li').removeClass('active');
        $('.Jd').hide();
        var top = $(document).scrollTop();
        if(top < 500){
            $('.Right-Nav').removeClass('active');
        }
        else if(top > 500){
            $('.Right-Nav').addClass('active');
        };
        //页面右侧浮动导航 结束
    });
});

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




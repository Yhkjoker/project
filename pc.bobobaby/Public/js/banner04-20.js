
var banner = function(Box,Width,Height,Left,Top,Amw,Amr){
	//样式写入
	var cssHeight     = Height-Top*2;//高度
	var cssWidth      = 320;//#banner最小宽度
	var cssDtWidth    = 60;
	var cssDtHeight   = 60;
	var cssDtTop      = (cssHeight - cssDtHeight)/2;
	var cssDtFont     = 15;//左右箭头字体大小
	var cssDtLeft     = 10;//左右箭头距左右LEFT,RIGHT
	var cssDtLine     = cssDtHeight - 7;//字行高
	var cssDtcolor    = '#FFF';//字颜色
	var cssAwidth     = Amw - Amr;//下面点宽度
	var cssAbottom    = 20;//下面点距离底部距离
	var cssAheight    = 15;//下面点距离底部距离
	var cssAback      = '#000';//下面点默认颜色
	var cssAbackHover = '#828282 1px solid';//下面点当前颜色
	document.write("<style type=\"text/css\">");
	document.write(".product_contentLeftTop{width:100%; min-width:"+cssWidth+"px; height:"+cssHeight+"px; overflow:hidden; position:fixed;}");
	document.write(".product_contentLeftTop ul li{width:100%; height:"+cssHeight+"px; position:absolute; left:0; top:0; overflow:hidden; display:none;}");
	document.write(".product_contentLeftTop ul li img{display:block; position:absolute; left:0; top:0;}");
	document.write(".product_contentLeftTop dl{display:none;}");
	document.write(".product_contentLeftTop dt, ");
	document.write(".product_contentLeftTop dd{position:absolute; top:"+cssDtTop+"px; width:"+cssDtWidth+"px; height:"+cssDtHeight+"px; background:"+cssAback+"; opacity:.4; color:"+cssDtcolor+"; text-align:center; line-height:"+cssDtLine+"px; font-size:"+cssDtFont+"px; z-index:999; cursor:pointer;}");
	document.write(".product_contentLeftTop dt{left:"+cssDtLeft+"px;}");
	document.write(".product_contentLeftTop dd{right:"+cssDtLeft+"px;}");
	document.write(".product_contentLeftTop .banner_a{position:absolute; bottom:"+cssAbottom+"px; left:55%; width:100%; text-align:center;}");
	document.write(".product_contentLeftTop .banner_a span{position:absolute; bottom:"+cssAbottom+"px; left:-100%; width:100%; text-align:center;}");
	document.write(".product_contentLeftTop .banner_a a{width:"+cssAwidth+"px; height:"+cssAheight+"px; background:"+cssAback+"; float:left; margin-right:"+Amr+"px; display:block; box-sizing:border-box;}");
	document.write(".product_contentLeftTop .banner_a .this{border:"+cssAbackHover+";}");
	document.write("</style>");
	//样式结束
	
	var A     = $('.banner_a a');//点
	var Count = A.length;//个数
	var Index = 0;
	var Time  = null;//初始计时器
	var Aout  = true;//是否自动滑动
	var Margin= (Width - Left)/2;
	var aLeft = Amw*Count;
	A.parent().css({'width':aLeft+'px','margin-left':'-'+(aLeft-Amr)/2+'px'});
	//开始移动
	var bannerIndex = function (){
		if(Index < 0){
			Index = Count - 1;
		}else if(Index >= Count){
			Index = 0;
		}
		bannerMove();
	}
	//移动函数
	var bannerMove = function (){
		bannerStop();
		A.removeClass();
		A.eq(Index).addClass('this');
		Box.find('li').fadeOut("slow"); 
		Box.find('li').eq(Index).fadeIn("slow"); 
		Box.find('li').find('img').stop(false,true).stop().animate({'width':(Width-Left*2)+'px','height':(Height-(Top*2))+'px','top':'0','margin-left':'-'+((Width-Left*2)/2)+'px'}, 400);
		Box.find('li').eq(Index).find('img').stop(false,true).stop().animate({'width':Width+'px','height':Height+'px','top':'-'+Top+'px','margin-left':'-'+(Width/2)+'px'}, 400);
		if (Aout) Time = setTimeout( function(){ Index++; bannerIndex(); }, 5000 );
	};
	//停止
	var bannerStop = function (){clearTimeout(Time);}
	$(A).click(function(){
		Index = A.index(this);
		Aout  = true/*false*/; 
		bannerIndex();
	});
	Box.find('dt').click(function(){
		Index--;
		bannerIndex();
	});
	Box.find('dd').click(function(){
		Index++;
		bannerIndex();
	});
	Box.hover(function(){
		$(this).find('dl').show();
	},function(){
		$(this).find('dl').hide();
	})
	bannerIndex();
}
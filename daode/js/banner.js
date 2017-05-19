var banner = function(box,boxs,li,left,right,jiant){
	var Count  = li.length;
	var Index  = 0;
	var Time   = null;
	var Aout   = true;
	//插入
	//开始移动
	var Start = function (){
		if(Index < 0) Index = Count - 1;
		else if (Index >= Count) Index = 0;
		move();
	}
	var move = function (){
		Stop();
		box.find('dt').removeClass('this');
		box.find('dt').eq(Index).addClass('this');
		li.eq(Index).stop(false,true).stop().fadeIn(600);
		li.not(li.eq(Index)).stop(false,true).stop().fadeOut(600);
		if (Aout) Time = setTimeout(function(){Index++; Start();}, 3000);
	};
	left.click(function(){Index--;Start();});
	right.click(function(){Index++;Start();});
	//停止
	var Stop = function (){clearTimeout(Time);}
	box.find('dt').hover(function(){
		Index = $(this).index();
		Aout  = false; 
		Start();
	},function (){
		Aout = true; Start();
	});
	//显示,隐藏左右按钮
	if(jiant == true){
		left.hide();
		right.hide();
		box.hover(function(){
			left.show();
			right.show();
		},function (){
			left.hide();
			right.hide();
		});
	}
	Start();
}



var pic = function(box,boxs,li,left,right,jiant){
	var Count  = li.length;
	var Index  = 0;
	var Time   = null;
	var Aout   = true;
	//插入
	//开始移动
	var Start = function (){
		if(Index < 0) Index = Count - 1;
		else if (Index >= Count) Index = 0;
		move();
	}
	var move = function (){
		Stop();
		box.find('dt').removeClass('this');
		box.find('dt').eq(Index).addClass('this');
		li.eq(Index).stop(false,true).stop().fadeIn(600);
		li.not(li.eq(Index)).stop(false,true).stop().fadeOut(600);
		if (Aout) Time = setTimeout(function(){Index++; Start();}, 3000);
	};
	left.click(function(){Index--;Start();});
	right.click(function(){Index++;Start();});
	//停止
	var Stop = function (){clearTimeout(Time);}
	box.find('dt').hover(function(){
		Index = $(this).index();
		Aout  = false; 
		Start();
	},function (){
		Aout = true; Start();
	});
	//显示,隐藏左右按钮
	if(jiant == true){
		left.hide();
		right.hide();
		box.hover(function(){
			left.show();
			right.show();
		},function (){
			left.hide();
			right.hide();
		});
	}
	Start();
}
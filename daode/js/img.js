function tsgList(tsgWidth,tsgWidthList,myList){
	var Hhum = $('#tsgBottom li');		
	var _width  = tsgWidth; 		
	var list    = myList;		
	var _count  = Hhum.length; 		
	var _Index  = 0; 		
	var _playtime = 3000;	
	var _speed  = 300;		
	var _time   = null; 	
	var _Aout   = true; 	
	var _left_width = tsgWidthList;
	
	var Start = function (){
		if(_Index < 0) _Index = _count - 1;
		else if (_Index >= _count) _Index = 0;
		move();
	}
	var move = function (){
		Stop();
		Hhum.removeClass();
		Hhum.eq(_Index).addClass('this');
		_target = -1 * _width * _Index;
		$('#tsgTop ul').stop(false,true).stop().animate({'left':_target+'px'}, _speed);
		if (_Aout) _time = setTimeout( function(){ _Index++; Start(); }, _playtime );

		var tbr_list = _count - _Index;
		var tbr = _count - list;
		if (_Index <= list-1 || _Index == _count){
			 var width_left = 0;
		}else if (tbr_list <= list){
			 var width_left = -1 * tbr * _left_width;
		}else {
			 var width_left = -1* _Index * _left_width;
		}
		$('#tsgBottom ul').stop(false,true).stop().animate({'left':width_left+'px'}, _speed);
		
		var _Index_ = _Index + 1;
		$("#tsgFont span, #tsgFont b").empty();
		$("#tsgFont span").append(_count); 
		$("#tsgFont b").prepend(_Index_); 
	};
	
	
	$('#tsgLeft, .tsgBottom dt').click(function(){
		_Index--;
		Start();
	});
	$('#tsgRight, .tsgBottom dd').click(function(){
		_Index++;
		Start();
	});
	
	var Stop = function (){ clearTimeout(_time); }
	Hhum.hover(function(){
		_Index = Hhum.index(this);
		_Aout  = false; 
		Start();
	},function (){
		_Aout = true; Start();
	});
	Start();
}
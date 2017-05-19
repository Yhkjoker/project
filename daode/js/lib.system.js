(function($){     
	$.fn.selectui = function(){                   
	this.find('.selectui').each(function()       
	{
		var ui = $(this),
		face = ui.find('.face'),
		list = ui.find('ul');
		
		face.blur(function(){setTimeout(function(){list.slideUp(100);},100);})
		    .click(function(){list.slideToggle(100);});
		
		list.find('a').click(function()
		{
			var opti = $(this);
			face.val(opti.text());
			ui.find(':hidden').val(opti.attr('value'));
			
			return false;
		});
	});
	
}})(jQuery);



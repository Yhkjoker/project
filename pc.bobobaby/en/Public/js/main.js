jQuery(function($) {
    //a href="###" preventDefault
    $('a[href="###"]').on('click', function(evt) {
        event.stopPropagation();
        event.preventDefault();
    });

    //login
    $('.btn-login').on('click', function(evt) {
        $('#loginModal').show();
    })
    $('.modal').on('click', function(evt){
        $(this).hide();
    });
    $('.modal-dialog').on('click', function(evt){
        event.stopPropagation();
        event.preventDefault();
    })

    //search
    $('.search-wrap, .search-wrap .btn-search').one('click', function(evt){
    	$('.search-wrap').animate({width: '200px'});
    })

    //nav-bar
    $('.nav-bar>li').not('.active').hover(function(evt) {
        $(this).prev().addClass('near');
    }, function(evt) {
        $(this).prev().removeClass('near');
    })

    //sub-nav
    $('.cp-list').find('a').hover(function() {
        var _parent = $(this).parent(),
            _img = $(this).attr('data-img');
        if(_parent.parent().hasClass('col-md-50')) {
            _parent.parent().parent().find('li').removeClass('active');
            _parent.parent().parent().parent().parent().find('.cp-photo').hide().find('img').attr('src', _img).parent().slideDown();
        } else {
            _parent.parent().find('li').removeClass('active');
            _parent.parent().parent().parent().find('.cp-photo').hide().find('img').attr('src', _img).parent().slideDown();
        }
        _parent.addClass('active');
        
    }, function() {

    });
    $('.cp-catalog>li>a').hover(function(evt) {
        var _parent = $(this).parent();
        _parent.parent().find('li').removeClass('active');
        _parent.addClass('active');
        var _for = $('#' + $(this).attr('data-for'));
        _for.parent().find('ul').hide();
        _for.stop().show();
        _for.parent().parent().find('.cp-photo').stop().hide().find('img').attr('src', _for.find('.active').attr('data-img')).parent().slideDown();
    }, function(evt) {

    });

    //footer show
    $('.btn-arrow').on('click', function(evt) {
        $(this).next().slideDown();
        var a = $(window).scrollTop() + 100;
        $('.btn-arrow').animate({height: 0}, 500, function(){
            $(this).hide();
        });
        $('html,body').animate({ scrollTop: a }, 500, function() {

        });

    });
});
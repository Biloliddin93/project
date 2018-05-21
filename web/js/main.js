$(document).ready(function(){
	var wrap = $('.sub_wrap__menu_header'),
		close = '.close_burger',
		menu_active = 'menu_header__active';

	$('.burger').click(function(){
		var _this = $(this),
			parent = _this.parent();

        parent.toggleClass(menu_active);
        $('body').css({'overflow':'hidden', 'margin-right': '17px'});

	    $(document).mouseup(function (e) {
		    if (!$(e.target).closest(wrap).length) {
				parent.removeClass(menu_active);
                $('body').css({'overflow':'inherit', 'margin-right': '0'});
	        }
		});
    });

    $(close).on('click', function(){
        var _this = $(this),
            parent = $('.menu__header');

        parent.removeClass(menu_active);
        $('body').css({'overflow':'inherit', 'margin-right': '0'});
    });

    $('.owl-creative_kids').owlCarousel({
    	items: 1,
        autoplay: false,
        loop: true,
        dots: true,
		animateOut: 'slideInLeft',
		animateIn: 'fadeOut',
        nav: false,
        navSpeed: 1000,
        dotsSpeed: 1000
    });

    $('.creative_teens__slider').owlCarousel({
        items: 1,
        autoplay: false,
        loop: true,
        dots: false,
        nav: true,
        navSpeed: 1000,
        dotsSpeed: 1000,
        thumbs: true,
        thumbImage: true,
        thumbContainerClass: 'owl-thumbs',
        thumbItemClass: 'owl-thumb-item'
    });

    $('.language__header').hover(function(){
    	$('.language__header ul').addClass('uncover');
    });

    $('.language__header').mouseleave(function(){
    	$('.language__header ul').removeClass('uncover');;
    });
    $('.dropdown').hover(function(){
    	$(this).toggleClass('open');
    });

    if ($(window).width() <= 991) {

        $(document).on('click', '.mobile_down_arrow h1',  function(){
            var _this = $(this);
            _this.toggleClass('active');
            _this.parent().find('.menu__top_block__content').slideToggle();
        });
    }
    if ($('select').length) {
        $('select').niceSelect();
    }
});

window.onload = function() {
    // Horizontal
    baron({
        root: '.main__clipper',
        scroller: '.main__scroller',
        bar: '.main__bar',
        scrollingCls: '_scrolling',
        draggingCls: '_dragging',
        direction: 'h'
    })

    baron({
        root: '.baron',
        scroller: '.baron__scroller',
        bar: '.baron__bar',
        scrollingCls: '_scrolling',
        draggingCls: '_dragging'
    }).controls({
        // Element to be used as interactive track. Note: it could be different from 'track' param of baron.
        track: '.baron__track',
        forward: '.baron__down',
        backward: '.baron__up'
    })
}
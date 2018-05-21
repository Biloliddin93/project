$(document).ready(function(){
	
	(function($) {
		$(function() {
		  $('ul.tabs__caption').on('click', 'li:not(.active)', function() {
		    $(this)
		      .addClass('active').siblings().removeClass('active')
		      .closest('div.tabs').find('div.tabs__content').removeClass('active').eq($(this).index()).addClass('active');
		  });
		});
	})(jQuery);

	if ($('#highcharts_dig').length) {
		Highcharts.chart('highcharts_dig', {

			title: false,

			subtitle: false,

			yAxis: {
				title: false
			},
			legend: {
				layout: 'horizontal',
				align: 'left',
				verticalAlign: 'top',
				symbolWidth: 0
			},

			plotOptions: {
	            series: {
	                showCheckbox: true,
	                 marker: {
	                    enabled: false
	                },
	                events: {
	                    checkboxClick: function (event) {
	                        if (event.checked) {
	                            this.show();
	                        } else {
	                            this.hide();
	                        }
	                    }
	                }
	            }
	        },

			yAxis: {
				min: 0,
		        reversed: false,
		        title: {
		            enabled: false
		        },
		        labels: {
		            format: '{value}'
		        },
		        maxPadding: 0.05,
		        showLastLabel: true
		    },

			series: [{
		        name: 'Visits',
		        data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
		    }, {
		        name: 'Views',
		        data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
		    }, {
		        name: 'Users',
		        data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
		    }, {
		        name: 'New users',
		        data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
		    }],

			responsive: {
			rules: [{
			    condition: {
			        maxWidth: 500
			    },
			    chartOptions: {
			        legend: {
			            layout: 'horizontal',
			            align: 'center',
			            verticalAlign: 'bottom'
			        }
			    }
			}]
			}							
		});
	}
	var left_1 = '56px';

	$('#highcharts_dig input[type=checkbox]').each(function(i){
		var style = $(this).attr('style'),
			index = $(this).index(),
			text = $('.highcharts-legend-item text *').eq(i).text();

		$(this).removeAttr('style');
		$(this).trigger('click');
		$(this).wrapAll("<div class='highcharts-point-legend'></div>");
		$(this).parent().addClass('highcharts-point-legend-'+index);
		$(this).after('<span>'+text+'</span>');
	});

	$('.highcharts-point-legend').wrapAll('<div class="highcharts-point-legend_wrap"></div>');


	if ($('select').length) {
        $('select').niceSelect();
    }

    $('.file_input input').change(function(e){
    	var _this = $(this);
    		_this.parent().parent().find('.input').text(e.target.files[0].name);
    });

    var tabs__caption_2 = $('.tabs__caption li:nth-child(2)');

	if (tabs__caption_2.hasClass('active')) {
		$('.btn_add__users').removeClass('btn_add_none');
	}

    var tabs__caption = $('.tabs__caption li');

    tabs__caption.click(function(i){
    	var index = $(this).index();
    	if (index == 1) {
    		$(this).parents('.content_wrap').find('.btn_add__users').removeClass('btn_add_none');
    	}else{
    		$(this).parents('.content_wrap').find('.btn_add__users').addClass('btn_add_none');
    	}
    });

    $('.user_wrap_block').click(function(){
    	var _this = $(this),
    		parent = _this.parent();
    	parent.find('.popup__user').toggleClass('active');
    	$(document).mouseup(function (e) {
		    if (!$(e.target).closest(parent).length) {
				parent.find('.popup__user').removeClass('active');
	        }
		});
    });

    $('.slideToogle').on('click', function(e){
    	e.preventDefault();
    	var _this = $(this),
    		parent_translations_form = _this.parent().parent(),
    		parent = parent_translations_form.parent(),
    		translations_form = $('.translations_form');
		
		if (parent_translations_form.find(translations_form).hasClass('active')) {
			parent_translations_form.find(translations_form).toggleClass('active');
		}else{
			translations_form.removeClass('active');
			parent_translations_form.find(translations_form).addClass('active');
		}
    });

    $(document).on('click', '.modal-btn', function(){
    	var href = $(this).attr('href');
	    $.magnificPopup.open({
	    	items: {
			    src: href
			 },
	        type: 'inline',
	        preloader: true,
	        mainClass: 'animated fadeIn',
	        callbacks: {
		        close: function() {
					$('body').removeClass('body__message_style');
				}
			}
	    });
    });

    //Menu

	$('[data-toggle=dropdown]').on('click', function(event) {
		event.preventDefault(); 
		event.stopPropagation();
		$(this).parent().toggleClass('open_dropdown');
	});

	var _this, link, list_dropdown;

	$(document).on('click', '.ellipsis', function(e){
		var parent = $(this).parent().parent();
		parent.find('.dropdown-menu_popup').toggleClass('active');

		var html = parent.find('.dropdown-menu_popup').html(),
			wrap_list = $('.dropdown-menu_popup_position_wrap');

		list_dropdown = wrap_list.find('ul');

		list_dropdown.html(html);
		list_dropdown.toggleClass('active');

		// whenever we hover over a menu item that has a submenu
		var $menuItem = $(this).parent().parent(),
		    $submenuWrapper = $('.menu__sidebar_2', $menuItem);

		// grab the menu item's position relative to its positioned parent
		var menuItemPos = $menuItem.position();

		// place the submenu in the correct position relevant to the menu item
		list_dropdown.css({
		  top: parseInt(menuItemPos.top)+78+'px'
		});

		$menuItem.find('.dropdown-menu_popup').css({
		  top: menuItemPos.top
		});
        e.preventDefault();
	});

	$('.dropdown_popup').mouseenter(function(){
		_this = $(this);
		link = _this.find('[data-toggle="dropdown_popup"]');

		_this.addClass('dropdown_popup__open');
		link.append('<div class="ellipsis"><span></span><span></span><span></span></div>');
		$('.baron__scroller').css({'z-index': 3, 'position': 'relative'});
        e.preventDefault();

	});

	$('.dropdown_popup').mouseleave(function (e) {

		if (!$(this).find('.dropdown-menu_popup').hasClass('active')) {
			link.find('.ellipsis').remove();
			_this.find('.dropdown-menu_popup').removeClass('active');
			_this.removeClass('dropdown_popup__open');
			$('.baron__scroller').css('position', 'static');
			list_dropdown.removeClass('active');
		}

	});


	$(document).on('mousemove', function(e){
		if(!$(e.target).closest('.dropdown-menu_popup').length && !$(e.target).closest('.dropdown-menu .dropdown_popup').length){
			if($('.dropdown-menu_popup').hasClass('active')){
				$('.dropdown-menu_popup').removeClass('active');
				link.find('.ellipsis').remove();
				_this.find('.dropdown-menu_popup').removeClass('active');
				_this.removeClass('dropdown_popup__open');
				$('.baron__scroller').css('position', 'static');
			}
		}

	});

	$('[data-toggle="dropdown_popup"]').click(function(e){

	});

	var content = $('.wrapper').outerHeight(),
		top_block = $('.top_block').outerHeight(),
		sidebar_2 = $('.sidebar_2'),
		content_wrap = $('.content_wrap'),
		_window_height = $(window).outerHeight();
	
	if (_window_height > content) {
		sidebar_2.css('min-height', _window_height);
	}else{
		sidebar_2.css('min-height', content);
	}

	// content_wrap.css('height', content - top_block);

	$(document).on('keyup', '.wrap_count .count_output', function(){
		var _this = $(this),
			parent = _this.parent(),
			_length = _this.val().length;
		
		parent.find('.count_text').text(_length);
	});

	$('.toggle_title').click(function(i){
		var _this = $(this),
			parent = _this.parent(),
			wrap_toggle = $('.wrap__tabs__content'),
			index = _this.index();
		console.log(index);
		parent.find(wrap_toggle).slideToggle();
	});

	$('.wrap_burger').click(function(){
		var wrapper = $('.wrapper');

		$(this).toggleClass('active__wrap_burger');

		$(".sidebar").toggleClass('side_hide');

		wrapper.toggleClass('wrapper__side_bias');

	});

	$('a').on('click', function(){
		var href = $(this).attr('href');
		if (href == '#successfully' || href == '#error_popup') {
			$('body').addClass('body__message_style');
		}
	});

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
    }).fix({
        elements: '.header__title span',
        outside: 'header__title_state_fixed',
        before: 'header__title_position_top',
        after: 'header__title_position_bottom',
        clickable: true
    }).controls({
        // Element to be used as interactive track. Note: it could be different from 'track' param of baron.
        track: '.baron__track',
        forward: '.baron__down',
        backward: '.baron__up'
    })
}
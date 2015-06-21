$(document).ready(function(){
		$(window).resize(function(){
			$('#login_wrapper').css({
				position:'absolute',
				left: ($(window).width() - $('#login_wrapper').outerWidth())/2,
				top: ($(window).height() - $('#login_wrapper').outerHeight())/2
			});
		});
		$(window).resize();
		$(window).resize(function(){
			$('#forgot_wrapper').css({
				position:'absolute',
				left: ($(window).width() - $('#forgot_wrapper').outerWidth())/2,
				top: ($(window).height() - $('#forgot_wrapper').outerHeight())/2
			});
		});
		$(window).resize();
		$('#paswrd').click(function(){
			$('#login_wrapper').fadeOut(100);
			$('#forgot_wrapper').fadeIn(500);
		});
		$('#back').click(function(){
			$('#forgot_wrapper').fadeOut(100);
			$('#login_wrapper').fadeIn(500);
		});
		$('.account_logout li:first-child').css({"background":"none","paddingRight":"0"});
		$('.nav_links li:last-child').css('background','none');
		$('.nav_links li:first').find('a:eq(0)').addClass('active');
		$('.nav_links li:first-child').find('.sublinks').show();
		$('.nav_links li').click(function(){
			$('.nav_links li a').removeClass('active');
			$(this).find('a:eq(0)').addClass('active');
			$('.nav_links li').find('.sublinks').hide();
			$(this).find('.sublinks').show();
		});
		$('.form > li').css('padding','0 0 12px 0');
		$('.tabulardata tr th:first-child').css('border-top-left-radius','5px');
		$('.tabulardata tr th:last-child').css('border-top-right-radius','5px');
		$('.tabulardata tr:last-child td:first-child').css('border-bottom-left-radius','5px');
		$('.tabulardata tr:last-child td:last-child').css('border-bottom-right-radius','5px');
		$('.red a').click(function(){
			$('.red').fadeOut(500);
		});
		$('.green a').click(function(){
			$('.green').fadeOut(500);
		});
		$('.pagination li:first-child a').addClass('current');
		$('.pagination li').click(function(){
			$('.pagination li a').removeClass('current');
			$(this).find('a').addClass('current');
		});
	});	
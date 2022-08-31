/*---------------------------------------------
 header menu
 ---------------------------------------------*/

(function($) {
	$(document).ready(function() {

		//header langage doropdown
		$('#headnav .headnav_link02 p a').on('click', function() {
			if ($(this).parents('.headnav_link02').find('ul').hasClass('active')) {
				$(this).parents('.headnav_link02').find('ul').stop().animate({
					'height' : 0
				}, 200).removeClass('active');
			} else {
				$(this).parents('.headnav_link02').find('ul').stop().animate({
					'height' : 181 + 'px'
				}, 200).addClass('active');
			}
			return false;
		});
		$('#headnav .headnav_link02').hover(function() {
			$(this).find('ul').stop().animate({
				'height' : 181 + 'px'
			}, 200).addClass('active');
		}, function() {
			$(this).find('ul').stop().animate({
				'height' : 0
			}, 200).removeClass('active');
		});
		$('#headnav .headnav_link03 p a').on('click', function() {
			if ($(this).parents('.headnav_link03').find('ul').hasClass('active')) {
				$(this).parents('.headnav_link03').find('ul').stop().animate({
					'height' : 0
				}, 200).removeClass('active');
			} else {
				$(this).parents('.headnav_link03').find('ul').stop().animate({
					'height' : 181 + 'px'
				}, 200).addClass('active');
			}
			return false;
		});
		$('#headnav .headnav_link03').hover(function() {
			$(this).find('ul').stop().animate({
				'height' : 181 + 'px'
			}, 200).addClass('active');
		}, function() {
			$(this).find('ul').stop().animate({
				'height' : 0
			}, 200).removeClass('active');
		});

		//globalnav doropdown
		$('#globalnav .globalnav_menu').hover(function() {
			$(this).find('ul').stop().animate({
				'height' : 211 + 'px'
			}, 200);
		}, function() {
			$(this).find('ul').stop().animate({
				'height' : 0
			}, 200);
		});

		//globalnav fix
		$(window).on('scroll', function() {
			if ($(window).scrollTop() > $('#headnav').innerHeight() + $('#logo').innerHeight()) {
				$('#globalnav').css({
					'position' : 'fixed',
					'top' : 0,
					'zIndex' : 99999
				});
				$('body').addClass('scrolled');
			} else {
				$('#globalnav').removeAttr('style');
				$('body').removeClass('scrolled');
			}
		});
		
		//別ページからアンカーで飛んできた場合あらかじめfixed
		$(window).bind("load", function(){
		  if(document.URL.match("#")) {
		 //URLがマッチした場合の処理
		 $('#globalnav').addClass('fixed');
		  }
		});

	});
})(jQuery);
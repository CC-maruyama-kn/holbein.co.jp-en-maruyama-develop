/*---------------------------------------------
 header menu
 ---------------------------------------------*/

(function($) {
	$(document).ready(function() {
		$('.mH').matchHeight();
		$('.h-sp-menu').on('click', function () {
			$(this).toggleClass('sp-menu-open');
			$('header nav > ul').slideToggle(400);
			$('header ul').toggleClass('sp-menu-open');
				return false;
		});
		//ユーザーエージェント判定
    var ua = navigator.userAgent;
    if (ua.indexOf('iPhone') > 0 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0) {
			$("body").addClass("body-tablet-sp");
    } else if (ua.indexOf('iPad') > 0 || ua.indexOf('Android') > 0) {
			$("body").addClass("body-tablet-sp");
    } else {
			$("body").addClass("body-pc");
		}

  $('a[href^="#"]').click(function(){
    var speed = 500;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
	//Page TOP
	$(function () {
		var topBtn = $('#pageTop');
		topBtn.click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 1000);
			return false;
		});
	});
	});
})(jQuery);

// DRAWERMENU
var lh = "";
  lh = location.href;
  if (lh.match(/dcmsadm/)){
  } else {
  $(document).ready(function(){
    // drawermenu     
    var $win = $(window);
    $win.on('load resize',function(){
      var windowWidth = window.innerWidth;
      if(windowWidth <= 691){
        $('.drawer').drawer();
        $('.drawer-menu li a[href^="#"]').on('click', function() { 
        $('.drawer').drawer('close');
        });
      }
    });
  });
}

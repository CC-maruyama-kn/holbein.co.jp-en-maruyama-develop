/*---------------------------------------------
 Slide Menu
 ---------------------------------------------*/

(function($) {
	$(document).ready(function() {
		
		$('#globalnav #gnav_btn01 a').on('click', function(){
			$('#globalnav_in').stop().slideDown(200);
			return false;
		});
		$('#globalnav #gnav_btn02 a').on('click', function(){
			$('#globalnav_in').stop().slideUp(200,function(){
				$(this).removeAttr('style');
			});
			return false;
		});
	});
})(jQuery); 
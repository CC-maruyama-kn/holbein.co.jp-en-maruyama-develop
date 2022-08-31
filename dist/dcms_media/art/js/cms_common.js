
// HTMLエスケープ
;(function($){
	$.escapeHtml = function(val) {
		return $("<div/>").text(val).html();
	};
})(jQuery);



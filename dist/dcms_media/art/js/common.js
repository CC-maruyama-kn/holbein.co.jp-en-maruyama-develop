jQuery(document).ready(function(){
	var root = (function(){
		var root;
		var scripts = document.getElementsByTagName("script");
		var i = scripts.length;
		while (i--) {
			var match = scripts[i].src.match(/(^|.*\/)common\.js$/);
			if (match) {
				root = match[1];
				break;
			}
		}
		return root;
	})();	

	
	$(".search_after .item_box:nth-child(3n + 1)").each(function(){
		$(this).css('clear','both');
	});
	
	//thumbnail css
	$('.item_photo_thumbnail img').hover(function(){
		$('.item_photo_thumbnail img').removeClass('on');
		$('#item_box01 .item_photo img').attr('src', $(this).attr('src'));
		$(this).addClass('on');
	});
	
	//side select サブカテゴリ
	if ($("#side_search_category_list").length) {
		$("#side_search_category_list").narrows("#side_search_category_list_child");
	}

	// カレンダー
	if($("input.cal").length) {
		$("input.cal").datepicker({
			showOn: "button",
			buttonImage: root + "../image/common/icon_cal.gif",
			buttonText: "カレンダー",
			buttonImageOnly: true,
			showAnim: "slideDown"
		});
	} 
	
	var dateCell = $('#date_cell');
	var dateCellHandler = function() {
		if( $('#date_cell').val().length == 0 ) {
			$('#date_from').attr('disabled', 'disabled');
			$('#date_to').attr('disabled', 'disabled');
			
			$('#date_from').val('');
			$('#date_to').val('');
		}
		else {
			$('#date_from').removeAttr('disabled');
			$('#date_to').removeAttr('disabled');
		}
	};
	if ( dateCell.length ) {
		dateCellHandler();
		dateCell.change(dateCellHandler);
	}
});
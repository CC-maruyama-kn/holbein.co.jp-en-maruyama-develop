/*
 * FeedEk jQuery RSS/ATOM Feed Plugin
 * http://jquery-plugins.net/FeedEk/FeedEk.html
 * Author : Engin KIZIL
 * http://www.enginkizil.com
 */ (function ($) {
    $.fn.FeedEk = function (opt) {
        var def = {
            FeedUrl: 'http://rss.cnn.com/rss/edition.rss',
            MaxCount: 5,
            ShowDesc: true,
            ShowPubDate: true
        };
        montnly_array = new Array();
        montnly_array['Jan'] = '01';
        montnly_array['Feb'] = '02';
        montnly_array['Mar'] = '03';
        montnly_array['Apr'] = '04';
        montnly_array['May'] = '05';
        montnly_array['Jun'] = '06';
        montnly_array['Jul'] = '07';
        montnly_array['Aug'] = '08';
        montnly_array['Sep'] = '09';
        montnly_array['Oct'] = '10';
        montnly_array['Nov'] = '11';
        montnly_array['Dec'] = '12';

		weekday_array = new Array();
        weekday_array['Mon'] = '月';
        weekday_array['Tue'] = '火';
        weekday_array['Wed'] = '水';
        weekday_array['Thu'] = '木';
        weekday_array['Fri'] = '金';
        weekday_array['Sat'] = '土';
		weekday_array['Sun'] = '日';

        if (opt) {
            $.extend(def, opt)
        }
        var idd = $(this).attr('id');
        var pubdt;
        $('#' + idd).empty().append('<div style="text-align:left; padding:3px;"><img src="loader.gif" /></div>');
        $.ajax({
            url: 'http://ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=' + def.MaxCount + '&output=json&q=' + encodeURIComponent(def.FeedUrl) + '&callback=?',
            dataType: 'json',
            success: function (data) {
                $('#' + idd).empty();
                $.each(data.responseData.feed.entries, function (i, entry) {
                    $('#' + idd).append('<div class="ItemTitle"><a href="' + entry.link + '" target="_blank" >' + entry.title + '</a></div>');
                    if (def.ShowPubDate) {
                        pubdt = new Date(entry.publishedDate);
                        var pubDate = entry.publishedDate.split(' ');
                        var week = weekday_array[pubDate[0]];
                        var month = montnly_array[pubDate[2]];
                        var year = pubDate[3];
                        var date = pubDate[1];

                        //元のスクリプトデータ
			//$('#' + idd).append('<div class="ItemDate">' + pubdt.toLocaleDateString() + '</div>');
                        
			$('#' + idd).append('<div class="ItemDate">' + year + '年' + month + '月' + date + '日' + '</div>');
			
			//曜日を出したい時
			//$('#' + idd).append('<div class="ItemDate">' + year + '年' + month + '月' + date + '日' + week + '曜日' + '</div>');

                    }
                    if (def.ShowDesc) $('#' + idd).append('<div class="ItemContent">' + entry.content + '</div>')
                })
            }
        })
    }
})(jQuery);
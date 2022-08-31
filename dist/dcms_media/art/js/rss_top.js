//dcmsadmフォルダは管理画面フォルダ、管理画面上でのエラー防止のため
var lh = "";
    lh = location.href;
    if (lh.match(/dcmsadm/)){
    } else {
//dcmsadmフォルダ以下に存在しない時に実行
jQuery(function () {

    jQuery.getFeed({
        url: '/dcms-rss/news',
        success: function (feed) {


            var html = '';
			var visibleCount = 15 ; //表示数

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
            weekday_array['Mon,'] = '月';
            weekday_array['Tue,'] = '火';
            weekday_array['Wed,'] = '水';
            weekday_array['Thu,'] = '木';
            weekday_array['Fri,'] = '金';
            weekday_array['Sat,'] = '土';
            weekday_array['Sun,'] = '日';

            for (var i = 0; i < feed.items.length && i < visibleCount; i++) {



                var item = feed.items[i];

                var pubDate = item.updated.split(' ');
                var week = weekday_array[pubDate[0]];
                var month = montnly_array[pubDate[2]];
                var year = pubDate[3];
                var date = pubDate[1];

				html += '<p class="ItemDate">' + year + '.' + month + '.' + date + '</p>';
				//曜日を出したい時
                //html += '<p class="ItemDate">' + year + '年' + month + '月' + date + '日' + week + '曜日' + '</p>';
                html += '<p class="ItemTitle">' + '<a href="' + item.link + '">' + item.title + '</a>' + '</p>';
                html += '<p class="ItemContent">' + item.description + '</p>';
            }

            jQuery('#rss_box').append(html);
        }
    });
});



	}
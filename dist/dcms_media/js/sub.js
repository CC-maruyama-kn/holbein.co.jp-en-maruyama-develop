var lh = "";
lh = location.href;
if (lh.match(/dcmsadm/)) {} else {

    (function ($) {
        $(document).ready(function () {

            //matchHeight
            $('.product_list01 li').matchHeight();
            $('.announce_list h3').matchHeight();
            $('.announce_list p').matchHeight();
            $('.company_list h3').matchHeight();
            $('.company_list p').matchHeight();
            $('.business_list h3').matchHeight();
            $('.business_list p').matchHeight();
            $('.contest_kakosakuhin li .contest_kakosakuhin_img').matchHeight();
            $('.contest_kakosakuhin li').matchHeight();
            $('.contest_sakuhin02 li h3').matchHeight();
            $('.contest_sakuhin02 li .contest_sakuhin_img').matchHeight();
            $('.contest_sakuhin02 li p:first-of-type').matchHeight();
            $('.contest_sakuhin02 li p:last-of-type').matchHeight();
            $('.catalog_list01 .catalog_list_img').matchHeight();
            $('.catalog_list01 .catalog_list_update').matchHeight();
            $('.catalog_list01 .catalog_list_name').matchHeight();
            $('.about_map p').matchHeight();
            $('.holbein_gallery_tenjikai ul li .holbein_gallery_tenjikai_img').matchHeight();
            $('.holbein_gallery_tenjikai ul li .holbein_gallery_tenjikai_txt h3').matchHeight();
            $('.holbein_gallery_tenjikai ul li .holbein_gallery_tenjikai_txt p').matchHeight();
            $('.publishing_detail, .publishing_img').matchHeight();
            $('.histoir_list .histoir_list_img').matchHeight();
            $('.histoir_list .histoir_list_number').matchHeight();
            $('.histoir_list .histoir_list_text').matchHeight();
            $('.acrylart_list .acrylart_list_img').matchHeight();
            $('.acrylart_list .acrylart_list_number').matchHeight();

            //matchHeight
            $(window).on('load resize', function () {
                if (window.innerWidth < 690) {
                    $('.shop_map .shop_map_link h2').matchHeight();
                    $('.shop_toiawase ul li p').matchHeight({
                        remove: true
                    });
                } else {
                    $('.shop_map .shop_map_link h2').matchHeight({
                        remove: true
                    });
                    $('.shop_toiawase ul li p').matchHeight();
                }
            });


            //BiggerLink
            $('.biglink').biggerlink();
            $('.product_list01 li').biggerlink();
            $('.contest_kakosakuhin li').biggerlink();
            $('.holbein_gallery_tenjikai ul li').biggerlink();

            //画像リンク
            $('.announce_list img').on('click', function () {
                location.href = $(this).next('h3').find('a').attr('href');
            });
            $('.company_list img').on('click', function () {
                location.href = $(this).next('h3').find('a').attr('href');
            });
            $('.business_list img').on('click', function () {
                location.href = $(this).next('h3').find('a').attr('href');
            });
            //			$('.catalog_list01 .catalog_list_img').on('click', function () {
            //							location.href = $(this).parent('li').children('.link_btn01').children('a').attr('href');
            //			});

            //jscrollpane
            $('.scholarship_newsrelease .scholarship_newsrelease_inner').jScrollPane();

            //モーダル+スライダー(jquery.bxslider使用)
            if ($('.scholarship_modal').length > 0) {
                $('body').append('<div class="scholarship_modal_close"></div><div class="scholarship_modal_overlay"></div>');
            }
            var sliders = new Array();
            $('.scholarship_slider').each(function (i, slider) {
                sliders[i] = $(slider).bxSlider();
            });
            $('.scholarship_modal_open a').on('click', function () {
                var modalTarget = '.' + $(this).attr('data-modalClass');
                var $modalTarget = $(modalTarget);
                $modalTarget.addClass('scholarship_modal_active').stop().show(0, function () {
                    $(this).animate({
                        'opacity': 1
                    }, 600);
                    $('.scholarship_modal_overlay, .scholarship_modal_close').stop().fadeIn(600);

                    //モーダル内スライダー リロード
                    $.each(sliders, function (i, slider) {
                        slider.reloadSlider();
                    });
                    $modalTarget.css({
                        'top': (window.innerHeight - $modalTarget.innerHeight()) / 2 + 'px',
                        'left': (window.innerWidth - $modalTarget.innerWidth()) / 2 + 'px'
                    });
                    $('.scholarship_modal_close').css({
                        'top': (window.innerHeight - $modalTarget.innerHeight()) / 2 + 'px',
                        'left': (window.innerWidth - $modalTarget.innerWidth()) / 2 + $modalTarget.innerWidth() - 40 + 'px'
                    });
                });
                return false;
            });
            $('.scholarship_modal_overlay, .scholarship_modal_close').on('click', function () {
                $('.scholarship_modal,.scholarship_modal_overlay, .scholarship_modal_close').stop().fadeOut(200, function () {
                    $(this).removeAttr('style').removeClass('scholarship_modal_active');
                });
            });

            //リサイズ時処理
            var resizeTimer = null;
            $(window).on('resize', function () {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function () {

                    //jscrollpane調整
                    $('.scholarship_newsrelease .scholarship_newsrelease_inner').jScrollPane();

                    //モーダル位置調整
                    $('.scholarship_modal_active').css({
                        'top': (window.innerHeight - $('.scholarship_modal_active').innerHeight()) / 2 + 'px',
                        'left': (window.innerWidth - $('.scholarship_modal_active').innerWidth()) / 2 + 'px'
                    });
                    $('.scholarship_modal_close').css({
                        'top': (window.innerHeight - $('.scholarship_modal_active').innerHeight()) / 2 + 'px',
                        'left': (window.innerWidth - $('.scholarship_modal_active').innerWidth()) / 2 + $('.scholarship_modal_active').innerWidth() - 40 + 'px'
                    });
                }, 200);
            });


            //smoothscroll
            $('a[href^=#]').click(function () {
                var speed = 500;
                var href = $(this).attr("href");
                var target = $(href == "#" || href == "" ? 'html' : href);
                var position = target.offset().top;
                $("html, body").animate({
                    scrollTop: position
                }, speed, "swing");
                return false;
            });


            //タブ　初期
            $('.contest_tab_switch_top .contest_tab_switch_area .contest_tab_switch:first-child a').addClass('active_switch');
            $('.contest_tab_switch_bottom').append($('.contest_tab_switch_top').html());
            $('.contest01').show().addClass('active_tab');
            //タブ　切り替え
            $('.contest_tab_switch_area .contest_tab_switch a').each(function () {
                $(this).on('click', function () {
                    if (!($(this).hasClass('active_switch'))) {
                        var targetClass = $(this).attr('data_tab-class');
                        $('.contest_tab_switch_area .contest_tab_switch a').removeClass('active_switch');
                        $('.contest_tab_switch_area .contest_tab_switch a[data_tab-class=\"' + targetClass + '\"]').addClass('active_switch');
                        $('.active_tab').removeAttr('style').removeClass('active_tab');
                        $('.' + targetClass).fadeIn(300).addClass('active_tab');
                    }
                    return false;
                });
            });

            //スマホ、タブレットで電話発信(ユーザーエージェント判別でタグ書き換え)
            var ua = navigator.userAgent;
            if (ua.indexOf('iPhone') > 0 || ua.indexOf('iPod') > 0 || ua.indexOf('iPad') > 0 || ua.indexOf('Android') > 0) {
                $('.list_1_shoplist td:last-child, .list_2_shoplist td:last-child, .list_3_shoplist td:last-child, .list_4_shoplist td:last-child, .list_5_shoplist td:last-child, .list_6_shoplist td:last-child').each(function () {
                    var telNumber = $(this).text();
                    $(this).html('<a href=\"tel:' + telNumber + '\">' + telNumber + '</a>');
                });
            }



        });
    })(jQuery);
}

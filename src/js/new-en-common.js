var lh = "";
lh = location.href;
var minmdmql = window.matchMedia('(min-width: 979.8px)');
if (lh.match(/dcmsadm/)) { } else {


	$(function () {
		/****************************************************************/
		/* Smooth scroll */
		/****************************************************************/
		function smooth_scoll(elem) {
			if ($('#js-header').length > 0) {
				// サイトのヘッダー
				var headerEl = $('#js-header');
			}

			// ヘッダーが有る場合は高さを取得
			var adjust = headerEl != '' ? headerEl.height() : 0;
			var speed = 400;
			var href = $(elem).attr("href");
			var target = $(href == "#" || href == "" ? 'html' : href);
			var position = target.offset().top - adjust;

			$('body,html').animate({ scrollTop: position }, speed, 'swing');
			return false;
		}

		$('a[href^="#"]').on('click', function () {
			smooth_scoll($(this));
		});

		/****************************************************************/
		/* URLにIDが含まれていたらスムーススクロール */
		/****************************************************************/
		$(window).on('load', function () {
			// ページのURLを取得
			var pageUrl = location.href;
			var headerHeight = $('#js-header').height();

			// urlに「#」が含まれていれば
			if (pageUrl.indexOf("#") != -1) {
				// urlを#で分割して配列に格納
				var anchor = pageUrl.split("#");
				// 分割した最後の文字列（#◯◯の部分）をtargetに代入
				var target = $("#" + anchor[anchor.length - 1]);
				// リンク先の位置からheaderHeightの高さを引いた値をpositionに代入
				var position = Math.floor(target.offset().top) - headerHeight;
				// positionの位置に移動
				$('body,html').animate({ scrollTop: position }, 400, 'swing');
			}
		});
		/****************************************************************/
		/* リンク拡張 */

		/* js-biggerlink         = リンク拡張 */
		/* js-biggerlink-smooth  = リンク拡張(スムーススクロール) */
		/* js-biggerlink-blank   = リンク拡張(新規ウインドウ) */
		/****************************************************************/

		$('.js-biggerlink').click(function () {
			window.location = $(this).find("a").attr("href");
		});

		$('.js-biggerlink-smooth').click(function () {
			var target = $(this).find("a");
			smooth_scoll(target);
		});

		$('.js-biggerlink-blank').click(function () {
			var url = $(this).find("a").attr("href");
			window.open(url, '_blank');
		});

		/****************************************************************/
		/* 高さを揃える */

		/* elem に対象要素を指定 */
		/****************************************************************/

		function align_height(elem) {
			var height = 0;
			$(elem).each(function () {
				if (height < $(this).outerHeight()) {
					height = $(this).outerHeight();
				}
			});
			$(elem).css('height', height + 'px');
		}

		/****************************************************************/
		/* 電話番号 */
		/****************************************************************/

		if (navigator.userAgent.match(/(iPhone|iPod|Android)/)) {
			$(function () {
				$('.js-tel').each(function () {
					var str = $(this).html();
					if ($(this).children().is('img')) {
						$(this).html($('<a>').attr('href', 'tel:' + $(this).children().attr('alt').replace(/-/g, '')).append(str + '</a>'));
					} else {
						$(this).html($('<a>').attr('href', 'tel:' + $(this).text().replace(/-/g, '')).append(str + '</a>'));
					}
				});
			});
		}
		/****************************************************************/
		/* index hero */
		/****************************************************************/
		const swiper = new Swiper(".js-index-hero", {
			autoplay: {
				delay: 5000,
			},
			loop: true,
			pagination: {
				el: '.swiper-pagination',
				type: 'fraction',
				formatFractionCurrent: function (number) {
					return ('0' + number).slice(-2);
				},
				formatFractionTotal: function (number) {
					return ('0' + number).slice(-2);
				},
				renderFraction: function (currentClass, totalClass) {
					return '<span class="' + currentClass + '"></span>' +
						' / ' +
						'<span class="' + totalClass + '"></span>';
				},
				clickable: true,
			},
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},

		});
		/****************************************************************/
		/* header */
		/****************************************************************/
		// ハンバーガーメニュー

		var isScroll = {};
		isScroll.scroll = false;

		function fnScroll($window) {

			if (isScroll.scroll) {
				return false;
			}

			isScroll.scroll = true;

			window.requestAnimationFrame(function () {

				//pageTop Show
				if ($window.scrollTop() > 100) {
					$('#js-header').addClass('isFixed');
				} else {
					$('#js-header').removeClass('isFixed');
				}
				isScroll.scroll = false;
			});
		}

		$(window).scroll(function () {
			fnScroll($(this));
		});

		fnScroll($(window));

		isScroll.resize = true;

		function fnResize($window) {

			if (isScroll.resize) {
				return false;
			}

			isScroll.resize = true;

		}

		$(window).resize(function () {
			fnResize($(this));
			minmdmql = window.matchMedia('(min-width: 979.8px)');
		});

		fnResize($(window));

		$('#js-g-menu-btn').click(function () {
			$(this).toggleClass('is-active');
			$('#js-g-mega').toggleClass('is-active');
			return false;
		});

		$('#js-search-btn').click(function () {
			$('#js-header').toggleClass('is-search-active');
			$(this).toggleClass('is-active');
			$('#js-search-area').toggleClass('is-active');
			return false;
		});


		$('.js-sub-menubtn').click(function () {
			if(!minmdmql.matches){
				$(this).toggleClass('is-subon');
				$(this).next('ul').toggleClass('is-subon');
				return false;
			}
		});


	});
	$(function () {
		var pagetop = $('#js-pagetop');
		pagetop.hide();
		$(window).scroll(function () {
			if ($(this).scrollTop() > 500) {
				pagetop.fadeIn();
			} else {
				pagetop.fadeOut();
			}
		});

	});
	$(function () {
		$('.l-aside__sb_col2 a[href^="' + location.pathname + '"]').addClass('current');

		const mySwiper = new Swiper('#js-fullslider-swipe', {
			slidesPerView: 'auto',
			spaceBetween: 25,
			grabCursor: true,
			pagination: {
				el: '.swiper-pagination',
				type: 'fraction',
				formatFractionCurrent: function (number) {
					return ('0' + number).slice(-2);
				},
				formatFractionTotal: function (number) {
					return ('0' + number).slice(-2);
				},
				renderFraction: function (currentClass, totalClass) {
					return '<span class="' + currentClass + '"></span>' +
						' / ' +
						'<span class="' + totalClass + '"></span>';
				},
				clickable: true,
			},
			navigation: {
				nextEl: '#js-fullslider-swipe .swiper-button-next',
				prevEl: '#js-fullslider-swipe .swiper-button-prev',
			},
			breakpoints: {
				890: {
					slidesPerView: 2,
					slidesPerGroup: 2
				},
				690: {
					slidesPerView: 1,
					slidesPerGroup: 1
				}
			},
		});

	});



}
/* Information
----------------------------------------------
File Name : vertical.scrollbar.js
URL : http://www.atokala.com/
Copyright : (C)atokala
Author : Masahiro Abe
--------------------------------------------*/
var ATScrollbar = function(vars) {
	var _self = this;
	var _scroll;
	var _scrollbar = new Object();
	var _press = false;
	var _scrollover = false;
	var _moving;

	//デフォルトオプション
	var options = {
		scroll : 'scroll',
		scrollInner : 'scrollInner',
		scrollbar : 'scrollbar',
		track : 'track',
		thumb : 'thumb',
		up : 'up',
		down : 'down',
		interval : 10,
		duration : 600,
		delay : 400,
		easing : 'quinticOut'
	};

	//イージング
	var easing = {
		/*
		time = 現在秒 (現在
		begin = 最初の値
		change = 変動する値
		duration = 何秒かけて動くか
		*/
		liner : function(t, b, c, d) {
			return c * t / d + b;
		},
		quinticIn : function(t, b, c, d) {
			t /= d;
			return c * t * t * t * t * t + b;
		},
		quinticOut : function(t, b, c, d) {
			t /= d;
			t = t - 1;
			return -c * (t * t * t * t - 1) + b;
		}
	};

	//オプションの上書き設定
	this.config = function(property) {
		for (var i in property) {
			//設定されていない時は上書きしない
			if (!vars.hasOwnProperty(i)) {
				continue;
			}
			options[i] = property[i];
		}
	}

	//CSS取得
	this.getStyle = function(ele) {
		var style = ele.currentStyle || document.defaultView.getComputedStyle(ele, '');
		return style;
	}

	//高さ取得
	this.getHeight = function(ele) {
		height = ele.offsetHeight;
		return height;
	}

	//sign取得
	this.sign = function(x) {
		return typeof x == 'number' ? x ? x < 0 ? -1 : 1 : isNaN(x) ? NaN : 0 : NaN;
	}

	//Class取得
	this.getElementByClass = function(name) {
		var classes = new Array();
		var tag = document.getElementById(options.scroll).getElementsByTagName('*');

		for (var i in tag) {
			if (tag[i].className == name) {
				classes.push(tag[i]);
			}
		}

		return classes;
	}

	//イベント追加
	this.addEvent = function(target, name, func) {
		// モダンブラウザ
		if(target.addEventListener) {
			target.addEventListener(name, func, false);
		}
		// IE
		else if(window.attachEvent) {
			target.attachEvent('on'+name, function(){func.apply(target);});
		}
	}

	//イベントキャンセル
	this.eventCancel = function(evt) {
		if (evt.preventDefault){
			evt.preventDefault();
		}
		else {
			evt.returnValue = false;
		}
	}

	//スクロールトップ取得
	this.getScrollTop = function(ele) {
		return ele.scrollTop;
	}

	//スクロール高さ取得
	this.getScrollHeight = function(ele) {
		return ele.scrollHeight;
	}

	//子要素取得
	this.getChild = function(ele) {
		var child = ele.childNodes;
		var childs = new Array();
		for (var i in child) {
			if (child[i].nodeType == 1) {
				childs.push(child[i]);
			}
		}
		return childs;
	}

	this.getScroll = function() {
		return document.getElementById(options.scroll);
	}

	this.getScrollBar = function() {
		return this.getElementByClass(options.scrollbar)[0];
	}

	this.handle = function(delta) {
		var sign = _self.sign(delta);
		var diff = parseInt(_scrollbar.thumb.style.top) - Math.ceil(this.getHeight(_scrollbar.thumb) / 5) * sign;

		this.setThumbPostion(diff);
		this.setScrollPostion(diff);
	}

	/** Event handler for mouse wheel event.
	 */
	this.wheel = function(e){
		if (!_scrollover) {return false}

		var e = e ? e : window.event;
		var delta = 0;

		if (e.wheelDelta) { /* IE/Opera. */
			delta = e.wheelDelta / 120;
		}
		else if (window.opera) {
			delta = - delta;
		}
		else if (e.detail) { /** Mozilla case. */
			delta = - e.detail / 3;
		}

		if (delta) {
			_self.handle(delta);
		}

		_self.eventCancel(e);
	}

	//押しっぱなし処理
	this.thumbMove = function(to) {
		var diff = to - parseInt(_scrollbar.thumb.style.top);
		var sign = _self.sign(diff);
		var move = _self.getHeight(_scrollbar.thumb) / 20;

		//nextは判定に使用
		var next = parseInt(_scrollbar.thumb.style.top) + move * sign;

		var limit = _self.getHeight(_scrollbar.track) - _self.getHeight(_scrollbar.thumb);
		var todiff = Math.abs(parseInt(to) - parseInt(_scrollbar.thumb.style.top));
		var nextdiff = Math.abs(next - parseInt(_scrollbar.thumb.style.top));

		if (next < 0) {
			_self.setThumbPostion(0);
			_self.setScrollPostion(0);
			_self.scrollbarUp();
		}
		else if (next > limit) {
			_self.setThumbPostion(limit);
			_self.setScrollPostion(limit);
			_self.scrollbarUp();
		}
		else if (todiff > nextdiff) {
			clearTimeout(_moving);
			//moveは上下同じ移動値にするために使用
			move = parseInt(_scrollbar.thumb.style.top) + Math.ceil(move) * sign;
			_self.setThumbPostion(move);
			_self.setScrollPostion(move);
			_press = setTimeout(function(){_self.thumbMove(to);}, options.interval);
		}
		else {
			_self.scrollbarUp();
		}
	}

	//上ボタン押下処理
	this.upPress = function(e) {
		var e = e ? e : window.event;

		_self.thumbMove(0);
		_self.eventCancel(e);
	}

	//下ボタン押下処理
	this.downPress = function(e) {
		var e = e ? e : window.event;

		var to = _self.getHeight(_scrollbar.track) - _self.getHeight(_scrollbar.thumb);
		_self.thumbMove(to);
		_self.eventCancel(e);
	}

	//スクロールバークリック処理
	this.trackDown = function(e) {
		if (_scrollbar.thumb.dragging) return;

		var e = e ? e : window.event;
		var mousePostion = e.layerY ? e.layerY : e.offsetY;
		if (typeof mousePostion == 'undefined') {mousePostion = 0;}

		mousePostion -= (_self.getHeight(_scrollbar.thumb) / 2);
		_self.thumbMove(mousePostion);
		_self.eventCancel(e);
	}

	//スクロールバークリック処理
	this.scrollbarUp = function() {
		clearTimeout(_press);
	}

	//ドラッグ開始処理
	this.dragStart = function(e) {
		_scrollbar.thumb.dragging = true;

		var e = e ? e : window.event;
		offsetPosition = e.pageY ? e.pageY : e.screenY;

		_scrollbar.thumb.offset = offsetPosition - parseInt(_scrollbar.thumb.style.top);
		_self.eventCancel(e);
	}

	//ドラッグ終了処理
	this.dragEnd = function() {
		_scrollbar.thumb.dragging = false;
	}

	//ドラッグ中の処理
	this.dragMove = function(e) {
		if (!_scrollbar.thumb.dragging) return;

		var e = e ? e : window.event;
		offsetPosition = e.pageY ? e.pageY : e.screenY;

		var diff = offsetPosition - _scrollbar.thumb.offset;

		_self.setThumbPostion(diff);
		_self.setScrollPostion(diff);
		_self.eventCancel(e);
	}

	//スクロールと内容の比率
	this.getRate = function() {
		var rate = this.getHeight(_scrollbar.track) / this.getScrollHeight(_scrollbar.inner);
		return rate;
	}

	//サムの位置を設定
	this.setThumbPostion = function(position) {
		var limit = this.getHeight(_scrollbar.track) - this.getHeight(_scrollbar.thumb);

		//移動がマイナスの場合0に止める
		if (position < 0) {
			_scrollbar.thumb.style.top = 0 + 'px';
		}
		//移動が限界値を越えた場合限界値に止める
		else if (position > limit) {
			_scrollbar.thumb.style.top = limit + 'px';
		}
		else {
			_scrollbar.thumb.style.top = position + 'px';
		}
	}

	//スクロールの位置を設定
	this.setScrollPostion = function(position) {
		var limit = this.getScrollHeight(_scrollbar.inner) - this.getHeight(_scrollbar.inner);
		var rate = this.getRate();
		var position = position / rate;
		var to = 0;

		if (position < 0) {
			to = 0;
		}
		else if (position > limit) {
			to = limit;
		}
		else {
			to = position;
		}

		if (!options.easing) {
			_scrollbar.inner.scrollTop = to;
		}
		else {
			var now = new Date();
			var from = _scrollbar.inner.scrollTop;
			var run = function() {
				clearTimeout(_moving);
				_moving = setTimeout(function() {
					var time = new Date() - now;
					var next = easing[options.easing](time, from, to - from, options.duration);

					if (time < options.duration) {
						_scrollbar.inner.scrollTop = Math.ceil(next);
						run();
					}
					else {
						_scrollbar.inner.scrollTop = to;
						clearTimeout(_moving);
					}
				}, options.interval);
			}
			run();
		}
	}

	//フォントサイズ変更検出
	this.fontSizeCheck = function() {
		var div = document.createElement('div');
		var s = document.createTextNode('S');
		div.appendChild(s);
		div.style.visibility = 'hidden';
		div.style.height = 'auto';
		div.style.position = 'absolute';
		div.style.top = 0;
		document.body.appendChild(div);
		var prevHeight = div.offsetHeight;

		setInterval(function(){
			if(prevHeight != div.offsetHeight){
				_self.setThumbHeight();
				prevHeight= div.offsetHeight;
			}
		}, 1000);
	}

	//スクロールバーを作成
	this.setVerticalHTML = function() {
		//垂直スクロールバー
		_scrollbar.track = this.getElementByClass(options.track)[0];
		_scrollbar.thumb = this.getElementByClass(options.thumb)[0];
		_scrollbar.inner = this.getElementByClass(options.scrollInner)[0];

		//垂直スクロールバーボタン
		if (options.up) {
			_scrollbar.up = this.getElementByClass(options.up)[0];
		}

		if (options.down) {
			_scrollbar.down = this.getElementByClass(options.down)[0];
		}

		_scrollbar.inner.style.overflow = 'hidden';
		_scrollbar.inner.style.height = this.getHeight(_scroll) + 'px';
		this.setThumbHeight();
	}

	//垂直トラックのHTMLセット
	this.setThumbHeight = function() {
		var height = this.getHeight(_scroll);
		var scrollHeight = this.getScrollHeight(_scrollbar.inner);

		if (height < scrollHeight) {
			var rate = this.getRate();
			_scrollbar.style.display = 'block';
			_scrollbar.thumb.style.height = this.getHeight(_scrollbar.track) * rate + 'px';
			this.setThumbPostion(0);
			this.setScrollPostion(0);
		}
		else {
			_scrollbar.style.display = 'none';
		}
	}

	this.load = function() {
		//コンストラクタ
		this.config(vars);

		this.addEvent(window, 'load', function() {
			_scroll = _self.getScroll();
			_scrollbar = _self.getScrollBar();

			_self.fontSizeCheck();
			_self.setVerticalHTML();

			_self.addEvent(_scrollbar.thumb, 'mousedown', _self.dragStart);
			_self.addEvent(window.document, 'mousemove', _self.dragMove);
			_self.addEvent(window.document, 'mouseup', _self.dragEnd);

			if (window.addEventListener) window.addEventListener('DOMMouseScroll', _self.wheel, false);
			_self.addEvent(window.document, 'mousewheel', _self.wheel);

			_self.addEvent(_scroll, 'mouseover', function() {_scrollover = true;});
			_self.addEvent(_scroll, 'mouseout', function(){_scrollover = false;});

			_self.addEvent(_scrollbar.track, 'mousedown', _self.trackDown);

			if (options.up) {
				_self.addEvent(_scrollbar.up, 'mousedown', _self.upPress);
				_self.addEvent(_scrollbar.up, 'mouseout', _self.scrollbarUp);
			}
			if (options.down) {
				_self.addEvent(_scrollbar.down, 'mousedown', _self.downPress);
				_self.addEvent(_scrollbar.down, 'mouseout', _self.scrollbarUp);
			}

			_self.addEvent(window.document, 'mouseup', _self.scrollbarUp);
		});
	}
};


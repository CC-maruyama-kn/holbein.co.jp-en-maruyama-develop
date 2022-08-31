var lh = "";
    lh = location.href;
    if (lh.match(/dcmsadm/)){
    } else {
$(function(){

	//TOPの時のカレント処理
	if(location.pathname == "/" || location.pathname == "/index.html"){
		//TOPの時のカレントクラスの付与
		$('#globalnav ul li#globalnav01').addClass('main_current');

		//locatorを削除する
		$("#locator").remove();
	}else{
		//現在フォルダ取得　メインナビ内の該当liにカレントクラスを付与
		var now = location.href.split('/');
		var endDir = now.slice(now.length-1,now.length-0);//現フォルダ名を取得する場合
		
		var endDir2 = now.slice(3,4);//第一階層のフォルダ名を取得する場合
		//$('#globalnav ul li a[href$="'+endDir+'/"]').parent().addClass('main_current');
		$('#globalnav ul li a[href$="'+endDir+'"]').parent().addClass('main_current');
		$('#globalnav ul li a[href$="'+endDir2+'.html"]').parent().addClass('main_current');

		//中ページ用のクラスを付与
		$('body').addClass("common");
	};



	//TOPの時のカレント処理
	if(location.pathname == "/en.html" ){
		//TOPの時のカレントクラスの付与
		$('#en_globalnav ul li#en_globalnav01').addClass('main_current');

		//locatorを削除する
		$("#locator").remove();
	}else{
		//現在フォルダ取得　メインナビ内の該当liにカレントクラスを付与
		var now = location.href.split('/');
		var endDir = now.slice(now.length-1,now.length-0);//現フォルダ名を取得する場合
		
		var endDir2 = now.slice(3,4);//第一階層のフォルダ名を取得する場合
		var endDir3 = now.slice(4,5);//第二階層のフォルダ名を取得する場合
		//$('#globalnav ul li a[href$="'+endDir+'/"]').parent().addClass('main_current');

		$('#en_globalnav ul li a[href$="'+endDir+'"]').parent().addClass('main_current');
		$('#en_globalnav ul li a[href$="'+endDir3+'.html"]').parent().addClass('main_current');


		//中ページ用のクラスを付与
		$('body').addClass("common");
	};
	


	});
	}
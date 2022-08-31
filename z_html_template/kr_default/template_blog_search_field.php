<?php
/**
 * 公開サイト BLOG の検索条件欄を編集
 *   検索候補リスト作成用変数
 *     $categoryList        ：カテゴリ一覧
 *     $tagList             ：タグ一覧
 *     $yearList            ：年一覧
 *     $monthList           ：年月一覧
 *
 *   検索入力フォーム用変数
 *     $searchKeyword       ：キーワード
 *     $searchKeywordMode   ：キーワードのAND/OR条件
 *     $searchCategoryList  ：カテゴリの一覧
 *     $searchCategoryMode  ：カテゴリのAND/OR条件
 *     $searchTagList       ：タグの一覧
 *     $searchTagMode       ：タグのAND/OR条件
 *     $searchYearList      ：年の一覧
 *     $searchMonthList     ：年月の一覧
 *
 *   ###_DCMS_BLOG_SEARCH_FIELD_### の出力内容
 *     $blogSearchField
 *
 *   画面表示時に必要なファイル
 *     検索条件欄を表示する為のCSS
 *       skin_media_search_box.css
 *       <link rel="stylesheet" type="text/css" href="/dcms_media/css/skin_media_search_box.css" media="all">
 *     selectizeを使用する為のCSS、JS
 *       ※selectizeを使用しない場合は不要です。
 *       ※selectize.jsを使用する場合、jQueryの読み込みも必要になります。
 *         jQueryのバージョンにより動作しない場合があります。
 *       selectize.css、selectize.min.js
 *       <link rel="stylesheet" type="text/css" href="/dcms_media/css/selectize.css" media="all">
 *       <script type="text/javascript" src="/dcms_media/js/selectize.min.js"></script>
 * 
 *   注意点
 *     selectize.jsを使用する場合、jQueryのバージョンが古い場合動作しない可能性があります
 *
 */

$strChecked = 'checked="checked"';
$strSelected = 'selected="selected"';
$schModeAnd = 'AND';

$blogSearchField = '';
if (isset($categoryList) === FALSE) {
    $categoryList = array();
}
if (isset($tagList) === FALSE) {
    $tagList = array();
}
if (isset($yearList) === FALSE) {
    $yearList = array();
}
if (isset($monthList) === FALSE) {
    $monthList = array();
}
if (isset($searchKeyword) === FALSE) {
    $searchKeyword = '';
}
if (isset($searchKeywordMode) === FALSE) {
    $searchKeywordMode = '';
}
if (isset($searchCategoryList) === FALSE) {
    $searchCategoryList = array();
}
if (isset($searchCategoryMode) === FALSE) {
    $searchCategoryMode = '';
}
if (isset($searchTagList) === FALSE) {
    $searchTagList = array();
}
if (isset($searchTagMode) === FALSE) {
    $searchTagMode = '';
}
if (isset($searchYearList) === FALSE) {
    $searchYearList = array();
}
if (isset($searchMonthList) === FALSE) {
    $searchMonthList = array();
}


$blogSearchField .= '<div class="blog_side_section01 blog_side_section_search">' .PHP_EOL;
$blogSearchField .= '<h5 class="blog_sidetitle01">Search</h5>' . PHP_EOL;

// キーワード
$keywordChecked = (mb_strtoupper($searchKeywordMode) == $schModeAnd) ? $strChecked : '';
$blogSearchField .= '<h6 class="blog_sidetitle02">■Keyword' .PHP_EOL;
$blogSearchField .= '<span class="checkbox_right"><label><input type="checkbox" id="search_keyword_and" value="' . $schModeAnd . '" ' . $keywordChecked . ' /><span class="checkbox_label">ANDで検索する</span></label></span>' .PHP_EOL;
$blogSearchField .= '</h6>' .PHP_EOL;
$blogSearchField .= '<div class="blog_side_searchblock">' .PHP_EOL;
$blogSearchField .= '<input type="text" id="search_keyword" class="not_tags" value="' . $searchKeyword . '" />' .PHP_EOL;
$blogSearchField .= '</div>' .PHP_EOL;

// カテゴリ
// チェックボックスの一覧形式で出力
if (count($categoryList)) {
    $tagHtml = '<label><input type="checkbox" name="search_category[]" value="%s" %s /><span class="checkbox_label">%s</span></label>';

    $categoryChecked = (mb_strtoupper($searchCategoryMode) == $schModeAnd) ? $strChecked : '';
    $blogSearchField .= '<h6 class="blog_sidetitle02">■Category' .PHP_EOL;
    $blogSearchField .= '<span class="checkbox_right"><label><input type="checkbox" id="search_category_and" value="' . $schModeAnd . '" ' . $categoryChecked . ' /><span class="checkbox_label">ANDで検索する</span></label></span>' .PHP_EOL;
    $blogSearchField .= '</h6>' .PHP_EOL;
    $blogSearchField .= '<div class="blog_side_searchblock blog_side_searchblock--checkboxes">' .PHP_EOL;
    foreach($categoryList as $value) {
        $checked = (in_array($value['blogCategoryUrl'], $searchCategoryList)) ? $strChecked : '';
        $blogSearchField .= sprintf($tagHtml, $value['blogCategoryUrl'], $checked, $value['blogCategoryName']) . PHP_EOL;
    }
    $blogSearchField .= '</div>' .PHP_EOL;
}

// タグ
// selectize形式で出力
if (count($tagList)) {
    $checked = (mb_strtoupper($searchTagMode) == $schModeAnd) ? $strChecked : '';

    $blogSearchField .= '<h6 class="blog_sidetitle02">■Tag' .PHP_EOL;
    $blogSearchField .= '<span class="checkbox_right"><label><input type="checkbox" id="search_tag_and" value="' . $schModeAnd . '" ' . $checked . ' /><span class="checkbox_label">ANDで検索する</span></label></span>' .PHP_EOL;
    $blogSearchField .= '</h6>' .PHP_EOL;

    // selectize用のリストを作成
    $tagHtml = "{value:'%s', text:'%s'}";
    $selectizeTagList = array();
    foreach($tagList as $value) {
        $selectizeTagList[] = sprintf($tagHtml, $value['blogTagUrl'], $value['blogTagName']);
    }
    $selectizeTagListString = implode(',', $selectizeTagList);
    // 「\」は「\\」にしてエスケープする必要あり。
    $selectizeTagListString = str_replace('\\', '\\\\', $selectizeTagListString);

    // 検索条件再現用のリストを作成
    $searchTagStr = implode(',', $searchTagList);

    $blogSearchField .= '<div class="blog_side_searchblock"><input type="text" id="search_tag" name="search_tag" value="' . $searchTagStr . '" /></div>' .PHP_EOL;
}

// 年月
// セレクトボックス形式で出力
if (count($monthList)) {
    $tagHtml = '<option value="%s" %s>%s</option>';

    $blogSearchField .= '<h6 class="blog_sidetitle02">■Date（年月）</h6>' .PHP_EOL;
    $blogSearchField .= '<div class="blog_side_searchblock">' .PHP_EOL;
    $blogSearchField .= '<select id="search_date" name="search_date" class="blog_side_searchblock_select">' .PHP_EOL;
    foreach($monthList as $value) {
        $selected = (in_array($value['year'] . $value['month'], $searchMonthList)) ? $strSelected : '';
        $blogSearchField .= sprintf($tagHtml, $value['year'] . $value['month'], $selected, $value['year'] . '年' . $value['month'] . '月') . PHP_EOL;
    }
    $blogSearchField .= '</select>' .PHP_EOL;
    $blogSearchField .= '</div>' .PHP_EOL;
}

// 年
// チェックボックス形式で出力
if (count($yearList)) {
    $tagHtml = '<label><input type="checkbox" name="search_year[]" value="%s" %s /><span class="checkbox_label">%s</span></label>';

    $blogSearchField .= '<h6 class="blog_sidetitle02">■Date（年）</h6>' .PHP_EOL;
    $blogSearchField .= '<div class="blog_side_searchblock blog_side_searchblock--checkboxes">' .PHP_EOL;
    foreach($yearList as $value) {
        $checked = (in_array($value['year'], $searchYearList)) ? $strChecked : '';
        $blogSearchField .= sprintf($tagHtml, $value['year'], $checked, $value['year'] . 年) . PHP_EOL;
    }
    $blogSearchField .= '</div>' .PHP_EOL;
}

// 検索ボタン
$blogSearchField .= '<div class="blog_side_searchblock">' .PHP_EOL;
$blogSearchField .= '<button class="blog_side_searchblock__searchbutton" onClick="dcmsBlogSearch();"><i class="fa fa-search"></i>検索</button>' .PHP_EOL;
$blogSearchField .= '</div>' .PHP_EOL;

$blogSearchField .= '</div>' .PHP_EOL;


// selectize用JS作成
$js = '';
$js .= <<<'EOF'
<script type="text/javascript">

var lh = "";
	lh = location.href;
if (lh.match(/dcmsadm/)){
} else {
	$(document).ready(function(){
		// selectize
		// タグ
		var selectize_tag = $('#search_tag').selectize({
		
			plugins: {
				'remove_button':{
					'title': 'タグを削除'
				}
			},
			delimiter: ',',
			persist: false,
			hideSelected: true,
			placeholder: 'タグの選択または追加',
			options: [
				// ドロップダウンの選択肢
				// 「\」は「\\」にしてエスケープする必要あり。
				// リモートのデータを取得する場合は load オプションに関数を設定する。
EOF;
$js .= PHP_EOL . $selectizeTagListString . PHP_EOL;
$js .= <<<'EOF'
			],
			create: function(input) {
				return {
					value: input,
					text: input
				}
			},
			render: {
				option_create: function(data, escape){
					return '<div class="create">「<strong>' + escape(data.input) + '</strong>」を追加&hellip;</div>';
				}
			},
			onInitialize: function(){	// selectize のオリジナルにはない追加イベント。初期化完了後に実行
				setTimeout(function(){$('#search_tag-selectized').attr('maxlength','20');},100);	// selectize に指定する項目の id に「-selectized」を追加したものを指定
			}
		})[0].selectize;
		selectize_tag.on('change',function(_value){
			this.close();
			this.blur();
		});
		selectize_tag.on('item_remove',function(_value){
			this.$dropdown.find('.option.selected[data-value="'+_value+'"]').removeClass('selected');
		});

		// selectize のコントロールをクリックした時の処理
		// ここの記述は selectize を使う箇所で共通なので、複数は書かない
		$(document).on('click.selectizecontrol','.selectized + .selectize-control .selectize-input', function(e){
			var _target = $(e.originalEvent.srcElement || e.originalEvent.originalTarget);
			_target.parents('.selectize-control').find('.selectize-input').prev()[0].selectize.open();
		});

	});
}
</script>
EOF;
$blogSearchField .= $js . PHP_EOL;


// 検索ボタン処理用JS作成
$js = <<<'EOF'
<script type="text/javascript">

function dcmsBlogSearch() {
	var lh = "";
		lh = location.href;
	if (lh.match(/dcmsadm/)){

		return false;
	}

	var values = [];
	var delimiter = " ";

	// キーワード
	var schKeyword = dcmsGetValueById("search_keyword");
	var schKeywordMode = dcmsGetValueById("search_keyword_and");

	// カテゴリ
	values = dcmsGetValuesByName("search_category[]");
	var schCategory = values.join(delimiter);
	var schCategoryMode = dcmsGetValueById("search_category_and");

	// タグ
	var values = dcmsGetSelectizeValuesById("search_tag", delimiter);
	var schTag = values.join(delimiter);
	var schTagMode = dcmsGetValueById("search_tag_and");

	// 年月
	var schMonth = dcmsGetValueById("search_date");

	// 年
	values = dcmsGetValuesByName("search_year[]");
	var schYear = values.join(delimiter);


	// フォーム要素作成
	var form = document.createElement('form');

	// キーワード
	form.appendChild(dcmsCreateInput("schKeyword", schKeyword));
	if (schKeywordMode) {
		form.appendChild(dcmsCreateInput("schKeywordMode", schKeywordMode));
	}

	// カテゴリ
	form.appendChild(dcmsCreateInput("schCategory", schCategory));
	if (schCategoryMode) {
		form.appendChild(dcmsCreateInput("schCategoryMode", schCategoryMode));
	}

	// タグ
	form.appendChild(dcmsCreateInput("schTag", schTag));
	if (schTagMode) {
		form.appendChild(dcmsCreateInput("schTagMode", schTagMode));
	}

	// 年
	form.appendChild(dcmsCreateInput("schYear", schYear));
	// 年月
	form.appendChild(dcmsCreateInput("schMonth", schMonth));

	document.body.appendChild(form);
	form.submit();
}
/**
 * 要素のidを指定し、値を取得する
 * checkboxはチェックしている場合のみ値を取得する
 *  id : 値を取得したい要素のid
 */
function dcmsGetValueById(id) {
	var result = "";
	if (!id) {
		return "";
	}
	var ele = document.getElementById(id);
	if (ele) {
		switch(ele.type) {
			case "text":
			case "select-one":
				result = ele.value;
				break;
			case "checkbox":
				if (ele.checked) {
					result = ele.value;
				}
				break;
		}
	}

	return result;
}
/**
 * 要素のnameを指定し、値を配列で取得する
 * checkboxはチェックしている場合のみ値を取得する
 *  name : 値を取得したい要素のname
 */
function dcmsGetValuesByName(name) {
	var result = [];
	if (!name) {
		return "";
	}
	var nodeList = document.getElementsByName(name);
	if (nodeList) {
		for(var i = 0; i < nodeList.length; ++i){
			switch(nodeList[i].type) {
				case "text":
				case "select-one":
					result.push(nodeList[i].value);
					break;
				case "checkbox":
					if (nodeList[i].checked) {
						result.push(nodeList[i].value);
					}
					break;
			}
		}
	}

	return result;
}
/**
 * selectizeで作成した要素の設定値を配列で取得する
 * selectizeで選択された要素はデフォルトでは「,」になっている為、「,」で分割して配列に変換する
 *  id : 値を取得したい要素のid
 */
function dcmsGetSelectizeValuesById(id) {
	var result = [];
	if (!id) {
		return "";
	}

	var value = dcmsGetValueById(id);
	result = value.split(",");

	return result;
}
/**
 * フォーム用の要素を作成
 * 検索時に隠しフォームに隠し要素を追加してsubmitする為、必要な要素を作成する際にしよう
 *  name : 作成する要素のnameを指定する
 *  value : 作成する要素のvalueを指定する
 */
function dcmsCreateInput(name, value) {
	name = name === undefined ? "" : name;
	value = value === undefined ? "" : value;

	var ele = document.createElement("input");
	ele.type = "hidden";
	ele.name  = name;
	ele.value = value;

	return ele;
}
</script>
EOF;
$blogSearchField .= $js . PHP_EOL;


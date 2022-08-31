<?php 
// note: htmlタグを含む検索パラメーター(エンコードされる)のデコード
foreach($_GET as $k=>$v) {
	$_GET[$k] = htmlspecialchars_decode($v);
}
foreach($_POST as $k=>$v) {
	$_POST[$k] = htmlspecialchars_decode($v);
}

// note: 英数字の全半角変換
foreach(array('cell030_from', 'cell030_to', 'cell002', 'keyword') as $convertAlnumElement) {
	if ( isset($_GET[$convertAlnumElement]) ) {
		$_GET[$convertAlnumElement] = convert_alnum($_GET[$convertAlnumElement]);
	}
	if ( isset($_POST[$convertAlnumElement]) ) {
		$_POST[$convertAlnumElement] = convert_alnum($_POST[$convertAlnumElement]);
	}
}

// note: 検索条件の生成
$options['sheet'] = ib_config('sheet/data', 'sheet009');
$options['limit'] = 15;

if ( strlen(ib_get_request('keyword')) ) {
	$options['keyword']['text']  = ib_get_request('keyword');
	$options['keyword']['cells'][] = 'cell005';
	$options['keyword']['cells'][] = 'cell029';
}

if ( strlen(ib_get_request('sort')) && strlen(ib_get_request('order')) ) {
	$method = (ib_get_request('order') == 'asc') ? 'ib_sort_n' : 'ib_sort_nr';
	$options['order'][] = $method(ib_get_request('sort'));
}

// note: 価格帯ドロップダウンの検索条件とキャプション部分生成
// from/toに分けてから検索条件を指定するため、リクエスト変数からの自動ロードを使わず明示指定する
$expr = array();
if ( strlen(ib_get_request('cell030')) ) {
	$range = explode(',', ib_get_request('cell030'));
	if ( strlen($range[0]) ) {
		$options['query']['cell030']['from'] = $range[0];
		$expr[] = ib_number_format($range[0]) . '円以上';
	}
	
	if ( strlen($range[1]) ) {
		$options['query']['cell030']['to'] = $range[1];
		$expr[] = ib_number_format($range[1]) . '円以下';
	}
}
$expr = implode('&nbsp;', $expr);

// note: 発売日／登録日検索条件部分生成
$date_expr = '';
if ( strlen(ib_get_request('date_from')) || strlen(ib_get_request('date_to')) ) {
	$date_expr = array('', '');
	$date_cell = ib_get_request('date_cell');
	if ( strlen(ib_get_request('date_from')) ) {
		$options['query'][$date_cell]['from'] = str_replace('/', '', ib_get_request('date_from'));
		$date_expr[0] = ib_get_request('date_from');
	}
	
	if ( strlen(ib_get_request('date_to')) ) {
		$options['query'][$date_cell]['to'] = str_replace('/', '', ib_get_request('date_to'));
		$date_expr[1] = ib_get_request('date_to');
	}
	$date_expr = ib_get_cell_cname($options['sheet'], $date_cell) . ' ' . implode('&#xFF5E;', $date_expr);
}

// note: 親カテ検索条件部分生成
if ( strlen(ib_get_request('cell003')) ) {
	$options['query']['cell003']['equals'] = '"' . ib_get_request('cell003') . '"';
}

// note: 子カテ検索条件部分生成
if ( strlen(ib_get_request('cell004')) ) {
	$options['query']['cell004']['equals'] = '"' . ib_get_request('cell004') . '"';
}

// note: 公開期間の条件部分生成
$options['query']['cell011']['to']   = date('Ymd');
$options['query']['cell011']['allows_empty'] = true;
$options['query']['cell012']['from'] = date('Ymd');
$options['query']['cell012']['allows_empty'] = true;

// note: 生産終了品は「現行品のみ」で絞ってない限り含める
$options['query']['cell009']['to']   = date('Ymd');
$options['query']['cell009']['allows_empty'] = true;
if ( strlen(ib_get_request('active')) > 0 && ib_get_request('active') == '1' ) {
	$options['query']['cell010']['from'] = date('Ymd');
	$options['query']['cell010']['allows_empty'] = true;
}
elseif ( strlen(ib_get_request('active')) > 0 && ib_get_request('active') == '0' ) {
	$options['query']['cell010']['to'] = date('Ymd', strtotime('yesterday'));
}

// note: キャプション部分の生成
$searchConditionText = '';
$searchConditionText_shorten = '';
if ( ib_get_request('label') ) {
	($category = ib_get_request('cell004'))
		|| ($category = ib_get_request('cell003'));
	$searchConditionText = $searchConditionText_shorten = '「' . $category . '」カテゴリーの商品';
}
else {
	$searchConditionExprs[] = ib_get_request('cell003');
	$searchConditionExprs[] = ib_get_request('cell004');
	$searchConditionExprs[] = ib_get_request('cell005');
	$searchConditionExprs[] = ib_get_request('keyword');
	$searchConditionExprs[] = ib_get_request('cell002');
	$searchConditionExprs[] = ib_get_request('cell030_from') ? ib_number_format(ib_get_request('cell030_from')) . '円以上' : '';
	$searchConditionExprs[] = ib_get_request('cell030_to') ? ib_number_format(ib_get_request('cell030_to')) . '円以下' : '';
	$searchConditionExprs[] = ib_get_request('cell030') ? $expr : '';
	$searchConditionExprs[] = ib_get_request('date_cell') ? $date_expr : '';
	$searchConditionExprs[] = ib_get_request('cell006') ? ib_get_cell_cname($options['sheet'], 'cell006') : '';
	$searchConditionExprs[] = ib_get_request('cell007') ? ib_get_cell_cname($options['sheet'], 'cell007') : '';
	$searchConditionExprs[] = ib_get_request('cell008') ? ib_get_cell_cname($options['sheet'], 'cell008') : '';
	$searchConditionText = strip_tags_ex(trim(implode(' ', array_unique($searchConditionExprs))));
	
	$searchConditionText_shorten = multibyte_text_shorten($searchConditionText, 40);
}

if ( strlen($searchConditionText) ) {
	ib_set_variable('searchConditionText', $searchConditionText_shorten);
}

// note: パンくず
$breadcrumbs = array();
if (  strlen(ib_get_request('cell003')) ) {
	if (  strlen(ib_get_request('cell004')) ) {
		$breadcrumbs[] = 
			'<a href="' . ib_get_page_url('search', array('cell003' => ib_get_request('cell003'), 'label'=>1)) . '">'
			. strip_tags_ex(ib_get_request('cell003'))
			. '</a>';
	}
	else {
		$breadcrumbs[] = strip_tags_ex(ib_get_request('cell003'));
	}
}

if (  strlen(ib_get_request('cell004')) ) {
	// note: カテゴリーラジオリストからの遷移で、親カテゴリーが渡ってこない場合
	if ( !strlen(ib_get_request('cell003')) ) {
		$options_parent['sheet'] = ib_config('sheet/category', 'sheet008');
		$options_parent['autoload_from_request'] = false;
		$options_parent['query']['cell006'] = '"' . ib_get_request('cell004') . '"';
		ib_get_items($options_parent);
		if ( ib_have_items() ) {
			ib_get_the_item();
			$breadcrumbs[] = 
				'<a href="' . ib_get_page_url('search', array('cell003' => ib_get_the_cell('cell002'), 'label'=>1)) . '">'
				. ib_get_the_cell('cell002')
				. '</a>';
			
			if ( strtolower(ib_config('search/method')) === 'post' ) {
				$_POST['cell003'] = ib_get_the_cell('cell002');
			} else {
				$_GET['cell003'] =  ib_get_the_cell('cell002');
			}
		}
	}
	$breadcrumbs[] = strip_tags_ex(ib_get_request('cell004'));
}

if ( !count($breadcrumbs) ) $breadcrumbs[] = '商品検索';
?>
<?php ib_load_header(); ?>
<!--container_st-->
<div id="container">
<div class="clearfix" id="locator">
<div id="pankuzu"><a href="<?php ib_page_url('home'); ?>">Home</a> &gt; <?php echo implode(' &gt; ', $breadcrumbs); ?></div>
</div>

<!--contents_st-->
<div id="contents" class="layout_two_column clearfix">
<?php ib_load_sidebar(); ?>
<!--contents_right_st-->
<div id="contents_left">
<?php
//note: ib_not_searched()関数で簡易に判定できないため、未入力かどうかを個別判定
//(検索を繰返していて前の結果が残っている可能性があるのと、発売日ドロップダウンだけ選択されている場合に対応できない)
$empty = true;
foreach($_GET as $name=>$value) {
	if ( $name != 'date_cell' && strlen($value) ) {
		$empty = false;
		break;
	}
}
foreach($_POST as $name=>$value) {
	if ( $name != 'date_cell' && strlen($value) ) {
		$empty = false;
		break;
	}
}
if( !$empty ) {
	ib_get_items($options);
}
?>

<!--result_box_st-->
<?php if ( ib_have_items() ) : ?>
<div class="clearfix result_box">
<div class="result_text"><?php echo $searchConditionText_shorten; ?>　<span><?php echo ib_get_items_count(); ?>件中/<?php echo ib_get_offset_by_page("first"); ?>-<?php echo ib_get_offset_by_page("last"); ?>件目を表示</span></div>

<div class="mt5">
<dl class="search_sort clearfix">
<dt>絞り込み：</dt>
<dd><ul>
<?php if (strtolower(ib_config('search/method')) === 'post'): ?>
<li><a href="javascript:void(0)" onclick="addSearchCriteria('1', 1);">現行品</a></li>
<li><a href="javascript:void(0)" onclick="addSearchCriteria('0', 1);">販売終了品</a></li>
<li><a href="javascript:void(0)" onclick="addSearchCriteria('' , 1);">すべての製品</a></li>
<?php else: ?>
<li><a href="<?php ib_page_url('search', array('active'=>'1', 'page' => 1), true); ?>">現行品</a></li>
<li><a href="<?php ib_page_url('search', array('active'=>'0', 'page' => 1), true); ?>">販売終了品</a></li>
<li><a href="<?php ib_page_url('search', array('active'=>'' , 'page' => 1), true); ?>">すべての製品</a></li>
<?php endif; ?>
</ul></dd>
</dl>
<?php if (strtolower(ib_config('search/method')) === 'post'): ?>
<script type="text/javascript">
<!--
function addSearchCriteria(active, page){
	$('#main_form input[name="active"]').val(active);
	$('#main_form input[name="page"]').val(page);
	$('#main_form').submit();
	return false;
}
// -->
</script>
<?php endif;?>

<dl class="search_sort clearfix">
<dt>並べ替え：</dt>
<dd><ul>
<?php if (strtolower(ib_config('search/method')) === 'post'): ?>
<li><a href="javascript:void(0)" onclick="addSearchOrder('cell030', 'asc' , 1);">安い順</a></li>
<li><a href="javascript:void(0)" onclick="addSearchOrder('cell030', 'desc', 1);">高い順</a></li>
<li><a href="javascript:void(0)" onclick="addSearchOrder('cell009', 'desc', 1);">新しい順</a></li>
<li><a href="javascript:void(0)" onclick="addSearchOrder('cell009', 'asc' , 1);">古い順</a></li>
<?php else: ?>
<li><a href="<?php ib_page_url('search', array('sort'=>'cell030', 'order' => 'asc' , 'page' => 1), true); ?>">安い順</a></li>
<li><a href="<?php ib_page_url('search', array('sort'=>'cell030', 'order' => 'desc', 'page' => 1), true); ?>">高い順</a></li>
<li><a href="<?php ib_page_url('search', array('sort'=>'cell009', 'order' => 'desc', 'page' => 1), true); ?>">新しい順</a></li>
<li><a href="<?php ib_page_url('search', array('sort'=>'cell009', 'order' => 'asc' , 'page' => 1), true); ?>">古い順</a></li>
<?php endif; ?>
</ul></dd>
</dl>
<?php if (strtolower(ib_config('search/method')) === 'post'): ?>
<script type="text/javascript">
<!--
function addSearchOrder(sort, order, page){
	$('#main_form input[name="sort"]').val(sort);
	$('#main_form input[name="order"]').val(order);
	$('#main_form input[name="page"]').val(page);
	$('#main_form').submit();
	return false;
}
// -->
</script>
<?php endif;?>

</div>
</div>
<!--result_box_end-->

<?php if ( ib_get_max_num_pages() > 1 ) : ?>
<!--pager_top_st-->
<div id="pager_top">
<div class="pager">
<?php echo ib_paginate_links($options); ?>

<?php if (strtolower(ib_config('search/method')) === 'post'): ?>
<?php 
	$options[__w::pagination]['type'] = 'array';
	$paginateOptions = ib_paginate_links($options);
?>
<script type="text/javascript">
<!--
function getUrlVars(url) 
{ 
    var vars = [], hash; 
    var hashes = url.slice(url.indexOf('?') + 1).split('&'); 
    for(var i = 0; i < hashes.length; i++) { 
        hash = hashes[i].split('='); 
        vars.push(hash[0]); 
        vars[hash[0]] = hash[1]; 
    } 
    return vars; 
}
$('a.page-numbers').click(function(){
	var url = $(this).attr('href');
	var params = getUrlVars(url);
	var page = params['page'];
	$('#main_form input[name="page"]').val(page);
	$('#main_form').submit();
	return false;
});
// -->
</script>
<?php endif;?>

</div>
</div>
<!--pager_top_end-->
<?php endif; ?>

<!--search_after_st-->
<div class="search_after">

<!--item_box_wrapper_st-->
<ul class="item_box_wrapper clearfix lineup">
<?php while(ib_have_items()): ib_get_the_item(); ?>
<?php 	$item_link = ib_get_page_url('item', array('cell003' => ib_get_the_cell('cell003'), 'cell004' => ib_get_the_cell('cell004'), 'name' => ib_get_the_cell('cell005') , 'id' => ib_get_the_id(), 'label' => 1));?>
<?php 	$image_file = get_value_from_csv(ib_get_the_cell('cell021')); ?>
<!--item_box_st-->

<li>
<div class="top"> </div>
<div class="boxInner">
<table class="layout" cellspacing="0" cellpadding="0" border="0">
<tr>
<td class="search_item_photo"><a href="<?php echo $item_link; ?>"><img src="<?php product_image_url($image_file); ?>" alt="<?php ib_the_cell('cell005'); ?>" /></a></td>
</tr>
<tr>
<td class="fs80">[<?php ib_the_cell('cell004'); ?>]</td>
</tr>
<tr>
<td class="search_item_name"><a href="<?php echo $item_link; ?>"><?php ib_the_cell('cell005'); ?></a></td>
</tr>
<tr>
<td class="fs90"><?php ib_the_cell('cell024'); ?></td>
</tr>
<tr>
<td class="fs90"><?php ib_cell_cname('cell002'); ?>:<?php ib_the_cell('cell002'); ?></td>
</tr>
<tr>
<td class="fs90"><?php ib_cell_cname('cell030'); ?>:<?php ib_the_cell('cell030'); ?>円</td>
</tr>
</table>
</div>
<div class="bottom"> </div>
</li>























<li>
<div class="top"> </div>
<div class="boxInner">


<table class="layout" cellspacing="0" cellpadding="0" border="0">
<tr>
<td class="search_item_photo"><a href="<?php echo $item_link; ?>"><img src="<?php product_image_url($image_file); ?>" alt="<?php ib_the_cell('cell005'); ?>" /></a></td>
</tr>
<tr>
<td class="fs80">[<?php ib_the_cell('cell004'); ?>]</td>
</tr>
<tr>
<td class="search_item_name"><a href="<?php echo $item_link; ?>"><?php ib_the_cell('cell005'); ?></a></td>
</tr>
<tr>
<td class="fs90"><?php ib_the_cell('cell024'); ?></td>
</tr>
<tr>
<td class="fs90"><?php ib_cell_cname('cell002'); ?>:<?php ib_the_cell('cell002'); ?></td>
</tr>
<tr>
<td class="fs90"><?php ib_cell_cname('cell030'); ?>:<?php ib_the_cell('cell030'); ?>円</td>
</tr>
</table>


</div>
<div class="bottom"> </div>
</li>
<li>
<div class="top"> </div>
<div class="boxInner">


<table class="layout" cellspacing="0" cellpadding="0" border="0">
<tr>
<td class="search_item_photo"><a href="<?php echo $item_link; ?>"><img src="<?php product_image_url($image_file); ?>" alt="<?php ib_the_cell('cell005'); ?>" /></a></td>
</tr>
<tr>
<td class="fs80">[<?php ib_the_cell('cell004'); ?>]</td>
</tr>
<tr>
<td class="search_item_name"><a href="<?php echo $item_link; ?>"><?php ib_the_cell('cell005'); ?></a></td>
</tr>
<tr>
<td class="fs90"><?php ib_the_cell('cell024'); ?></td>
</tr>
<tr>
<td class="fs90"><?php ib_cell_cname('cell002'); ?>:<?php ib_the_cell('cell002'); ?></td>
</tr>
<tr>
<td class="fs90"><?php ib_cell_cname('cell030'); ?>:<?php ib_the_cell('cell030'); ?>円</td>
</tr>
</table>


</div>
<div class="bottom"> </div>
</li>
<li>
<div class="top"> </div>
<div class="boxInner">


<table class="layout" cellspacing="0" cellpadding="0" border="0">
<tr>
<td class="search_item_photo"><a href="<?php echo $item_link; ?>"><img src="<?php product_image_url($image_file); ?>" alt="<?php ib_the_cell('cell005'); ?>" /></a></td>
</tr>
<tr>
<td class="fs80">[<?php ib_the_cell('cell004'); ?>]</td>
</tr>
<tr>
<td class="search_item_name"><a href="<?php echo $item_link; ?>"><?php ib_the_cell('cell005'); ?></a></td>
</tr>
<tr>
<td class="fs90"><?php ib_the_cell('cell024'); ?></td>
</tr>
<tr>
<td class="fs90"><?php ib_cell_cname('cell002'); ?>:<?php ib_the_cell('cell002'); ?></td>
</tr>
<tr>
<td class="fs90"><?php ib_cell_cname('cell030'); ?>:<?php ib_the_cell('cell030'); ?>円</td>
</tr>
</table>


</div>
<div class="bottom"> </div>
</li>
<li>
<div class="top"> </div>
<div class="boxInner">


<table class="layout" cellspacing="0" cellpadding="0" border="0">
<tr>
<td class="search_item_photo"><a href="<?php echo $item_link; ?>"><img src="<?php product_image_url($image_file); ?>" alt="<?php ib_the_cell('cell005'); ?>" /></a></td>
</tr>
<tr>
<td class="fs80">[<?php ib_the_cell('cell004'); ?>]</td>
</tr>
<tr>
<td class="search_item_name"><a href="<?php echo $item_link; ?>"><?php ib_the_cell('cell005'); ?></a></td>
</tr>
<tr>
<td class="fs90"><?php ib_the_cell('cell024'); ?></td>
</tr>
<tr>
<td class="fs90"><?php ib_cell_cname('cell002'); ?>:<?php ib_the_cell('cell002'); ?></td>
</tr>
<tr>
<td class="fs90"><?php ib_cell_cname('cell030'); ?>:<?php ib_the_cell('cell030'); ?>円</td>
</tr>
</table>


</div>
<div class="bottom"> </div>
</li>













<!--item_box_end-->
<?php endwhile; ?>

</ul>
<!--item_box_wrapper_end-->

<?php if ((int)ib_get_request('page') == ib_get_max_num_pages() ): ?>
<div id="search_text_end">
<p><?php echo ib_get_items_count(); ?> 件の商品が見つかりました。<br />
お探しの商品が表示されない場合は、検索条件を変えてもう一度検索してください。</p>
</div>
<?php endif; ?>

</div>
<!--search_after_end-->

<?php if ( ib_get_max_num_pages() > 1 ) : ?>
<!--pager_bottom_st-->
<div id="pager_bottom">
<div class="pager">
<?php echo ib_paginate_links($options); ?>
</div>
</div>
<!--pager_bottom_end-->
<?php endif; /* if ( ib_get_max_num_pages() > 1 ) */ ?>
<?php elseif ( $empty ) : /*if ( ib_have_items() )*/ ?>
<!--result_box_st-->
<div class="clearfix result_box">
<div class="result_text"><strong>検索結果：</strong>　0件</div>
</div>
<!--result_box_end-->

<!--search_error_st-->
<div id="search_error">
検索条件を指定して下さい。
</div>
<!--search_error_end-->

<?php else : /*if ( ib_have_items() )*/ ?>

<?php 
//note: 代替検索
$alt_results_count = 3;
$alt_results = array();

if ( strlen(ib_get_request('cell005')) || strlen(ib_get_request('keyword')) ) {
	$source = strlen(ib_get_request('cell005')) ? ib_get_request('cell005') : ib_get_request('keyword');
	$words = explode(' ', $source); // 半角SP
	if ( count($words) <= 1 ) {
		$words = explode('　', $source); // 全角SP
	}
	
	if ( count($words) > 1 ) {
		$options_alt['sheet'] = ib_config('sheet/data', 'sheet009');
		$options_alt['limit'] = 6;
		$options_alt['autoload_from_request'] = false;
		// note: 公開期間
		$options_alt['query']['cell011']['to']   = date('Ymd');
		$options_alt['query']['cell012']['from'] = date('Ymd');
		$options_alt['query']['cell012']['allows_empty'] = true;
		$options_alt['order'][] = ib_sort_nr('cell007');
		$options_alt['order'][] = ib_sort_nr('cell009');
		foreach($words as $word) {
			$options_alt['query']['cell005'] = $word;
			//echo "<pre>"; print_r($options['query']); echo "</pre>";
			$result = ib_get_items($options_alt);
			if ( $result->getTotalCount() > 0 ) {
				$alt_results[$word] = $result;
			}
			if ( count($alt_results) == $alt_results_count ) break;
		}
//		print_r($results);
	}
}
?>

<?php if ( count($alt_results) > 0 ): ?>
<div class="search_unfound">”<?php echo $searchConditionText; ?>”の検索に一致する商品はありませんでした。 </div>
<?php foreach($alt_results as $word => $result): ib_set_items($result); ?>
<!--result_box_st-->
<div class="clearfix result_box">
<div class="result_text"><strong>「<?php echo $word; ?>」の検索結果</strong>　<?php echo ib_get_items_count(); ?>件中/<?php echo ib_get_offset_by_page("first"); ?>-<?php echo ib_get_offset_by_page("last"); ?>件目を表示</div>
</div>
<!--result_box_end-->

<!--search_after_st-->
<div class="search_after">
<!--item_box_wrapper_st-->
<div class="item_box_wrapper">

<?php while(ib_have_items()): ib_get_the_item(); ?>
<?php 	$item_link = ib_get_page_url('item', array('cell003' => ib_get_the_cell('cell003'), 'cell004' => ib_get_the_cell('cell004'), 'name' => ib_get_the_cell('cell005') , 'id' => ib_get_the_id(), 'label' => 1));?>
<!--item_box_st-->
<div class="item_box">
<div class="item_photo"><a href="<?php echo $item_link; ?>" target="_blank"><img src="<?php echo product_image_url(get_value_from_csv(ib_get_the_cell('cell021'), 0)); ?>" alt="<?php ib_the_cell('cell005'); ?>" /></a></div>
<p class="item_name"><a href="<?php echo $item_link; ?>" target="_blank"><?php ib_the_cell('cell005'); ?></a></p>
</div>
<!--item_box_end-->

<?php endwhile; /* while(ib_have_items()) */ ?>
</div>
<!--item_box_wrapper_end-->

<!--item_box_st-->
<div class="search_text_link">
<p><a href="<?php ib_page_url('search', array('cell005' => $word)); ?>">「<?php echo $word; ?>」の検索結果をすべて見る</a></p>
</div>
<!--item_box_end-->

</div>
<!--search_after_end-->
<?php endforeach /* foreach($alt_results as $result) */?>
<?php else: /* if ( count($alt_results) > 0 ) */ ?>
<!--result_box_st-->
<div class="clearfix result_box">
<div id="result_text"><strong>検索結果：<?php echo $searchConditionText_shorten; ?></strong>　0件</div>
</div>
<!--result_box_end-->
<!--search_error_st-->
<div id="search_error">
”<?php echo $searchConditionText; ?>”の検索に一致する商品はありませんでした。
</div>
<!--search_error_end-->
<?php endif; /* if ( count($alt_results) > 0 ) */ ?>
<?php endif; /*if ( ib_have_items() )*/ ?>

</div>
</div>
</div>
<!--container_end, contents_end, contents_right_end-->
<?php ib_load_footer(); ?>
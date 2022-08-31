<?php
/**
 * 公開サイト サイト内検索
 */
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<meta name="format-detection" content="telephone=no">
	<title><?php echo $this->metaTitle;?></title>
	<meta name="keywords" content="<?php echo $this->metaKeyword;?>" />
	<meta name="description" content="<?php echo $this->metaDescription;?>" />
	<?php echo $this->req['contentsBaseLayoutInfo']['contentsBaseHead'] . PHP_EOL;?>
	<?php echo $this->templateParam['googleAnalytics'];?>
</head>

<body id="common" class="common form_area_wrap page_###_DCMS_PAGE_FILE_NAME_###">

	<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:HEADER_###');?>

	<div id="container">

	<div id="locator_t_under"><div class="inner"><a href="/index.html">HOME</a>&nbsp;&gt;&nbsp;検索結果一覧</div></div>

	<div id="pagetitle" class="pagename">
		<h1 class="pagetitle inner">検索結果一覧</h1>
	</div>

	<main class="inner"><div style="width:100%;">
	<div class="m5 txt_r">
		<!-- pager -->
		<div>総数：<?php echo $this->pager->searchCount;?>件 ／ <?php echo $this->pager->startCount;?> ～ <?php echo $this->pager->endCount;?>件</div>
		<div><?php echo $this->searchPageLink();?></div>
		<!-- // pager -->
	</div>
	<h2 class="title03_blb2">検索結果</h2>
	<!-- list -->
	<?php
	reset($this->list);
	while(list($contentsNum, $val) = each($this->list)){$title = $val['contentsName'];
	if (mb_strlen($title) > 70) {
		$title = mb_substr($title, 0, 70) . '...';
		}$titleLink = '<a href="' . $val['folderUrlFullPath'] . $val['contentsFileName'] . '" target="_blank">' . $title . '</a>';        // ブロックの先頭から
		$description = $val['blockContents'];        // HTML特殊文字を有効化
		$description = cmnUtil::reverseHtmlEntitie($description);
		if (mb_strlen($description) > 100) {
			$description = mb_substr($description, 0, 100) . '...';
		}
	?>
	<p class="txt_link arr fs120_bold"><?php echo $titleLink;?></p>
	<p class="m25 mt5"><?php echo $description;?></p>
	<?php
	}
	?>
	<!-- // list -->
	<div class="sub_search clearfix">
		<!-- search form -->
		<form method="post" id="fSearch" action="/dcms-search/">
		<input class="search_txt" placeholder="検索したいテキストを入力" type="text" name="schKeyword" value="<?php echo $this->req['schKeyword'];?>" />
		<input class="submit_btn" type="submit" value="サイト内検索 " />
		</form>
		<!-- // search form -->
	</div>

	<!--<div id="contents_right">
	<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:RIGHTNAVI_###');?>
	</div>--><!--contents_right_end-->

	</div></main>

	</div><!--container-->

	<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:FOOTER_###');?>

	<form method="post" id="fPageChg"><div><?php echo $this->hiddenParams($this->paramTrans, 'fPageChg');?></div></form>

</body>
</html>
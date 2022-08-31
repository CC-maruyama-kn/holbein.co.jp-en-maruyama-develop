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
<?php
    echo $this->templateParam['googleAnalytics'];
?>
</head>


<body id="common" class="common form_area_wrap page_###_DCMS_PAGE_FILE_NAME_###">

<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:HEADER_###');?>


<div class="pagename_wrap">
<div id="pagetitle" class="pagename">
  <h2 class="inner">検索結果一覧</h2>
</div>
</div>

<div id="locator" class="loca">
<div class="inner">
<a href="/index.html">HOME</a>&nbsp;&gt;&nbsp;検索結果一覧
</div>
</div>


<main id="contents" class="clearfix">
<div id="contents_left">

<div class="m20 sub_search clearfix">
<!-- search form -->
<form method="post" id="fSearch">
<input class="search_txt" type="submit" value="サイト内検索 " />
<input class="submit_btn" type="text" name="schKeyword" value="<?php echo $this->req['schKeyword'];?>" />
</form>
<!-- // search form -->
</div>


<div class="m40_pc m30_tablet m20_sp">
<!-- pager -->
<div>総数：<?php echo $this->pager->searchCount;?>件 ／ <?php echo $this->pager->startCount;?> ～ <?php echo $this->pager->endCount;?>件</div>
<div><?php echo $this->searchPageLink();?></div>
<!-- // pager -->
</div>

<h3 class="title03_blb2">検索結果</h3>

<!-- list -->
<?php
    reset($this->list);
    while(list($contentsNum, $val) = each($this->list)){        $title = $val['contentsName'];
        if (mb_strlen($title) > 70) {
            $title = mb_substr($title, 0, 70) . '...';
        }        $titleLink = '<a href="' . $val['folderUrlFullPath'] . $val['contentsFileName'] . '" target="_blank">' . $title . '</a>';        // ブロックの先頭から
        $description = $val['blockContents'];        // HTML特殊文字を有効化
        $description = cmnUtil::reverseHtmlEntitie($description);        if (mb_strlen($description) > 100) {
            $description = mb_substr($description, 0, 100) . '...';
        }
?>
<p class="txt_link arr fs120_bold"><?php echo $titleLink;?></p>
<p class="m20 mt5"><?php echo $description;?></p>
<?php
    }
?>
<!-- // list -->


</div><!--contents_left_end-->
<div id="contents_right">
<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:RIGHTNAVI_###');?>
</div><!--contents_right_end-->
</main><!--contents_end-->



<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:FOOTER_###');?>

<form method="post" id="fPageChg">
<div>
<?php echo $this->hiddenParams($this->paramTrans, 'fPageChg');?>
</div>
</form>

</body>
</html>
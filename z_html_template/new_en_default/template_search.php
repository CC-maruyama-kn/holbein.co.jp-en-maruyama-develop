<?php
/**
 * 公開サイト サイト内検索
 */
?>
<?php echo '<' . '?xml version="1.0" encoding="utf-8"?' . '>' . PHP_EOL;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title><?php echo $this->metaTitle;?></title>
<meta name="keywords" content="<?php echo $this->metaKeyword;?>" />
<meta name="description" content="<?php echo $this->metaDescription;?>" />
<base href="<?php echo $this->baseHrefUrl;?>" />
<?php echo $this->req['contentsBaseLayoutInfo']['contentsBaseHead'] . PHP_EOL;?>
</head>

<body id="common" class="common form_area_wrap">
<a name="page_top" id="page_top"></a>
<div id="wrapper">
<div id="container">

<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:HEADER_###');?>
<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:LEFTNAVI_###');?>

<!--contents,contents_left_st-->
<div id="contents" class="clearfix">
<div id="contents_left">

<!-- search form -->
<form method="post" id="fSearch">
<input type="text" name="schKeyword" value="<?php echo $this->req['schKeyword'];?>" />
&nbsp;&nbsp;
<input type="submit" value=" サイト内検索 " />
</form>
<!-- // search form -->

<br />
<!-- pager -->
<table border="0">
<tr>
<td>総数：<?php echo $this->pager->searchCount;?>件 ／ <?php echo $this->pager->startCount;?> ～ <?php echo $this->pager->endCount;?>件</td>
<td width="100">&nbsp;</td>
<td align="rigth"><?php echo $this->searchPageLink();?></td>
</tr>
</table>
<!-- // pager -->

<br />
[検索結果]
<br />
<br />
<!-- list -->
<table border="0" cellpadding="0" cellspacing="0">
<?php
    reset($this->list);
    while(list($contentsNum, $val) = each($this->list)){

        $title = $val['contentsName'];
        if (mb_strlen($title) > 70) {
            $title = mb_substr($title, 0, 70) . '...';
        }

        $titleLink = '<a href="' . $val['folderUrlFullPath'] . $val['contentsFileName'] . '" target="_blank">' . $title . '</a>';

        // ページ説明文
        if ($val['contentsDescription'] != '') {
            $description = $val['contentsDescription'];

        // ブロックの先頭から
        } else {
            $description = $val['blockContents'];
        }

        // HTML特殊文字を有効化
        $description = cmnUtil::reverseHtmlEntitie($description);

        if (mb_strlen($description) > 100) {
            $description = mb_substr($description, 0, 100) . '...';
        }
?>
<tr>
<th colspan="2" class="txt_l"><?php echo $titleLink;?></th>
</tr>
<tr>
<td width="50">&nbsp;</td>
<td width="500"><?php echo $description;?></td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
<?php
    }
?>
</table>
<!-- // list -->

</div>
<!--contents_left_end-->

<!--contents_right_st-->
<div id="contents_right">
<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:RIGHTNAVI_###');?>
</div>
</div>
<!--contents_right,contents_end-->

</div>
<!--container_end-->


<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:FOOTER_###');?>


<?php
    echo $this->templateParam['googleAnalytics'];
?>

<form method="post" id="fPageChg">
<div>
<?php echo $this->hiddenParams($this->paramTrans, 'fPageChg');?>
</div>
</form>

</div>
<!--wrapper_end-->

</body>
</html>
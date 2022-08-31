<?php
/**
 * 公開サイト サイト内検索
 */
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">-->
<title><?php echo $this->metaTitle;?></title>
<meta name="keywords" content="<?php echo $this->metaKeyword;?>" />
<meta name="description" content="<?php echo $this->metaDescription;?>" />
<?php echo $this->req['contentsBaseLayoutInfo']['contentsBaseHead'] . PHP_EOL;?>
<?php
    echo $this->templateParam['googleAnalytics'];
?>
</head><body class="common form_area_wrap">
<div id="wrapper">
<div id="container">
<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:HEADER_###');?>
<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:LEFTNAVI_###');?>
<div id="main">
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
<table border="0" cellpadding="0" cellspacing="0" id="dcms_schtable">
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
<tr>
<th colspan="2" class="dcms_titlelink"><?php echo $titleLink;?></th>
</tr>
<tr>
<td width="50">&nbsp;</td>
<td width="500" class="dcms_description"><?php echo $description;?></td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
<?php
    }
?>
</table>
<!-- // list -->
</div><!--contents_left_end-->
<div id="contents_right">
<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:RIGHTNAVI_###');?>
</div><!--contents_right_end-->
</div><!--contents_end-->
</div><!--main_end-->
<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:FOOTER_###');?>
</div><!--container_end-->
<form method="post" id="fPageChg">
<div>
<?php echo $this->hiddenParams($this->paramTrans, 'fPageChg');?>
</div>
</form></div><!--wrapper_end--></body>
</html>
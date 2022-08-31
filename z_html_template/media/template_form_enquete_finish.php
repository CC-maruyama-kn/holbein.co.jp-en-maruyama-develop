<?php
/**
 * 公開サイト アンケート フォーム 完了
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
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />
<meta name="format-detection" content="telephone=no" />
<?php echo $this->convertShareSslUrl($this->req['contentsBaseLayoutInfo']['contentsBaseHead']) . PHP_EOL;?>
<link rel="stylesheet" href="<?php echo $shareSslSiteRoot;?>/dcms_public/css/validationEngine.jquery.css" type="text/css"/>
<?php
    // 送信後自動ジャンプ先リンク設定時
    if ($this->req['contentsFormInfo']['thanksLinkUrl'] != '') {
?>
<script type="text/javascript">
<!-- 
function jumpThanksLink(){
    location.href = '<?php echo $this->req['contentsFormInfo']['thanksLinkUrl'];?>';
}
//-->
</script>
<?php 
    }
?>
</head>

<?php
    // 送信後自動ジャンプ先リンク設定時
    if ($this->req['contentsFormInfo']['thanksLinkUrl'] != '') {
?>
<body id="common" class="common form_area_wrap" onload="setTimeout('jumpThanksLink()',3000);">
<?php
    } else {
?>
<body>
<?php
    }
?>
<div id="wrapper">
<div id="container">

<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:HEADER_###'));?>

<div id="locator">&nbsp;</div>

<div id="contents" class="clearfix">


<!--start form_contact_main-->
<div class="contact_finish">

<p class="m20">送信が完了しました。</p>
<!--start Thanksページテキスト-->
<?php echo nl2br($this->convertShareSslUrl($this->req['contentsFormInfo']['thanksPageStr']));?>
<!--end Thanksページテキスト-->
</div>
<!--end form_contact_main-->


</div>
</div>
<!--contents, container_end-->


<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:FOOTER_###'));?>


</div>
<!--wrapper_end-->


<?php
    if ($this->req['contentsBaseLayoutInfo']['contentsBaseGoogleAnalytics'] != '') {
?>
<!--start Google Analytics -->
<?php echo $this->convertShareSslUrl($this->req['contentsBaseLayoutInfo']['contentsBaseGoogleAnalytics']);?>
<!--end Google Analytics -->
<?php
    }
?>

<?php
    if ($this->req['contentsFormInfo']['conversionTag'] != '') {
?>
<!--start コンバージョンタグ -->
<?php echo $this->convertShareSslUrl($this->req['contentsFormInfo']['conversionTag']);?>
<!--end コンバージョンタグ -->
<?php
    }
?>


</body>
</html>

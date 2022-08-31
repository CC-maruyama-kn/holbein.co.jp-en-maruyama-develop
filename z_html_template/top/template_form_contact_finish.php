<?php
/**
 * 公開サイト お問い合わせ フォーム 完了
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
<?php echo $this->convertShareSslUrl($this->req['contentsBaseLayoutInfo']['contentsBaseHead']) . PHP_EOL;?>
<link rel="stylesheet" href="<?php echo $shareSslSiteRoot;?>/dcms_public/css/form_skin.css" type="text/css"/>
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
<?php
    if ($this->req['contentsBaseLayoutInfo']['contentsBaseGoogleAnalytics'] != '') {
?>
<!--start Google Analytics -->
<?php echo $this->convertShareSslUrl($this->req['contentsBaseLayoutInfo']['contentsBaseGoogleAnalytics']);?>
<!--end Google Analytics -->
<?php
    }
?><?php
    if ($this->req['contentsFormInfo']['conversionTag'] != '') {
?>
<!--start コンバージョンタグ -->
<?php echo $this->convertShareSslUrl($this->req['contentsFormInfo']['conversionTag']);?>
<!--end コンバージョンタグ -->
<?php
    }
?>
</head><?php
    // 送信後自動ジャンプ先リンク設定時
    if ($this->req['contentsFormInfo']['thanksLinkUrl'] != '') {
?>
<body class="common form_area_wrap" onLoad="setTimeout('jumpThanksLink()',3000);">
<?php
    } else {
?>
<body>
<?php
    }
?><div id="wrapper">
<div id="container">
<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:HEADER_###'));?>
<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:LEFTNAVI_###'));?>
<div id="contents">
<h2 id="subtitle02"><?php echo $this->req['contentsInfo']['contentsName'];?></h2>
<div id="form_intro">送信が完了しました。</div>
<!--start form_contact_main-->
<div id="form_contact_main">
<!--start Thanksページテキスト-->
<?php echo nl2br($this->convertShareSslUrl($this->req['contentsFormInfo']['thanksPageStr']));?>
<!--end Thanksページテキスト-->
</div><!--form_contact_main_end-->
</div><!--contents_end--></div><!--container_end-->
<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:FOOTER_###'));?>
</div><!--wrapper_end-->
</body>
</html>
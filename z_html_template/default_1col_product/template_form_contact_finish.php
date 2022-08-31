<?php
/**
 * 公開サイト お問い合わせ フォーム 完了
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
<body id="common" class="common form_area_wrap page_###_DCMS_PAGE_FILE_NAME_###" onLoad="setTimeout('jumpThanksLink()',3000);">
<?php
    } else {
?>
<body class="page_###_DCMS_PAGE_NAME_###">
<?php
    }
?>


<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:HEADER_###'));?>

<div id="wrapper">



			<div class="pagetitle_area">
				<!--↓↓↓パンくず↓↓↓-->
				<div id="locator" class="loca">
					<div class="inner">
						<?php 
    // ページナビ (パンくずリスト)
    echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_BODY_PAGE_NAVI_###'));
?>
					</div>
				</div>
				<!--↑↑↑パンくず↑↑↑-->
			</div>








<main id="contents" class="clearfix">
<div class="contents_inner cf">

<div class="pagename_wrap">
<div id="pagetitle" class="pagename">
<h2 class="inner"><span class="pagetitle_eng">COMPLETED</span>送信完了</h2>
</div>
</div>


<div id="form_intro">送信が完了しました。</div>
<!--start form_contact_main-->
<div id="form_contact_main">
<!--start Thanksページテキスト-->
<?php echo nl2br($this->convertShareSslUrl($this->req['contentsFormInfo']['thanksPageStr']));?>
<!--end Thanksページテキスト-->
</div><!--form_contact_main_end-->

</div>

<aside id="contents_right">
<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:RIGHTNAVI_###'));?>
</aside>

</main>


</div>
<!-- // wrapper_end -->

<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:FOOTER_###'));?>


</body>
</html>
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
	<script src="/dcms_media/js/jquery-1.11.1.min.js"></script>
	<script>
		$(function() {
			$('.datep').datepicker({
				minDate: 0
			});
			//header gnavi
			$("header.template_c2 .gnavi_btn_sp").on("click", function() {
				var windowWidth = window.innerWidth;
				$("header.template_c2 .gnavi_area").slideToggle();
				$("header.template_c2 .gnavi_btn_sp").toggleClass("active");
			});
			var $win = $(window);
			$win.on('load resize',function(){
				var windowWidth = window.innerWidth;
				if(windowWidth <= 690){
					$('header.template_c2 .gnavi_area').insertAfter('#header_area');
				}
			});
		});
		if (navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/)) {
			$(function() {
				$('.tel').each(function() {
					var str = $(this).html();
					if ($(this).children().is('img')) {
						$(this).html($('<a>').attr('href', 'tel:' + $(this).children().attr('alt').replace(/-/g, '')).append(str + '</a>'));
						} else {
						$(this).html($('<a>').attr('href', 'tel:' + $(this).text().replace(/-/g, '')).append(str + '</a>'));
					}
				});
			});
		}
	</script>
<?php
	// 送信後自動ジャンプ先リンク設定時
	if ($this->req['contentsFormInfo']['thanksLinkUrl'] != '') {
?>
<script type="text/javascript">
	function jumpThanksLink(){
		location.href = '<?php echo $this->req['contentsFormInfo']['thanksLinkUrl'];?>';
	}
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
</head>


<?php
	// 送信後自動ジャンプ先リンク設定時
	if ($this->req['contentsFormInfo']['thanksLinkUrl'] != '') {
?>
<body id="sub" class="common form_area_wrap page_###_DCMS_PAGE_FILE_NAME_###" onLoad="setTimeout('jumpThanksLink()',0);">
<?php
	} else {
?>
<body id="sub" class="page_###_DCMS_PAGE_NAME_###">
<?php
}
?>

<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:HEADER_###'));?>

<div class="content">
<div id="locator">
	<ol class="inner" itemscope itemtype="http://schema.org/BreadcrumbList">
	<?php
	// ページナビ (パンくずリスト)
		echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_BODY_PAGE_NAVI_###'));
	?>
	</ol>
</div>
	<div class="inner">
			<ul class="m40_pc m40_tablet m20_sp mt80_pc mt70_tablet mt50_sp formflow">
				<li class="prev odd">
					<span>入力画面</span>
				</li>
				<li class="age odd">
					<span>入力内容の確認</span>
				</li>
				<li class="fin active">
					<span>送信完了</span>
				</li>
			</ul>
			<div class="inner m100 m50_sp">
				<p class="m50 txt_c">送信が完了しました。</p>
				<p class="m50 fs160_bold txt_c">お問い合わせ<br class="sp">ありがとうございます。</p>
				<p class="m70 txt_c">担当者より<br class="sp">折り返しご連絡させていただきます。</p>
				<div class="btnW"><a href="/">トップへ戻る</a></div>
			</div>
	</div>
</div>

<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:FOOTER_###'));?>

</body>
</html>

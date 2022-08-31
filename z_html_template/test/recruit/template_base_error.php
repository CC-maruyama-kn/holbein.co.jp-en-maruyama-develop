<?php
/**
	* 公開サイト エラー
	*/
	// 共有SSLのサイトルート
	$shareSslSiteRoot = '';    // 共有SSLの時
	if ($this->req['shareSslFlg'] == '1') {
	// 絶対Pathの前に設定用
	$shareSslSiteRoot = mb_substr($this->config->shareSsl->shareSslRoot, 0, -1);
	}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<meta name="format-detection" content="telephone=no">
	<title>404エラー｜やる気スイッチキャリア</title>
	<meta name="keywords" content="教育,英語,外国人,バイリンガル,英会話講師,外国人講師,人材紹介,人材派遣,ALT" />
	<meta name="description" content="ご指定のURLは、リンクが切れているか存在しません。サイトマップよりご希望のページにリンクしてください。" />
	<?php echo $this->convertShareSslUrl($this->req['contentsBaseLayoutInfo']['contentsBaseHead']) . PHP_EOL;?>
	<?php
	if (isset($this->req['contentsBaseLayoutInfo']['contentsBaseGoogleAnalytics']) !== FALSE &&
	$this->req['contentsBaseLayoutInfo']['contentsBaseGoogleAnalytics'] != '') {
	?>
	<!--start Google Analytics -->
	<?php echo $this->convertShareSslUrl($this->req['contentsBaseLayoutInfo']['contentsBaseGoogleAnalytics']);?>
	<!--end Google Analytics -->
	<?php
	}
	?>


<!-- <style>
	body.notice_area_wrap #container{
		width: 100vw;
		background: url(/dcms_media/image/404_bg.png) no-repeat center 60px / auto 310px;
		padding: calc(310px + 5% + 60px) 0 5%;
	}
	@media only screen and (max-width: 768px) {
		body.notice_area_wrap #container{
			padding: calc(200px + 7% + 40px) 0 5%;
			background-size: auto 200px;
			background-position: center 40px;
		}
	}-->
<style>
	.ctaArea{
		display: none;
	}
	.subtitle02+p{
		margin-top: 0;
	}
</style>


</head>


<body id="sub" class="common notice_area_wrap page_###_DCMS_PAGE_FILE_NAME_###">

<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:HEADER_###'));?>
<div class="content">
	<div id="pagetitle" style="background-image: url('/dcms_media/image/pagetitle_bg_policy.jpg');">
  <h1 class="pagetitle inner">ページは存在しません</h1>
</div>
<div id="locator">
	<ol class="inner" itemscope="" itemtype="http://schema.org/BreadcrumbList">
		<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
			<a href="/" itemprop="item">
				<span itemprop="name">HOME</span>
			</a>
			<meta itemprop="position" content="1">
		</li>
		<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
			<span itemprop="name">ページは存在しません</span>
			<meta itemprop="position" content="2">
		</li>
	</ol>
</div>
	<div class="inner">
		<div class="notice_section">
			<?php
				if ($this->errorType == 'systemError') {
			?>
			<div class="m120 m80_tablet m60_sp">
				<h2 class="subtitle02">只今、混み合っている為、アクセスできません。</h2>
				<p class="txt_ccl">しばらく経ってから再度、アクセスしてください。</p>
				<div class="btn2 mt50 mt10_sp">
					<div class="btnW "><a href="<?php echo $this->baseUrl;?>">トップページへ</a></div>
					<div class="btnW"> <a href="<?php echo $this->baseUrl;?>sitemap.html">サイトマップへ</a></div>
				</div>
			</div>
			<div>
				<h2 class="subtitle02">It is currently crowded and cannot be accessed.</h2>
				<p class="txt_ccl">Please access again after a while.</p>
				<div class="btn2 mt50 mt10_sp">
					<div class="btnW "><a href="/en/">Top page</a></div>
					<div class="btnW"> <a href="<?php echo $this->baseUrl;?>sitemap.html">To site map</a></div>
				</div>
			</div>
			<?php
				} elseif ($this->errorType == 'pageNone') {
			?>
			<div class="m120 m80_tablet m60_sp">
				<h2 class="subtitle02">アクセスしようとしたページは、<br class="tab">見つかりませんでした。</h2>
				<p class="txt_ccl">誤ったURLが入力されていないか、もう一度ご確認ください。<br>正しいURLを入力してもページが表示されない場合は、<br class="tab">ページが移動したか、削除された可能性があります。<br>お手数をおかけしますが、再度お探しください。</p>
				<div class="btn2 mt50 mt10_sp">
					<div class="btnW "><a href="<?php echo $this->baseUrl;?>">トップページへ</a></div>
					<div class="btnW"> <a href="<?php echo $this->baseUrl;?>sitemap.html">サイトマップへ</a></div>
				</div>
			</div>
			<div>
				<h2 class="subtitle02">The page with the specified <br class="tab">URL does not exist.</h2>
				<p class="txt_ccl mt50_sp">The URL may have been changed due to a site update, etc., <br class="tab">or the URL may not have been entered correctly.<br>If this page still appears after reloading your browser, <br class="tab">look for the page you are looking for in the site map.</p>
				<div class="btn2 mt50 mt10_sp">
					<div class="btnW "><a href="/en/">Top page</a></div>
					<div class="btnW"> <a href="<?php echo $this->baseUrl;?>sitemap.html">To site map</a></div>
				</div>
			</div>
			<?php
				} elseif ($this->errorType == 'error') {
					echo $this->req['error']['message'];
				if ($this->req['error']['subMessage'] != '') {
					echo '<br />' . $this->req['error']['subMessage'];
				}
			?>
			<?php
				}
			?>
		</div>
	</div>
</div>

<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:FOOTER_###'));?>

	</body>
</html>

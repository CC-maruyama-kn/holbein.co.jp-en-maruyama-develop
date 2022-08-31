<?php
/**
 * 公開サイト エラー
 */    // 共有SSLのサイトルート
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
<title><?php echo $this->metaTitle;?></title>
<meta name="keywords" content="<?php echo $this->metaKeyword;?>" />
<meta name="description" content="<?php echo $this->metaDescription;?>" />
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
</head>


<body id="common" class="common notice_area_wrap page_###_DCMS_PAGE_FILE_NAME_###">

<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:HEADER_###'));?>

<div class="pagename_wrap">
<div id="pagetitle04" class="pagename">
  <h2 class="inner">404エラー</h2>
</div>
</div>

<div id="main">

<div id="locator" class="loca">
<div id="locator_in">
<?php 
    // ページナビ (パンくずリスト)
    echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_BODY_PAGE_NAVI_###'));
?>
</div>
</div>

<div id="contents">
<div class="notice_section m20">
<?php
    if ($this->errorType == 'systemError') {
?>
只今、混み合っている為、アクセスできません。<br />しばらく経ってから再度、アクセスしてください。
<?php
    } elseif ($this->errorType == 'pageNone') {
?>
<p class="m30">指定されたURLのページは存在しません。<br />
サイト更新などによってURLが変更になったか、URLが正しく入力されていない可能性があります。<br />
ブラウザの再読込を行ってもこのページが表示される場合は、サイトマップでお求めのページをお探しください。</p>
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
</div><!--notice_section_end-->

<p class="m10">&gt; <a href="<?php echo $this->baseUrl;?>">トップページへ</a></p>
<p>&gt; <a href="<?php echo $this->baseUrl;?>sitemap.html">サイトマップへ</a></p>
</div>

</div><!--main_end-->


<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:FOOTER_###'));?>


</body>
</html>
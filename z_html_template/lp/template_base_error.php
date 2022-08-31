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
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">-->
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
</head><body class="common notice_area_wrap">
<div id="wrapper">
<div id="container">
<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:HEADER_###'));?>
<div id="main">
<div id="contents">
<div class="notice_section">
<?php
    if ($this->errorType == 'systemError') {
?>
只今、混み合っている為、アクセスできません。<br />しばらく経ってから再度、アクセスしてください。
<?php
    } elseif ($this->errorType == 'pageNone') {
?>
お探しのページは見つかりません。
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
</div><!--contents_end-->
</div><!--main_end-->
</div><!--container_end-->
<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:FOOTER_###'));?>
</div><!--wrapper_end-->
</body>
</html>
<?php
/**
 * 公開サイト エラー
 */

    // 共有SSLのサイトルート
    $shareSslSiteRoot = '';

    // 共有SSLの時
    if ($this->req['shareSslFlg'] == '1') {
        // 絶対Pathの前に設定用
        $shareSslSiteRoot = mb_substr($this->config->shareSsl->shareSslRoot, 0, -1);
    }
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
<?php echo $this->convertShareSslUrl($this->req['contentsBaseLayoutInfo']['contentsBaseHead']) . PHP_EOL;?>
</head>

<body id="sub" class="common notice_area_wrap">
<a name="page_top" id="page_top"></a>
<div id="wrapper">
<div id="container">

<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:HEADER_###'));?>

<!--contents_st-->
<div id="contents">

<?php
    if ($this->errorType == 'systemError') {
?>
<p class="mt50 m50">只今、混み合っている為、アクセスできません。<br />しばらく経ってから再度、アクセスしてください。</p>
<?php
    } elseif ($this->errorType == 'pageNone') {
?>
<p class="mt50 m50">指定されたURLのページは存在しません。<br />
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

<p class="m10">&gt; <a href="<?php echo $this->baseUrl;?>">トップページへ</a></p>
<p>&gt; <a href="<?php echo $this->baseUrl;?>sitemap.html">サイトマップへ</a></p>


</div>
<!--contents_end-->

</div>
<!--container_end-->

<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:FOOTER_###'));?>


</div>
<!--wrapper_end-->



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

</body>
</html>
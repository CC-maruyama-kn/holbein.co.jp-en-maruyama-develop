<?php
/**
 * 公開サイト お問い合わせ フォーム
 */    // 共有SSLのサイトルート
    $shareSslSiteRoot = '';    // 管理でプレビューフラグ
    if (isset($this->req['adminPreviewFlg']) !== FALSE && 
        $this->req['adminPreviewFlg'] == '1') {
        $adminPreviewFlg = '1';    // 公開側
    } else {
        $adminPreviewFlg = '';        // 共有SSLの時
        if ($this->req['shareSslFlg'] == '1') {
            // 絶対Pathの前に設定用
            $shareSslSiteRoot = mb_substr($this->config->shareSsl->shareSslRoot, 0, -1);
        }
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
<?php 
    if ($adminPreviewFlg == '1') {
?>
<base href="<?php echo $this->baseHrefUrl;?>" />
<?php 
    }
?>
<?php echo $this->convertShareSslUrl($this->req['contentsBaseLayoutInfo']['contentsBaseHead']) . PHP_EOL;?><link rel="stylesheet" href="<?php echo $shareSslSiteRoot;?>/dcms_public/js/jquery-1.7.2/ui/css/jquery.ui.all.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo $shareSslSiteRoot;?>/dcms_public/css/form_skin.css" type="text/css"/><!--<script type="text/javascript" src="<?php echo $shareSslSiteRoot;?>/dcms_public/js/jquery-1.7.2/jquery-1.7.2.min.js" ></script>-->
<script type="text/javascript" src="<?php echo $shareSslSiteRoot;?>/dcms_public/js/jquery-1.7.2/ui/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="<?php echo $shareSslSiteRoot;?>/dcms_public/js/jquery-1.7.2/ui/jquery.ui.datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo $shareSslSiteRoot;?>/dcms_public/js/jquery-1.7.2/plugin/jquery.ui.datepicker-ja.js"></script><!--###_DCMS_HEAD_ADMIN_PAGE_EDIT_JS_###-->
<script>
$(function() {
    $('.datep').datepicker({
        minDate: 0
    });
});
</script>
<?php
    // 公開側
    if ($adminPreviewFlg == '') {
?><?php
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
?><?php
    }
?>
<style type="text/css">
<!--
.ui-datepicker {
    background-image: none;
    background-color: #efefff;
}
-->
</style>

</head>

<body id="common" class="common form_area_wrap page_###_DCMS_PAGE_FILE_NAME_###">


<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:HEADER_###'));?>

<!--###_DCMS_BODY_ADMIN_PAGE_EDIT_BLOCK_MENU_###-->
<?php
    // ファイル添付の存在を判定
    $enctype = '';
    reset($this->req['contentsFormElementInfoList']);
    while (list($contentsFormElementNum, $val) = each($this->req['contentsFormElementInfoList'])) {
        // ファイル添付の時
        if ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_FILE) {
            $enctype = ' enctype="multipart/form-data"';
            break;
        }
    }
?>
<div class="pagename_wrap">
<div id="pagetitle" class="pagename">
  <h2 class="inner"><?php echo $this->req['contentsInfo']['contentsName'];?></h2>
</div>
</div>

<div id="locator" class="loca">
<div class="inner">
<?php 
    // ページナビ (パンくずリスト)
    echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_BODY_PAGE_NAVI_###'));
?>
</div>
</div>


<main id="contents" class="clearfix">
<div id="contents_left">

<div id="form_main">
<?php
//    // 管理側
//    if ($adminPreviewFlg == '1') {
?>
<!--
<div id="form_wrap">
<form>
-->
<?php
//    // 公開側
//    } else {
?>
<script type="text/javascript">
jQuery(document).ready(function(){
    var numTarget = $(".dcms_error_area").length;
    if ( numTarget > 0 ) {
        var scrollTarget = $(".dcms_error_area:first").offset().top-10;
        $('body,html').animate({
        scrollTop: scrollTarget
        }, 600);
    }
});
</script>


<div id="form_wrap">
<form <?php echo $enctype;?> method="post" id="contact-form" name="contact-form">
<?php 
        if ($this->mode == cmnConst::MODE_CONFIRM) {
            echo $this->formHidden('mode', cmnConst::MODE_COMPLETION);
            echo $this->hiddenParams($this->paramInput);
        } else {
            echo $this->formHidden('mode', cmnConst::MODE_CONFIRM);
        }
        echo $this->hiddenParams($this->paramTrans);
        echo $this->hiddenParams($this->paramSelf);
        echo $this->hiddenParams($this->paramToken);
?>
<?php
//    }
?>
<?php 
    // 確認時
    if ($this->mode == cmnConst::MODE_CONFIRM) {
?>
<ul class="m40_pc m40_tablet m20_sp formflow">
    <li class="prev"><a onclick="document.getElementById('mode').value='';document.getElementById('contact-form').submit();" />入力画面</a></li>
    <li class="age">入力内容の確認</li>
    <li class="next">送信完了</li>
</ul>
<div id="form_intro" class="m15">指定された内容でよろしければ送信ボタンをクリックしてください。</div>
<?php 
    // 入力時
    } else {
?>
<ul class="m40_pc m40_tablet m20_sp formflow">
    <li class="age">入力画面</li>
    <li class="next">入力内容の確認</li>
    <li class="next">送信完了</li>
</ul>
<div id="form_intro"><?php echo nl2br($this->req['contentsFormInfo']['topDescription']);?></div>
<?php
    }
?><?php
    // 入力エラーのタグ表示
//     if ($this->errFlg == cmnValidate::ERR_FOUND) {
//         echo $this->errorInput($this->err);
//     }
?>
<div id="form_contact_main">
<?php 
        reset($this->req['contentsFormElementInfoList']);
        while (list($contentsFormElementNum, $val) = each($this->req['contentsFormElementInfoList'])) {            // HTMLテンプレート用変数
            $this->templateParam = array();
            $this->templateParam['contentsFormElementNum'] = $contentsFormElementNum;
            $this->templateParam['elementVal'] = $val;            if ($this->mode == cmnConst::MODE_CONFIRM) {
                $template = 'template_form_element_confirm.php';
            } else {
                $template = 'template_form_element_input.php';
            }            echo $this->render($template);
        }
?>
<?php 
$errText = '';
$errClass = '';
if ($this->errFlg == cmnValidate::ERR_FOUND) {
    if (isset($this->err['agreementFlg'])) {
        $errText = '<p class="error_text"><span>' . nl2br(cmnUtil::escapeHtmlSpecialChars(implode("\n　", $this->err['agreementFlg']))) . '</span></p>';
        $errClass = 'dcms_error_area';
    }
}
?>
<!--<dl class="<?php echo $errClass;?>">
    <dt>
      個人情報の取扱規定
      <span>【必須】</span>
    </dt>
    <dd>
<?php
    if ($this->mode == cmnConst::MODE_INPUT) {
?>
      <p>
        <input name="agreementFlg" value="1" id="agreementFlg" type="checkbox" <?php echo !empty($this->req['agreementFlg']) ? 'checked="checked"' : '';?>>
        <label for="agreementFlg">個人情報の取扱規定に同意する</label>
      </p>
<?php
    } else {
?>
        個人情報の取扱規定に同意する
<?php
    }
?>
      <?php echo $errText;?>
    </dd>
</dl>-->
<input type="hidden" name="agreementFlg" value="1" id="agreementFlg" />


<?php 
    // 確認時
    if ($this->mode == cmnConst::MODE_CONFIRM) {
?>
<?php 
    // 入力時
    } else {
?>


<?php 
    }
?>

<!--フォーム用のcssに
margin-left:210px;
margin-top:10px;
padding-bottom:20px;
を追記
-->

<div class="clear"></div>
<?php
    // 管理側
    if ($adminPreviewFlg == '1') {
?>
<div id="submit_button"><input value="送信" type="button" onClick="alert('プレビューでの送信は行えません')" /></div>
<?php 
    // 公開側
    } else {
?>
<?php 
        if ($this->mode == cmnConst::MODE_CONFIRM) {
?>
<div id="submit_button"><input value="戻る" type="button" onClick="document.getElementById('mode').value='';document.getElementById('contact-form').submit();" />&nbsp;&nbsp;<input value="送信" type="submit" /></div>
<?php 
        } else {
?>
<p id="privacy_txt">当社の <a href="/privacy.html" target="_blank">個人情報保護方針</a>について同意される方は、ボタンをチェックいただき、 以下の「確認」をクリックください。</p>
<div id="submit_button"><input value="確認" type="submit" /></div>
<?php 
        }
    }
?>

</div><!--form_contact_main_end-->
</form>


</div><!--form_wrap_end-->
</div><!--form_main_end-->

</div>

<aside id="contents_right">
<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:RIGHTNAVI_###'));?>
</aside>

</main>



<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:FOOTER_###'));?>


</body>
</html>

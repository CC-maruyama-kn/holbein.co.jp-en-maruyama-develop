<?php
/**
 * 公開サイト お問い合わせ フォーム
 */

    // 共有SSLのサイトルート
    $shareSslSiteRoot = '';

    // 管理でプレビューフラグ
    if (isset($this->req['adminPreviewFlg']) !== FALSE && 
        $this->req['adminPreviewFlg'] == '1') {
        $adminPreviewFlg = '1';

    // 公開側
    } else {
        $adminPreviewFlg = '';

        // 共有SSLの時
        if ($this->req['shareSslFlg'] == '1') {
            // 絶対Pathの前に設定用
            $shareSslSiteRoot = mb_substr($this->config->shareSsl->shareSslRoot, 0, -1);
        }
    }
?>
<?php echo '<' . '?xml version="1.0" encoding="utf-8"?' . '>' . PHP_EOL;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">

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
<?php echo $this->convertShareSslUrl($this->req['contentsBaseLayoutInfo']['contentsBaseHead']) . PHP_EOL;?>

<link rel="stylesheet" href="<?php echo $shareSslSiteRoot;?>/dcms_public/js/jquery-1.7.2/ui/css/jquery.ui.all.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo $shareSslSiteRoot;?>/dcms_media/art/css/form_skin.css" type="text/css"/>

<script type="text/javascript" src="<?php echo $shareSslSiteRoot;?>/dcms_public/js/jquery-1.7.2/jquery-1.7.2.min.js" ></script>
<script type="text/javascript" src="<?php echo $shareSslSiteRoot;?>/dcms_public/js/jquery-1.7.2/ui/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="<?php echo $shareSslSiteRoot;?>/dcms_public/js/jquery-1.7.2/ui/jquery.ui.datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo $shareSslSiteRoot;?>/dcms_public/js/jquery-1.7.2/plugin/jquery.ui.datepicker-ja.js"></script>


<script type="text/javascript">
    $(function(){
        $("#langbtn").on("click", function() {
            $(this).next().slideToggle();
			$(this).toggleClass("active");
        });
    });
</script>


<!--###_DCMS_HEAD_ADMIN_PAGE_EDIT_JS_###-->
</head>

<!-- datepicker -->
<style type="text/css">
<!--
.ui-datepicker {
    background-image: none;
    background-color: #efefff;
}
-->
</style>

<body id="sub" class="common form_area_wrap">
<a name="page_top" id="page_top"></a>
<div id="wrapper">
<div id="container">

<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:HEADER_###'));?>
<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:LEFTNAVI_###'));?>
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



<div id="locator">
<a href="<?php echo $this->baseHrefUrl;?>">HOME</a> &gt; <?php echo $this->req['contentsInfo']['contentsName'];?>
</div>

<div id="contents" class="clearfix">


<div id="contents_left">

<h2 class="subtitle02"><?php echo $this->req['contentsInfo']['contentsName'];?></h2>

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
<div id="form_intro">Please make sure that all your details have been entered correctly and click “Submit”.</div>

<?php 
    // 入力時
    } else {
?>
<div id="form_intro"><?php echo $this->req['contentsFormInfo']['topDescription'];?></div>


<div id="form_required_text">
Fill in the blanks.<br />※Your name and email address are necessary to be filled.<br />

<strong>※A question is accepting only Japanese or English.</strong>
</div>
<?php 
    }
?>

<?php
    // 入力エラーのタグ表示
//     if ($this->errFlg == cmnValidate::ERR_FOUND) {
//         echo $this->errorInput($this->err);
//     }
?>
<div id="form_contact_main">
<?php 
        reset($this->req['contentsFormElementInfoList']);
        while (list($contentsFormElementNum, $val) = each($this->req['contentsFormElementInfoList'])) {

            // HTMLテンプレート用変数
            $this->templateParam = array();
            $this->templateParam['contentsFormElementNum'] = $contentsFormElementNum;
            $this->templateParam['elementVal'] = $val;

            if ($this->mode == cmnConst::MODE_CONFIRM) {
                $template = 'template_form_element_confirm.php';
            } else {
                $template = 'template_form_element_input.php';
            }

            echo $this->render($template);
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
      Personal information
      <span>*</span>
    </dt>
    <dd>
<?php 
    if ($this->mode == cmnConst::MODE_INPUT) {
?>
      <p>
        <input name="agreementFlg" value="1" id="agreementFlg" type="checkbox" <?php echo !empty($this->req['agreementFlg']) ? 'checked="checked"' : '';?>>
        <label for="agreementFlg">I agree to the <a href="#" target="_blank">Privacy Policy</a>.</label>
      </p>
<?php 
    } else {
?>
        I agree to the <a href="/en/privacy_en.html" target="_blank">Privacy Policy</a>.
<?php 
    }
?>
      <?php echo $errText;?>
    </dd>
</dl> -->

<input type="hidden" name="agreementFlg" value="1" id="agreementFlg" />

<?php 
    // 確認時
    if ($this->mode == cmnConst::MODE_CONFIRM) {
?>
<p id="privacy_txt">&nbsp;</p>

<?php 
    // 入力時
    } else {
?>&nbsp;</p>
<?php 
    }
?>




<?php
    // 管理側
    if ($adminPreviewFlg == '1') {
?>
<div id="submit_button"><input value="Submit" type="button" onClick="alert('プレビューでの送信は行えません')" /></div>
<?php 
    // 公開側
    } else {
?>
<?php 
        if ($this->mode == cmnConst::MODE_CONFIRM) {
?>
<div id="submit_button"><input value="Back" type="button" onClick="document.getElementById('mode').value='';document.getElementById('contact-form').submit();" />&nbsp;&nbsp;<input value="Submit" type="submit" /></div>
<?php 
        } else {
?>
<div id="submit_button"><input value="Confirm" type="submit" /></div>
<?php 
        }
    }
?>

</div><!--form_contact_main_end-->
</form>
</div><!--form_wrap_end-->
</div><!--form_main_end-->
</div><!--contents_left_end-->
<div id="contents_right">
<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:RIGHTNAVI_###'));?>
</div><!--contents_right_end-->
</div><!--contents_end-->

</div><!--container_end-->

<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:FOOTER_###'));?>
</div><!--wrapper_end-->
<?php
    // 公開側
    if ($adminPreviewFlg == '') {
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

<?php
    }
?>

</body>
</html>

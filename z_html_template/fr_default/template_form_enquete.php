<?php
/**
 * 公開サイト アンケート フォーム
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
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
<link rel="stylesheet" href="<?php echo $shareSslSiteRoot;?>/dcms_public/css/validationEngine.jquery.css" type="text/css"/>

<!--<script type="text/javascript" src="<?php echo $shareSslSiteRoot;?>/dcms_public/js/jquery-1.4.4.min.js" ></script>-->
<script type="text/javascript" src="<?php echo $shareSslSiteRoot;?>/dcms_public/js/jquery-1.7.2/plugin/jquery.validationEngine.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $shareSslSiteRoot;?>/dcms_public/js/jquery-1.7.2/plugin/jquery.validationEngine-en.js" charset="utf-8"></script>

<script type="text/javascript" src="<?php echo $shareSslSiteRoot;?>/dcms_public/js/jquery-1.7.2/ui/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="<?php echo $shareSslSiteRoot;?>/dcms_public/js/jquery-1.7.2/ui/jquery.ui.datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo $shareSslSiteRoot;?>/dcms_public/js/jquery-1.7.2/plugin/jquery.ui.datepicker-ja.js"></script>

<!--###_DCMS_HEAD_ADMIN_PAGE_EDIT_JS_###-->

<!-- datepicker -->
<style type="text/css">
<!--
.ui-datepicker {
    background-image: none;
    background-color: #efefff;
}
-->
</style>
</head>
<body id="common" class="common form_area_wrap">
<a name="page_top" id="page_top"></a>
<div id="wrapper">
<div id="container">

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


<div id="locator">
<a href="<?php echo $this->baseHrefUrl;?>">HOME</a> &gt; <?php echo $this->req['contentsInfo']['contentsName'];?>
</div>

<div id="contents" class="clearfix">
<div id="contents_left">

<h2 class="subtitle02"><?php echo $this->req['contentsInfo']['contentsName'];?></h2>


<?php
//    // 管理側
//    if ($adminPreviewFlg == '1') {
?>

<?php
//    // 公開側
//    } else {
?>
<script type="text/javascript">
jQuery(document).ready(function(){
    // binds form submission and fields to the validation engine
    jQuery("#contact-form").validationEngine();
});
</script>
<div id="form_wrap">
<form <?php echo $enctype;?> method="post" id="contact-form" name="contact-form">
<div>
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
</div>
<?php
//    }
?>

<?php 
    // 確認時
    if ($this->mode == cmnConst::MODE_CONFIRM) {
?>
<div class="contact_confirmation">以下の内容でよろしければ送信ボタンをクリックしてください。</div>
<?php 
    // 入力時
    } else {
?>
<div id="form_intro"><?php echo nl2br($this->req['contentsFormInfo']['topDescription']);?></div>
<div id="form_required_text"><strong>※</strong>は入力必須項目となります。</div>
<?php 
    }
?>

<?php
    // 入力エラーのタグ表示
    if ($this->errFlg == cmnValidate::ERR_FOUND) {
        echo $this->errorInput($this->err);
    }
?>


<?php 
    if ($this->req['contentsFormInfo']['basicInfoStatus'] == cmnConstExt::CONTENTS_FORM_BASIC_INFO_STATUS_ACTIVE) {
?>
<div id="basic_information">基本情報項目</div>
<!--start form_contact_main-->
<div id="form_contact_main">
<?php 
        reset($this->req['contentsFormElementInfoList']);
        while (list($contentsFormElementNum, $val) = each($this->req['contentsFormElementInfoList'])) {

            // 基本情報項目の時
            if ($val['groupType'] == cmnConstExt::CONTENTS_FORM_GROUP_TYPE_BASIC) {

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
        }
?>
</div>
<!--end form_contact_main-->
<?php 
    }
?>


<!--start form_enquete_main-->
<div id="form_enquetet_main">
<div id="enquete_intro"><?php echo nl2br($this->req['contentsFormInfo']['middleDescription']);?></div>

<?php 
    reset($this->req['contentsFormElementInfoList']);
    while (list($contentsFormElementNum, $val) = each($this->req['contentsFormElementInfoList'])) {

        // アンケート項目の時
        if ($val['groupType'] == cmnConstExt::CONTENTS_FORM_GROUP_TYPE_DETAIL) {

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
    }
?>

<?php 
    if ($this->mode == cmnConst::MODE_INPUT) {
?>
<input type="hidden" name="agreementFlg" value="1" id="agreementFlg" />
<?php 
    }
?>


<?php
    // 管理側
    if ($adminPreviewFlg == '1') {
?>
<div id="submit_button"><input value="送信" type="button" onclick="alert('プレビューでの送信は行えません')" /></div>
<?php 
    // 公開側
    } else {
?>
<?php 
        if ($this->mode == cmnConst::MODE_CONFIRM) {
?>
<div id="submit_button"><input value="戻る" type="button" onclick="document.getElementById('mode').value='';document.getElementById('contact-form').submit();" />&nbsp;&nbsp;<input value="送信" type="submit" /></div>
<?php 
        } else {
?>
<div id="submit_button"><input value="送信" type="submit" /></div>
<?php 
        }
    }
?>


</div>

</form>
</div>
</div>
<!--contents_left_end-->

<!--contents_right_st-->
<div id="contents_right">
<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:RIGHTNAVI_###'));?>
</div>
</div>
<!--contents_right,contents_end-->

</div>
<!--container_end-->


<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:FOOTER_###'));?>


</div>
<!--wrapper_end-->


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

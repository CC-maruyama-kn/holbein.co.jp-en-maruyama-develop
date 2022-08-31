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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title><?php echo $this->metaTitle;?></title>
<meta name="keywords" content="<?php echo $this->metaKeyword;?>" />
<meta name="description" content="<?php echo $this->metaDescription;?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />
<meta name="format-detection" content="telephone=no" />
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
<link rel="stylesheet" href="<?php echo $shareSslSiteRoot;?>/dcms_public/css/ec_skin.css" type="text/css"/>

<!--<script type="text/javascript" src="<?php echo $shareSslSiteRoot;?>/dcms_public/js/jquery-1.7.2/jquery-1.7.2.min.js" ></script>-->
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

    $("#ecProductQuantity").change(function () {
        var count = $(this).val();
        var price = $("#dcms_ec_product_price1").val();
        $("#dcms_ec_product_amount").val(price * count);
        $("#dcms_ec_product_amount_view").html($("#dcms_ec_product_amount").val().replace(/([0-9]+?)(?=(?:[0-9]{3})+$)/g , '$1,'));
    }).change();
    
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
<input type="hidden" id="dcms_ec_product_price1"  name="dcms_ec_product_price1"  value="<?php echo $this->req['contentsFormInfo']['ecProductPrice1'];?>" />
<input type="hidden" id="dcms_ec_product_amount"  name="dcms_ec_product_amount"  value="" />
<?php
//    }
?>

<h3 class="subtitle03"><?php echo $this->req['contentsInfo']['contentsName'];?></h3>

<div id="form_contact_main">

<table style="width: 100%;" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td class="dcms_vtop dcms_txt_c" width="30%"><img id="dcms_ec_product_image" src="<?php echo $this->config->url->admin;?>img/view/fc/ec-form-product/num/<?php echo $this->req['contentsFormInfo']['contentsNum'];?>" alt="商品" height="225" width="225" /></td>
      <td width="2%"> </td>
      <td width="68%">
        <table style="width: 100%;" border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td><p class="dcms_ec_subtitle01 dcms_price_line"><?php echo $this->req['contentsFormInfo']['ecProductName'];?></p></td>
            </tr>
            <tr>
              <td> </td>
            </tr>
            <tr>
              <td>
                <table style="width: 100%;" border="0" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td width="14%"><p class="dcms_price_small dcms_price_txt01">商品金額1</p></td>
                      <td width="2%"> </td>
                      <td width="84%"><p class="dcms_price_num01 dcms_price_large">\ <?php echo number_format($this->req['contentsFormInfo']['ecProductPrice1']);?></p></td>
                    </tr>
                    <tr>
                      <td> </td>
                      <td> </td>
                      <td> </td>
                    </tr>
                    <?php if ($this->req['contentsFormInfo']['ecProductPrice2'] != '') {?>
                    <tr>
                      <td><p class="dcms_price_small dcms_price_txt02">商品金額2</p></td>
                      <td> </td>
                      <td><p class="dcms_price_num01"><strong>\ <?php echo number_format($this->req['contentsFormInfo']['ecProductPrice2']);?></strong></p></td>
                    </tr>
                    <tr>
                      <td> </td>
                      <td> </td>
                      <td> </td>
                    </tr>
                    <?php }?>
                    <?php if ($this->req['contentsFormInfo']['ecProductPrice3'] != '') {?>
                    <tr>
                      <td><p class="dcms_price_small dcms_price_txt03">商品金額3</p></td>
                      <td> </td>
                      <td><p class="dcms_price_num02"><strong>\ <?php echo number_format($this->req['contentsFormInfo']['ecProductPrice3']);?></strong></p></td>
                    </tr>
                    <tr>
                      <td> </td>
                      <td> </td>
                      <td> </td>
                    </tr>
                    <?php }?>
                    <tr>
                      <td><p class="dcms_price_small dcms_price_txt04">数量</p></td>
                      <td> </td>
                      <td>
                        <?php if ($this->mode == cmnConst::MODE_CONFIRM) {?>
                        <p class="dcms_ec_count01"><strong><?php echo number_format($this->req['ecProductQuantity']) . $this->req['contentsFormInfo']['ecUnitName'];?></strong></p>
                        <?php } else {?>
                        <select id="ecProductQuantity" name="ecProductQuantity" class="dcms_ec_count01">
                          <?php for($i=1; $i <= 5; $i++) {?>
                            <?php echo "<option" . ($i == $this->req['ecProductQuantity'] ? " selected" : "" ) . ">{$i}</option>" .PHP_EOL;?>
                          <?php }?>
                        </select>
                        <?php echo $this->req['contentsFormInfo']['ecUnitName'];?>
                        <?php }?>
                      </td>
                    </tr>
                    <tr>
                      <td width="14%"><p class="dcms_price_small dcms_price_txt01">金額</p></td>
                      <td width="2%"> </td>
                      <td width="84%"><p class="dcms_price_num01 dcms_price_large">\ <span id="dcms_ec_product_amount_view"></span></p></td>
                    </tr>
                    <tr>
                      <td> </td>
                      <td> </td>
                      <td> </td>
                    </tr>
                    <?php if ($this->req['contentsFormInfo']['ecProductStockQuantity'] != '') {?>
                    <tr>
                      <td><p class="dcms_price_small dcms_price_txt04">在庫数量</p></td>
                      <td> </td>
                      <td>
                        <p class="dcms_ec_count01"><strong><?php echo number_format($this->req['contentsFormInfo']['ecProductStockQuantity']) . $this->req['contentsFormInfo']['ecUnitName'];?></strong></p>
                      </td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>



<?php 
    // 確認時
    if ($this->mode == cmnConst::MODE_CONFIRM) {
?>
<div id="form_intro">指定された内容でよろしければ送信ボタンをクリックしてください。</div>

<?php 
    // 入力時
    } else {
?>

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

<h3 class="subtitle03">お客様情報をご入力下さい。</h3>
<!--start form_contact_main-->

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

<p class="iphone_nobr mt10"><a href="http://www.41web.jp/policy/privacy.html" target="_blank">個人情報保護方針</a>をお読み頂き同意いただける方は「個人情報保護方針に同意する」にチェックし、<br />送信ボタンを押してください</p>

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

<p class="iphone_nobr mt10"><a href="http://www.41web.jp/policy/privacy.html" target="_blank">個人情報保護方針</a>をお読み頂き同意いただける方は「個人情報保護方針に同意する」にチェックし、<br />送信ボタンを押してください</p>

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
<?php echo $this->convertShareSslUrl($this->getDcmsCommonParts('###_DCMS_COMMON:LEFTNAVI_###'));?>
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

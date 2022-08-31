<?php 
/**
 * 公開サイト お問い合わせ／アンケート フォーム要素生成（確認用）
 */

    // フォーム要素生成（確認）

    // HTMLテンプレート用変数
    $contentsFormElementNum = $this->templateParam['contentsFormElementNum'];
    $val = $this->templateParam['elementVal'];


    // 入力項目名
    $inputName = 'formElementVal' . $contentsFormElementNum;

    // 必須
    if ($val['requiredFlg'] == '1') {
        $requiredStr = ' <span>※</span>';
    } else {
        $requiredStr = '';
    }


    // 項目タイプ：姓名
    if ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_NAME) {
?>
<dl>
<dt><?php echo nl2br($val['elementName']) . $requiredStr;?></dt>
<dd><?php echo $this->req[$inputName . 'Sei'];?>&nbsp;&nbsp;<?php echo $this->req[$inputName . 'Mei'];?>
</dd>
</dl>
<?php
    // 項目タイプ：よみ
    } elseif ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_NAME_KANA) {
?>
<dl>
<dt><?php echo nl2br($val['elementName']) . $requiredStr;?></dt>
<dd><?php echo $this->req[$inputName . 'SeiKana'];?>&nbsp;&nbsp;<?php echo $this->req[$inputName . 'MeiKana'];?>
</dd>
</dl>
<?php
    // 項目タイプ：E-mail、テキストエリア（1行）
    } elseif ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_EMAIL || 
              $val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_TEXT ||
              $val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_DATE_TEXT) {
?>
<dl>
<dt><?php echo nl2br($val['elementName']) . $requiredStr;?></dt>
<dd><?php echo $this->req[$inputName];?>
</dd>
</dl>
<?php 
    // 項目タイプ：テキストボックス（複数行）
    } elseif ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_TEXTAREA) {
?>
<dl>
<dt><?php echo nl2br($val['elementName']) . $requiredStr;?></dt>
<dd><?php echo nl2br($this->req[$inputName]);?>
</dd>
</dl>
<?php 
    // 項目タイプ：性別
    } elseif ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_SEX) {
?>
<dl>
<dt><?php echo nl2br($val['elementName']) . $requiredStr;?></dt>
<dd><?php echo $this->req[$inputName];?>
</dd>
</dl>
<?php 
    // 項目タイプ：郵便番号・住所
    } elseif ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_ADDR) {
?>
<dl>
<dt><?php echo nl2br($val['elementName']) . $requiredStr;?></dt>
<dd>

<table width="100%" cellpadding="0" cellspacing="0" border="0" id="table_address">

<tr>
<td>郵便番号</td>
<td><?php echo $this->req[$inputName . 'Zip1'];?> - <?php echo $this->req[$inputName . 'Zip2'];?></td>
</tr>
<tr>
<td>都道府県</td>
<td><?php echo $this->req[$inputName . 'Addr1'];?></td>
</tr>
<tr>
<td>市区郡</td>
<td><?php echo $this->req[$inputName . 'Addr2'];?></td>
</tr>
<tr>
<td>町名・番地</td>
<td><?php echo $this->req[$inputName . 'Addr3'];?></td>
</tr>
<tr>
<td rowspan="2">ビル名</td>
<td><?php echo $this->req[$inputName . 'Addr4'];?></td>
</tr>
</table>
</dd>
</dl>
<?php 
    // 項目タイプ：セレクトボックス
    } elseif ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_SELECT ||
              $val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_YEAR_SELECT ||
              $val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_MONTH_SELECT ||
              $val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_DAY_SELECT) {
?>
<dl>
<dt><?php echo nl2br($val['elementName']) . $requiredStr;?></dt>
<dd><?php echo $this->req[$inputName];?></dd>
</dl>
<?php 
    // 項目タイプ：ラジオボタン、チェックボックス
    } elseif ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_RADIO || 
              $val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_CHECKBOX) {
?>
<dl>
<dt><?php echo nl2br($val['elementName']) . $requiredStr;?></dt>
<dd>
<?php 
        // ラジオボタン
        if ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_RADIO) {
            echo $this->req[$inputName];

        // チェックボックス
        } else {
            echo implode('<br />', $this->req[$inputName]);
        }
?>
</dd>
</dl>
<?php 
    // 項目タイプ：ファイル添付
    } elseif ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_FILE) {
?>
<dl>
<dt><?php echo nl2br($val['elementName']) . $requiredStr;?></dt>
<dd><?php echo $this->req[$inputName . 'FileName'];?></dd>
</dl>
<?php 
    }
?>

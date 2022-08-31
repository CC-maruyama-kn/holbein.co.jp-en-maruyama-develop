<?php 
/**
 * 公開サイト お問い合わせ／アンケート フォーム要素生成（入力用）
 */

    // フォーム要素生成（入力）

    // HTMLテンプレート用変数
    $contentsFormElementNum = $this->templateParam['contentsFormElementNum'];
    $val = $this->templateParam['elementVal'];


    // 入力項目名
    $inputName = 'formElementVal' . $contentsFormElementNum;

    // 入力値の補正（管理でのプレビュー用）
    if (isset($this->req[$inputName]) === FALSE) {
        // 項目タイプ：チェックボックス
        if ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_CHECKBOX) {
            $this->req[$inputName] = array();
        } else {
            $this->req[$inputName] = '';
        }
    }

    // 幅、高さ
    $textClass = 'width_cm';
    $textAreaClass = 'width_em height_m';
    if ($val['widthType'] == cmnConstExt::CONTENTS_FORM_WIDTH_TYPE_SHORT) {
        $textClass     = 'width_cs';
        $textAreaClass = 'width_es';
    } elseif ($val['widthType'] == cmnConstExt::CONTENTS_FORM_WIDTH_TYPE_MIDDLE) {
        $textClass     = 'width_cm';
        $textAreaClass = 'width_em';
    } elseif ($val['widthType'] == cmnConstExt::CONTENTS_FORM_WIDTH_TYPE_LONG) {
        $textClass     = 'width_cl';
        $textAreaClass = 'width_el';
    }

    if ($val['heightType'] == cmnConstExt::CONTENTS_FORM_HEIGHT_TYPE_LOW) {
        $textAreaClass .= ' height_s';
    } elseif ($val['heightType'] == cmnConstExt::CONTENTS_FORM_HEIGHT_TYPE_MIDDLE) {
        $textAreaClass .= ' height_m';
    } elseif ($val['heightType'] == cmnConstExt::CONTENTS_FORM_HEIGHT_TYPE_HIGH) {
        $textAreaClass .= ' height_l';
    }

    // 必須
    if ($val['requiredFlg'] == '1') {
        $requiredStr = ' <span>※</span>';

        // 項目タイプ：E-mail
        if ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_EMAIL) {
            $requiredClass = ' validate[required,custom[email]]';
        } else {
            $requiredClass = ' validate[required]';
        }

    } else {
        $requiredStr = '';
        $requiredClass = '';
    }

    // 入力例
    if ($val['inputExample'] != '') {
        $inputExampleStr = '<p class="example_text">' . $val['inputExample'] . '</p>';
    } else {
        $inputExampleStr = '';
    }

    // 項目タイプ：姓名
    if ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_NAME) {
        if (isset($this->req[$inputName . 'Sei']) === FALSE) {
            $this->req[$inputName . 'Sei'] = '';
        }
        if (isset($this->req[$inputName . 'Mei']) === FALSE) {
            $this->req[$inputName . 'Mei'] = '';
        }
?>
<dl>
<dt><?php echo nl2br($val['elementName']) . $requiredStr;?></dt>
<dd>姓 <input type="text" name="<?php echo $inputName . 'Sei';?>" id="<?php echo $inputName . 'Sei';?>" value="<?php echo $this->req[$inputName . 'Sei'];?>" class="family_name<?php echo $requiredClass;?>" /> 名 <input type="text" name="<?php echo $inputName . 'Mei';?>" id="<?php echo $inputName . 'Mei';?>" value="<?php echo $this->req[$inputName . 'Mei'];?>" class="first_name<?php echo $requiredClass;?>" />
<?php echo $inputExampleStr;?></dd>
</dl>
<?php
    // 項目タイプ：よみ
    } elseif ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_NAME_KANA) {
        if (isset($this->req[$inputName . 'SeiKana']) === FALSE) {
            $this->req[$inputName . 'SeiKana'] = '';
        }
        if (isset($this->req[$inputName . 'MeiKana']) === FALSE) {
            $this->req[$inputName . 'MeiKana'] = '';
        }
?>
<dl>
<dt><?php echo nl2br($val['elementName']) . $requiredStr;?></dt>
<dd>せい <input type="text" name="<?php echo $inputName . 'SeiKana';?>" id="<?php echo $inputName . 'SeiKana';?>" value="<?php echo $this->req[$inputName . 'SeiKana'];?>" class="family_name_yomi<?php echo $requiredClass;?>" /> めい <input type="text" name="<?php echo $inputName . 'MeiKana';?>" id="<?php echo $inputName . 'MeiKana';?>" value="<?php echo $this->req[$inputName . 'MeiKana'];?>" class="first_name_yomi<?php echo $requiredClass;?>" />
<?php echo $inputExampleStr;?></dd>
</dl>
<?php
    // 項目タイプ：E-mail、テキストエリア（1行）
    } elseif ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_EMAIL || 
              $val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_TEXT) {
?>
<dl>
<dt><?php echo nl2br($val['elementName']) . $requiredStr;?></dt>
<dd><input type="text" name="<?php echo $inputName;?>" id="<?php echo $inputName;?>" value="<?php echo $this->req[$inputName];?>" class="<?php echo $textClass;?><?php echo $requiredClass;?>" />
<?php echo $inputExampleStr;?></dd>
</dl>
<?php 
    // 項目タイプ：テキストボックス（複数行）
    } elseif ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_TEXTAREA) {
?>
<dl>
<dt><?php echo nl2br($val['elementName']) . $requiredStr;?></dt>
<dd><textarea name="<?php echo $inputName;?>" id="<?php echo $inputName;?>" class="<?php echo $textAreaClass;?><?php echo $requiredClass;?>"><?php echo $this->req[$inputName];?></textarea>
<?php echo $inputExampleStr;?></dd>
</dl>
<?php 
    // 項目タイプ：性別
    } elseif ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_SEX) {
        $checkedMan    = '';
        $checkedFemail = '';
        if ($this->req[$inputName] == '男性') {
            $checkedMan    = ' checked="checked"';
        } elseif ($this->req[$inputName] == '女性') {
            $checkedFemail = ' checked="checked"';
        }
?>
<dl>
<dt><?php echo nl2br($val['elementName']) . $requiredStr;?></dt>
<dd><input type="radio" name="<?php echo $inputName;?>" value="男性" id="<?php echo $inputName;?>man"<?php echo $checkedMan;?> class="<?php echo $requiredClass;?>" /> <label for="<?php echo $inputName;?>man">男性</label> <input type="radio" name="<?php echo $inputName;?>" value="女性" id="<?php echo $inputName;?>female"<?php echo $checkedFemail;?> class="<?php echo $requiredClass;?>" /> <label for="<?php echo $inputName;?>female">女性</label>
<?php echo $inputExampleStr;?></dd>
</dl>
<?php 
    // 項目タイプ：郵便番号・住所
    } elseif ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_ADDR) {
        if (isset($this->req[$inputName . 'Zip1']) === FALSE) {
            $this->req[$inputName . 'Zip1'] = '';
        }
        if (isset($this->req[$inputName . 'Zip2']) === FALSE) {
            $this->req[$inputName . 'Zip2'] = '';
        }
        if (isset($this->req[$inputName . 'Addr1']) === FALSE) {
            $this->req[$inputName . 'Addr1'] = '';
        }
        if (isset($this->req[$inputName . 'Addr2']) === FALSE) {
            $this->req[$inputName . 'Addr2'] = '';
        }
        if (isset($this->req[$inputName . 'Addr3']) === FALSE) {
            $this->req[$inputName . 'Addr3'] = '';
        }
        if (isset($this->req[$inputName . 'Addr4']) === FALSE) {
            $this->req[$inputName . 'Addr4'] = '';
        }
?>
<dl>
<dt><?php echo nl2br($val['elementName']) . $requiredStr;?></dt>
<dd>

<table width="100%" cellpadding="0" cellspacing="0" border="0" id="table_address">

<tr>
<td>郵便番号</td>
<td><input type="text" name="<?php echo $inputName . 'Zip1';?>" id="<?php echo $inputName . 'Zip1';?>" value="<?php echo $this->req[$inputName . 'Zip1'];?>" class="zip01<?php echo $requiredClass;?>" style="width: 40px;" /> - <input type="text" name="<?php echo $inputName . 'Zip2';?>" id="<?php echo $inputName . 'Zip2';?>" value="<?php echo $this->req[$inputName . 'Zip2'];?>" class="zip02<?php echo $requiredClass;?>" style="width: 40px;" /></td>
</tr>
<tr>
<td>都道府県</td>
<td>
<?php
        $aryPref = array();
        reset(cmnConstExt::$pref);
        while (list($subKey, $subVal) = each(cmnConstExt::$pref)) {
            $aryPref[$subVal] = $subVal;
        }

        echo $this->formSelectExt($inputName . 'Addr1', $this->req[$inputName . 'Addr1'], 
                                 array('class' => $requiredClass), 
                                 $aryPref, cmnConst::REQUIRED_OFF, '選択してください');
?>
</td>
</tr>
<tr>
<td>市区郡町村</td>
<td><input type="text" name="<?php echo $inputName . 'Addr2';?>" id="<?php echo $inputName . 'Addr2';?>" value="<?php echo $this->req[$inputName . 'Addr2'];?>" class="width_cm<?php echo $requiredClass;?>" /></td>
</tr>
<tr>
<td>番地</td>
<td><input type="text" name="<?php echo $inputName . 'Addr3';?>" id="<?php echo $inputName . 'Addr3';?>" value="<?php echo $this->req[$inputName . 'Addr3'];?>" class="width_cm<?php echo $requiredClass;?>" /></td>
</tr>
<tr>
<td rowspan="2">ビル名</td>
<td><input type="text" name="<?php echo $inputName . 'Addr4';?>" id="<?php echo $inputName . 'Addr4';?>" value="<?php echo $this->req[$inputName . 'Addr4'];?>" class="width_cm" /></td>
</tr>
<tr>
<td>※ビル名がある場合は、ご記入ください。</td>
</tr>
</table>
<?php echo $inputExampleStr;?>
</dd>
</dl>
<?php 
    // 項目タイプ：セレクトボックス
    } elseif ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_SELECT) {

        $arySelectValue = array();

        if ($val['selectValue'] != '') {
            $ary = mb_split(cmnConstExt::CONTENTS_FORM_SELECT_VALUE_SEPARATOR, $val['selectValue']);
            reset($ary);
            while (list($idx, $subVal) = each($ary)) {
                $arySelectValue[$subVal] = $subVal;
            }
        }
?>
<dl>
<dt><?php echo nl2br($val['elementName']) . $requiredStr;?></dt>
<dd>
<?php 
    echo $this->formSelectExt($inputName, $this->req[$inputName], 
                             array('class' => $requiredClass), 
                             $arySelectValue, cmnConst::REQUIRED_OFF, '選択してください');
?>
<?php echo $inputExampleStr;?>
</dd>
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
        if ($val['selectValue'] != '') {
            $ary = mb_split(cmnConstExt::CONTENTS_FORM_SELECT_VALUE_SEPARATOR, $val['selectValue']);
            reset($ary);
            while (list($idx, $subVal) = each($ary)) {

                // ラジオボタン
                if ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_RADIO) {
                    if ($this->req[$inputName] == $subVal) {
                        $checked = ' checked="checked"';
                    } else {
                        $checked = '';
                    }
?>
<p><input type="radio" name="<?php echo $inputName;?>" value="<?php echo $subVal;?>" id="<?php echo $inputName.$idx;?>"<?php echo $checked;?> class="<?php echo $requiredClass;?>" /> <label for="<?php echo $inputName.$idx;?>"><?php echo $subVal;?></label></p>
<?php 
                // チェックボックス
                } else {
                    if (array_search($subVal, $this->req[$inputName]) !== FALSE) {
                        $checked = ' checked="checked"';
                    } else {
                        $checked = '';
                    }
?>
<p><input type="checkbox" name="<?php echo $inputName;?>[]" value="<?php echo $subVal;?>" id="<?php echo $inputName.$idx;?>"<?php echo $checked;?> class="<?php echo $requiredClass;?>" /> <label for="<?php echo $inputName.$idx;?>"><?php echo $subVal;?></label></p>
<?php 
                }
            }
        }
?>
<?php echo $inputExampleStr;?>
</dd>
</dl>
<?php 
    // 項目タイプ：ファイル添付
    } elseif ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_FILE) {
        if (isset($this->req[$inputName . 'FileName']) === FALSE) {
            $this->req[$inputName . 'FileName'] = '';
        }
?>
<dl>
<dt><?php echo nl2br($val['elementName']) . $requiredStr;?></dt>
<dd>
<?php 
        // ファイル名が指定されている時
        if ($this->req[$inputName . 'FileName'] != '') {
            echo $this->req[$inputName . 'FileName'] . '<br />';
        }
?>
<input type="file" name="<?php echo $inputName;?>" id="<?php echo $inputName;?>" class="<?php echo $textClass;?><?php echo $requiredClass;?>" />
<input type="hidden" name="<?php echo $inputName . 'FileName';?>" id="<?php echo $inputName . 'FileName';?>" value="<?php echo $this->req[$inputName . 'FileName'];?>" />
<?php echo $inputExampleStr;?>
</dd>
</dl>

<?php
    // 項目タイプ：年月日テキストボックス
    } elseif ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_DATE_TEXT) {
    	
    	
    	if ($this->req[$inputName] == "") $this->req[$inputName] = $val["defaultValue"];
?>
<dl>
<script type="text/javascript">
$(function() {
	$( "#<?php echo $inputName;?>" ).datepicker();
});
</script>
<dt><?php echo nl2br($val['elementName']) . $requiredStr;?></dt>
<dd><input type="text" name="<?php echo $inputName;?>" id="<?php echo $inputName;?>" value="<?php echo $this->req[$inputName];?>" class="<?php echo $textClass;?><?php echo $requiredClass;?> " style="width:80px;" />
<?php echo $inputExampleStr;?></dd>
</dl>

<?php 
    // 項目タイプ：年/月/日セレクトボックス
    } elseif ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_YEAR_SELECT ||
              $val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_MONTH_SELECT ||
              $val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_DAY_SELECT) {

        $arySelectValue = array();
        
        $min = 0;
        $max = 0;
        
        if ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_YEAR_SELECT) {
        	// 設定画面で指定した範囲
	        $min = $val['rangeFromValue'] != "" ? $val['rangeFromValue'] : 1000;
	        $max = $val['rangeToValue'] != "" ? $val['rangeToValue'] : 9999;
	        
        } else if ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_MONTH_SELECT) {
	        $min = 1;
	        $max = 12;
        } else if ($val['elementType'] == cmnConstExt::CONTENTS_FORM_ELEMENT_TYPE_DAY_SELECT) {
	        $min = 1;
	        $max = 31;
        }

        if ($min <= $max) {
	        for ($selectYmdValue = $min; $selectYmdValue <= $max; $selectYmdValue++) {
	        	$arySelectValue[$selectYmdValue] =  $selectYmdValue;
	        }
        } else {
            for ($selectYmdValue = $min; $selectYmdValue >= $max; $selectYmdValue--) {
	        	$arySelectValue[$selectYmdValue] =  $selectYmdValue;
	        }
        }
?>
<dl>
<dt><?php echo nl2br($val['elementName']) . $requiredStr;?></dt>
<dd>
<?php 
    echo $this->formSelectExt($inputName, $this->req[$inputName], 
                             array('class' => $requiredClass), 
                             $arySelectValue, cmnConst::REQUIRED_OFF, '選択してください');
?>
<?php echo $inputExampleStr;?>
</dd>
</dl>


<?php 
    }
?>

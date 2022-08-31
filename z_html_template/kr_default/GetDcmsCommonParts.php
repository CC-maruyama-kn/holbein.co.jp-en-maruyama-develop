<?php
/**
 * ビュー　ヘルパー
 * 
 * 共通パーツを取得
 *   ###_DCMS_COMMON:HEADER_### 等
 *
 * @copyright 2009 $copyright All rights reserved.
 * @version   1.0.0
 *
 * modify : 
 *
 */

class Prv_View_Helper_getDcmsCommonParts
{
    public $view;

    public function setView(Zend_View_Interface $view)
    {
        $this->view = $view;
    }

    /**
     * 共通パーツを取得
     *
     * @param array $partsType パーツタイプ
     * @return string 共通パーツタグ
     */
    public function getDcmsCommonParts($partsKey)
    {
        $result = '';

        if (isset($this->view->req['dcmsCommonParts'][$partsKey]) !== FALSE) {
            // HTMLタグを有効化
            $result = cmnUtil::reverseHtmlEntitie($this->view->req['dcmsCommonParts'][$partsKey]);
        }

        return $result;
    }
}

<?php
/**
 * ビュー　ヘルパー
 *
 * 共有SSL用の絶対Path指定URLを変換（個別サイト用）
 *
 * @copyright 2009 $copyright All rights reserved.
 * @version   1.0.0
 *
 * modify :
 *
 */

class Prv_View_Helper_ConvertShareSslUrl
{
    public $view;

    public function setView(Zend_View_Interface $view)
    {
        $this->view = $view;
    }

    /**
     * ページの共通タグ用データを編集
     *
     * @param string $str 文字列
     *
     * @return string 変換後の文字列
     */
    public function convertShareSslUrl($str)
    {

        // 共有SSLの時
        if (isset($this->view->req['shareSslFlg']) !== FALSE && 
            $this->view->req['shareSslFlg'] == '1') {

            // 共有SSLのサイトPath
            $shareSslSitePath = mb_substr($this->view->config->shareSsl->shareSslRoot, 0, -1);

            // 絶対Path指定を変換
            $str = cmnUtil::replaceString('src="/', 'src="' . $shareSslSitePath . '/', $str);
            $str = cmnUtil::replaceString('href="/', 'href="' . $shareSslSitePath . '/', $str);
        }

        return $str;
    }
}

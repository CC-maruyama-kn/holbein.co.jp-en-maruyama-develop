<?php
/**
 * 公開サイト コンテンツ のナビ、カテゴリを編集
 *   設定が必要な変数
 *     $baseUrl : ベースURL
 *     $targeteContentsNum : 対象のコンテンツNo
 *     $folderNavi : contentsInfo の ナビ配列
 *
 *   設定される変数
 *     $pageNavi
 */

    if (isset($folderNavi) === FALSE) {
        $folderNavi = array();
    }


    // ナビを編集
    $str =  '';

    if (count($folderNavi) > 0) {
        reset($folderNavi);
        while (list($folderNaviContentsNum, $folderNaviVal) = each($folderNavi)) {
            if ($str != '') {
                $str .= '&nbsp;&gt;&nbsp;';
            }
            if ($folderNaviContentsNum == $targeteContentsNum) {
                $str .= $folderNaviVal['contentsName'];
            } else {
                $str .= '<a href="' . $baseUrl . $folderNaviVal['folderUrlFullPath'] . $folderNaviVal['contentsFileName'] . '">' . $folderNaviVal['contentsName'] . '</a>';
            }
        }
    }

    $pageNavi = $str;

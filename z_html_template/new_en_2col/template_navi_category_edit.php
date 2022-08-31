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

    // 回数の変数を初期化
    $i = 0;

    if (count($folderNavi) > 0) {
        reset($folderNavi);
        while (list($folderNaviContentsNum, $folderNaviVal) = each($folderNavi)) {
            //回数をインクリメント
            $i++;

            if ($str != '') {
                $str .= '';
            }
            $str .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
            if ($folderNaviContentsNum == $targeteContentsNum) {
               $str .= '<span itemprop="name">' . $folderNaviVal['contentsName'] . '</span>' . '<meta itemprop="position" content="' . $i . '" />';
            } else {
               $str .= '<a href="' . $baseUrl . $folderNaviVal['folderUrlFullPath'] . $folderNaviVal['contentsFileName'] . '" itemprop="item">' . '<span itemprop="name">' . $folderNaviVal['contentsName'] . '</span>' . '</a>' . '<meta itemprop="position" content="' . $i . '" />';              
            }
            $str .= '</li>';          
        }
    }


    $pageNavi = $str;
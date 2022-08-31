<?php
/**
 * 公開サイト コンテンツ のナビ、カテゴリを編集
 *   設定が必要な変数
 *     $baseUrl : ベースURL
 *     $targeteContentsNum : 対象のコンテンツNo
 *     $folderNavi : contentsInfo の ナビ配列
 *     $folderChild : contentsInfo の カテゴリ配列
 *
 *   設定される変数
 *     $pageNavi
 *     $pageCategoryTitle
 *     $pageCategoryChild
 */

    if (isset($folderNavi) === FALSE) {
        $folderNavi = array();
    }

    if (isset($folderChild) === FALSE) {
        $folderChild = array();
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
//                $str .= '<a href="' . $baseUrl . 'contents/index/contentsNum/' . $folderNaviContentsNum . '/">' . $folderNaviVal['contentsName'] . '</a>';
                $str .= '<a href="' . $baseUrl . $folderNaviVal['folderUrlFullPath'] . $folderNaviVal['contentsFileName'] . '">' . $folderNaviVal['contentsName'] . '</a>';
            }
        }
    }
//    $pageNavi = $str;
//    $pageNavi = 'ナビ：' . $str;
    $pageNavi = $str;


    // カテゴリを編集
//    $pageCategoryTitle = 'カテゴリタイトル：';
//    $pageCategoryChild = 'カテゴリ：';
    $pageCategoryTitle = '';
    $pageCategoryChild = '';

    if (count($folderChild) > 0) {
        reset($folderChild);
        while (list($folderChildIdx, $folderChildVal) = each($folderChild)) {
    
            if ($folderChildVal['childType'] == 'title') {
                $pageCategoryTitle .= $folderChildVal['contentsName'];
    
            } else {
                // フォームの時
                if ($folderChildVal['contentsType'] == cmnConstExt::CONTENTS_TYPE_CONTACT || 
                    $folderChildVal['contentsType'] == cmnConstExt::CONTENTS_TYPE_ENQUETE) {
//                    $pageCategoryChild .= '<li><a href="' . $baseUrl . 'form/index/contentsNum/' . $folderNaviVal['contentsNum'] . '/">' . $folderNaviVal['contentsName'] . '</a></li>';
                    $pageCategoryChild .= '<li><a href="' . $baseUrl . $folderChildVal['folderUrlFullPath'] . $folderChildVal['contentsFileName'] . '">' . $folderChildVal['contentsName'] . '</a></li>';

                // フォーム以外の時
                } else {
//                    $pageCategoryChild .= '<li><a href="' . $baseUrl . 'contents/index/contentsNum/' . $val['contentsNum'] . '/">' . $val['contentsName'] . '</a></li>';
                    $pageCategoryChild .= '<li><a href="' . $baseUrl . $folderChildVal['folderUrlFullPath'] . $folderChildVal['contentsFileName'] . '">' . $folderChildVal['contentsName'] . '</a></li>';
                }
            }
        }
    }

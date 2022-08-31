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

                // 「http://{ドメイン}/{ブログURL}/all」へのアクセス時の、デフォルト文言「すべての投稿」を差し替える場合の例
                //if ( $this->_req['action'] == 'all' ) {
                //    $folderNaviVal['contentsName'] = '記事の一覧';
                //}

                $str .= $folderNaviVal['contentsName'];
            } else {
                $str .= '<a href="' . $baseUrl . $folderNaviVal['folderUrlFullPath'] . $folderNaviVal['contentsFileName'] . '">' . $folderNaviVal['contentsName'] . '</a>';
            }
        }
    }

    $pageNavi = $str;

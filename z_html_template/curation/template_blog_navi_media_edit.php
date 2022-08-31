<?php
/**
 * 公開サイト BLOG のメディアサブナビを編集
 *   設定が必要な変数
 *     $blogMediaNaviArray : メディア の サブナビ配列
 *
 *   設定される変数
 *     $blogMediaNavi
 */
$blogMediaNavi = "";
if (isset($blogMediaNaviArray) === FALSE) {
    $blogMediaNaviArray = array();
}

if (count($blogMediaNaviArray) > 0) {
    
    $blogMediaNavi .= '<div class="blog_side_section01">' .PHP_EOL;
    $blogMediaNavi .= '<h5 class="blog_sidetitle01">メディア</h5>' . PHP_EOL;
    $blogMediaNavi .= '<ul class="blog_sidelist01">' . PHP_EOL;
    
    $tagLI = '<li><a href="%s">%s</a></li>';
    foreach ($blogMediaNaviArray as $value) {
        $blogMediaNavi .= sprintf($tagLI, $value['blogMediaUrl'], $value['mediaSiteName'] . ' (' . $value['count'] . ')') . PHP_EOL;
    }
    
    // メディアアーカイブへのリンク
    $blogMediaNavi .= sprintf($tagLI, $blogMediaNaviArray[0]['blogArchivesMediaUrl'], '<strong>メディア全てを表示</strong>') . PHP_EOL;
    
    $blogMediaNavi .= '</ul>' . PHP_EOL;
    $blogMediaNavi .= '</div>' . PHP_EOL;
}

<?php
/**
 * 公開サイト BLOG のタグサブナビを編集
 *   設定が必要な変数
 *     $bloTagNaviArray : タグ の サブナビ配列
 *
 *   設定される変数
 *     $blogTagNavi
 */
$blogTagNavi = "";
if (isset($blogTagNaviArray) === FALSE) {
    $blogTagNaviArray = array();
}

if (count($blogTagNaviArray) > 0) {
    
    //$blogTagNavi .= '<div class="keyword">' .PHP_EOL;
    //$blogTagNavi .= '<h5 class="blog_sidetitle01">タグ</h5>' . PHP_EOL;
    $blogTagNavi .= '<ul class="tag sweep">' . PHP_EOL;
    
    $tagLI = '<li><a href="%s">%s</a></li>';
    $tagArchive = '<a href="%s" class="btn"><span>%s</span></a>';
    foreach ($blogTagNaviArray as $value) {
        $blogTagNavi .= sprintf($tagLI, $value['blogTagUrl'], $value['blogTagName'] . ' (' . $value['count'] . ')') . PHP_EOL;
    }
    
    $blogTagNavi .= '</ul>' . PHP_EOL;
    $blogTagNavi .= sprintf($tagArchive, $blogTagNaviArray[0]['blogArchivesTagUrl'], '全部見る') . PHP_EOL;
    //$blogTagNavi .= '</div>' . PHP_EOL;
}

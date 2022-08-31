<?php
/**
 * 公開サイト BLOG のカテゴリサブナビを編集
 *   設定が必要な変数
 *     $bloCategoryNaviArray : カテゴリ の サブナビ配列
 *
 *   設定される変数
 *     $blogCategoryNavi
 */
$blogCategoryNavi = "";
if (isset($blogCategoryNaviArray) === FALSE) {
    $blogCategoryNaviArray = array();
}

if (count($blogCategoryNaviArray) > 0) {
    
    //$blogCategoryNavi .= '<div class="blog_side_section01">' .PHP_EOL;
    //$blogCategoryNavi .= '<h5 class="blog_sidetitle01">カテゴリ</h5>' . PHP_EOL;
    $blogCategoryNavi .= '<ul class="cate">' . PHP_EOL;
    
    $tagLI = '<li><a href="%s">%s</a></li>';
    $tagbtn = '<a href="%s" class="btn"><span>%s</span></a>';
    foreach ($blogCategoryNaviArray as $value) {
        $blogCategoryNavi .= sprintf($tagLI, $value['blogCategoryUrl'], $value['blogCategoryName'] . ' (' . $value['count'] . ')') . PHP_EOL;
    }
    
    $blogCategoryNavi .= '</ul>' . PHP_EOL;
    $blogCategoryNavi .= sprintf($tagbtn, $blogCategoryNaviArray[0]['blogArchivesCategoryUrl'], '<span>カテゴリ全てを表示</span>') . PHP_EOL;
    //$blogCategoryNavi .= '</div>' . PHP_EOL;
}



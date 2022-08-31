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
    
    $blogCategoryNavi .= '<div class="blog_side_section01">' .PHP_EOL;
    $blogCategoryNavi .= '<h5 class="blog_sidetitle01">カテゴリ</h5>' . PHP_EOL;
    $blogCategoryNavi .= '<ul class="blog_sidelist01">' . PHP_EOL;
    
    $tagLI = '<li><a href="%s">%s</a></li>';
    foreach ($blogCategoryNaviArray as $value) {
        $blogCategoryNavi .= sprintf($tagLI, $value['blogCategoryUrl'], $value['blogCategoryName'] . ' (' . $value['count'] . ')') . PHP_EOL;
    }
    
    // カテゴリアーカイブへのリンク
    $blogCategoryNavi .= sprintf($tagLI, $blogCategoryNaviArray[0]['blogArchivesCategoryUrl'], '<strong>カテゴリ全てを表示</strong>') . PHP_EOL;
    
    $blogCategoryNavi .= '</ul>' . PHP_EOL;
    $blogCategoryNavi .= '</div>' . PHP_EOL;
}

<?php
/**
 * 公開サイト BLOG の年月日アーカイブサブナビを編集
 *   設定が必要な変数
 *     $bloTagNaviArray : 年月日アーカイブ の サブナビ配列
 *
 *   設定される変数
 *     $blogTagNavi
 */
$blogArchiveNavi = "";
if (isset($blogArchiveNaviArray) === FALSE) {
    $blogArchiveNaviArray = array();
}

if (count($blogArchiveNaviArray) > 0) {
    
    $blogArchiveNavi .= '<div class="blog_side_section01">' .PHP_EOL;
    $blogArchiveNavi .= '<h5 class="blog_sidetitle01">アーカイブ</h5>' . PHP_EOL;
    $blogArchiveNavi .= '<ul class="blog_sidelist01">' . PHP_EOL;
    
    $tagLI = '<li><a href="%s">%s</a></li>';
    foreach ($blogArchiveNaviArray as $value) {
        
        $archive = $value['year'] . '年';
        if (isset($value['month'])) $archive .= $value['month'] . '月';
        if (isset($value['day'])) $archive .= $value['day'] . '日';
        
        $blogArchiveNavi .= sprintf($tagLI, $value['blogArchivesUrl'], $archive . ' (' . $value['count'] . ')') . PHP_EOL;
    }
    
    // 年月日アーカイブへのリンク
    $blogArchiveNavi .= sprintf($tagLI, $blogArchiveNaviArray[0]['blogArchivesAllUrl'], '<strong>アーカイブ全てを表示</strong>') . PHP_EOL;
    
    $blogArchiveNavi .= '</ul>' . PHP_EOL;
    $blogArchiveNavi .= '</div>' . PHP_EOL;
}

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
    
    //$blogArchiveNavi .= '<div class="blog_side_section01">' .PHP_EOL;
    //$blogArchiveNavi .= '<h5 class="blog_sidetitle01 archivetitle">アーカイブ</h5>' . PHP_EOL;
    $blogArchiveNavi .= '<ul class="archive sweep">' . PHP_EOL;
    
    $tagLI = '<li><a href="%s">%s</a></li>';
    $tagbtn = '<a href="%s" class="btn"><span>%s</span></a>';
    foreach ($blogArchiveNaviArray as $value) {
        
        $archive = $value['year'] . '年';
        if (isset($value['month'])) $archive .= $value['month'] . '月';
        if (isset($value['day'])) $archive .= $value['day'] . '日';
        
        $blogArchiveNavi .= sprintf($tagLI, $value['blogArchivesUrl'], $archive . ' (' . $value['count'] . ')') . PHP_EOL;
    }
      
    
    $blogArchiveNavi .= '</ul>' . PHP_EOL;
    $blogArchiveNavi .= sprintf($tagbtn, $blogArchiveNaviArray[0]['blogArchivesAllUrl'], 'アーカイブ全てを表示') . PHP_EOL;
    //$blogArchiveNavi .= '</div>' . PHP_EOL;
}


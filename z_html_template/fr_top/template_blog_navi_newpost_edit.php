<?php
/**
 * 公開サイト BLOG の最近の投稿サブナビを編集
 *   設定が必要な変数
 *     $bloNewPostNaviArray : 最近の投稿 の サブナビ配列
 *
 *   設定される変数
 *     $blogNewPostNavi
 */
$blogNewPostNavi = "";
if (isset($blogNewPostNaviArray) === FALSE) {
    $blogNewPostNaviArray = array();
}

if (count($blogNewPostNaviArray) > 0) {
    
    $blogNewPostNavi .= '<div class="blog_side_section01">' .PHP_EOL;
    $blogNewPostNavi .= '<h5 class="blog_sidetitle01">最近の投稿</h5>' . PHP_EOL;
    $blogNewPostNavi .= '<ul class="blog_sidelist01">' . PHP_EOL;
    
    $tagLI = '<li><a href="%s">%s</a></li>';
    foreach ($blogNewPostNaviArray as $value) {
        $blogNewPostNavi .= sprintf($tagLI, $value['blogPostUrl'], $value['blogSubject']) . PHP_EOL;
    }
    
    $blogNewPostNavi .= '</ul>' . PHP_EOL;
    $blogNewPostNavi .= '</div>' . PHP_EOL;
}

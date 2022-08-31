<?php
/**
 * 公開サイト RSS出力を編集
 *   設定が必要な変数
 *     $rssArray : RSS配列
 *
 *   設定される変数
 *     $blockRss
 */
    $blockRss = "";
    if (isset($rssArray) === FALSE) {
        $rssArray = array();
    }
    

    $str =  '';
    
    $tagRssDate = '<dt class="rss_date">%s</dt>';
    $tagRssTitle = '<dd class="rss_title"><a href="%s">%s</a></dd>';
    $tagRssTitle_ExternalLink = '<dd class="rss_title"><a href="%s" target="_blank">%s</a></dd>';
    $tagRssTitle_LinkOff = '<dd class="rss_title">%s</dd>';
    $tagRssTitle_ExternalLink_LinkOff = '<dd class="rss_title">%s</dd>';
    $tagRssContents = '<dd class="rss_contents">%s</dd>';

    if (count($rssArray) > 0) {
        reset($rssArray);
        for ($i = 0; count($rssArray) > $i; $i++) {
            $str .= '<dl>' .PHP_EOL;
            $str .= sprintf($tagRssDate, date('Y/m/d', $rssArray[$i]['lastUpdate'])) . PHP_EOL;
            
            // 外部リンク
            if ($rssArray[$i]['external_link_flg']) {
                if ($rssArray[$i]['link'] == '') {
                    $str .= sprintf($tagRssTitle_ExternalLink_LinkOff,  $rssArray[$i]['title']) . PHP_EOL;
                }
                else {
                    $str .= sprintf($tagRssTitle_ExternalLink, $rssArray[$i]['link'], $rssArray[$i]['title']) . PHP_EOL;
                } 
                
            } else {
                if ($rssArray[$i]['link'] == '') {
                    $str .= sprintf($tagRssTitle_LinkOff,  $rssArray[$i]['title']) . PHP_EOL;
                }
                else {
                    $str .= sprintf($tagRssTitle, $rssArray[$i]['link'], $rssArray[$i]['title']) . PHP_EOL;
                } 
                
            }
            
            $str .= sprintf($tagRssContents, $rssArray[$i]['description']) . PHP_EOL;
            $str .= '</dl>' .PHP_EOL;
        }
    }

    $blockRss = $str;
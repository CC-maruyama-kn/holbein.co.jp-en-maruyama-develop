<?php

/**
 * 公開サイト ページング付きRSS出力を編集
 * 一部ページング処理に必要な記述が存在するので、編集する際は【重要】と記載されている箇所を確認すること
 *
 *   設定が必要な変数
 *     $rssArray: RSS配列 ただし、ページごとに分かれている
 *     具体的には、1ページにつき2件表示する場合、
 *     [[$rss, $rss], [$rss, $rss], [$rss, $rss], ...]
 *     となる
 *     $rssTotalArticles: 全部で何件存在するか
 *     $rssShowArticlesPerPage: 1ページにつき何件表示するか
 *
 *   設定される変数
 *     $blockRss: RSSの出力HTML
 *     $blockRssJS:  ページングイベント処理に必要なJavaScript 書き換え不要
 */

/**
 * @var array $rssArray
 * @var int $rssTotalArticles
 * @var int $rssShowArticlesPerPage
 */
$style = <<<HTML
<style>
    .rss_paging_button {
        cursor: pointer;
    }
    .rss_paging_button.rss_paging_button_unclickable {
        cursor: default;
    }
</style>
HTML;

$tagRssDate = '<dt class="rss_date">%s</dt>';
$tagRssTitleWithLink = '<dd class="rss_title"><a href="%s">%s</a></dd>';
$tagRssTitleWithoutLink = '<dd class="rss_title">%s</dd>';
$tagRssTitle_ExternalLinkWithLink = '<dd class="rss_title"><a href="%s" target="_blank">%s</a></dd>';
$tagRssTitle_ExternalLinkWithoutLink = '<dd class="rss_title">%s</dd>';
$tagRssContents = '<dd class="rss_contents">%s</dd>';

$rss_entire_html = "";
foreach ($rssArray as $pageNum => $pageRssArray) {
    $page_html = "";
    foreach ($pageRssArray as $rss) {
        $rss_html = sprintf($tagRssDate, date('Y/m/d', $rss['lastUpdate'])) . PHP_EOL;
        $is_link = !empty($rss['link']);

        // 外部リンク
        if ($rss['external_link_flg']) {
            if ($is_link) {
                $rss_html .= sprintf(
                        $tagRssTitle_ExternalLinkWithLink,
                        $rss['link'],
                        $rss['title']
                    ) . PHP_EOL;
            } else {
                $rss_html .=
                    sprintf($tagRssTitle_ExternalLinkWithoutLink, $rss['title']) . PHP_EOL;
            }
        } else {
            if ($is_link) {
                $rss_html .= sprintf(
                        $tagRssTitleWithLink,
                        $rss['link'],
                        $rss['title']
                    ) . PHP_EOL;
            } else {
                $rss_html .= sprintf($tagRssTitleWithoutLink, $rss['title']) . PHP_EOL;
            }
        }
        $page_html .= sprintf($tagRssContents, $rss['description']) . PHP_EOL;
        $page_html .= "<dl>{$rss_html}</dl>";
    }
    // 【重要】各ページは必ずrss_pageクラスで囲うこと
    $rss_entire_html .= "<div class='rss_page'>{$page_html}</div>";
}

/*
 * RSS表示部分ここまで ここからはページングコントロール表示部
 * 【重要】ページングコントロール表示部に記載されているHTMLクラスのうち、
 *         js-とついているものは必ず残すこと
 *
 *         また、rss_paging_button_unclickableクラスが付与されたボタンはクリックできない
 *         このクラスはJSによるイベントハンドリングで付与される
 *
 *         data属性はそのままにしておくこと
*/
$total_page = count($rssArray);
if ($rssShowArticlesPerPage > $rssTotalArticles) {
    $rssShowArticlesPerPage = $rssTotalArticles;
}
// 1-10件/100件 のような文言
$paging_text = "1-{$rssShowArticlesPerPage}件/{$rssTotalArticles}件";
$page_buttons_html = '';
for ($page = 1; $page <= $total_page; $page++) {
    // 各ページ(1ページ, 2ページ・・・)のボタン
    $is_current_page = $page === 1 ? "true" : "false";
    $page_buttons_html .= <<<HTML
    <span class="rss_paging_button js-rss_paging_each_page_button" 
          data-rss_paging_page="{$page}"
          data-rss_paging_page="{$page}"
          data-rss_paging_is_current="{$is_current_page}"
          >
        {$page}
    </span>
HTML;
}
$paging_control_html = <<<HTML
<div class="rss_paging_container">
    <span class="js-rss_paging_text">{$paging_text}</span>
    <span class="rss_paging_button js-rss_paging_go_first rss_paging_button_unclickable">|&lt;&lt;</span>
    <span class="rss_paging_button js-rss_paging_go_prev rss_paging_button_unclickable">&lt;</span>
    {$page_buttons_html}
    <span class="rss_paging_button js-rss_paging_go_next">&gt;</span>
    <span class="rss_paging_button js-rss_paging_go_last">&gt;&gt;|</span>
</div>
HTML;
$rss_entire_html .= $paging_control_html;

// 【重要】全体をrss_entireクラスで囲うこと また、各data属性はそのままにしておくこと
$blockRss = <<<HTML
<div class='rss_entire' 
     data-rss_total_articles='{$rssTotalArticles}' 
     data-rss_show_articles_per_page='{$rssShowArticlesPerPage}'
     data-rss_current_page='1'
     >
    {$rss_entire_html}
</div>
{$style}
HTML;

// ここより下は、ページング処理のためのJSの記述である 表示には影響しない
$blockRssJS = <<<'HTML'
<script>
    if (!window.rss_event_handling_defined) {
        window.rss_event_handling_defined = true;
        $(() => {
            const $rss_entire = $(".rss_entire");
            $rss_entire.click(function(e) {
                const $current_rss_entire = $(this);
                const $target = $(e.target);
                if ($target.hasClass("js-rss_paging_each_page_button")) {
                    if ($target[0].dataset.rss_paging_is_current === "true") {
                        return;
                    }
                    const page = $target[0].dataset.rss_paging_page;
                    setPage($current_rss_entire, page);
                    renderPagingRss($current_rss_entire);
                }
                else if ($target.hasClass("js-rss_paging_go_first")) {
                    setPage($current_rss_entire, 1);
                    renderPagingRss($current_rss_entire);
                }
                else if ($target.hasClass("js-rss_paging_go_last")) {
                    setLastPage($current_rss_entire);
                    renderPagingRss($current_rss_entire);
                }
                else if ($target.hasClass("js-rss_paging_go_next")) {
                    setNextPage($current_rss_entire, 1);
                    renderPagingRss($current_rss_entire);
                }
                else if ($target.hasClass("js-rss_paging_go_prev")) {
                    setPreviousPage($current_rss_entire, 1);
                    renderPagingRss($current_rss_entire);
                }
            });
            $rss_entire.each(function() {
                renderPagingRss($(this));
            });
        });

        function setLastPage($rss_entire) {
            const last_page = getLastPage($rss_entire);
            setPage($rss_entire, last_page);
        }
        function setNextPage($rss_entire) {
            const current_page = parseInt($rss_entire[0].dataset.rss_current_page);
            setPage($rss_entire, current_page + 1);
        }
        function setPreviousPage($rss_entire) {
            const current_page = parseInt($rss_entire[0].dataset.rss_current_page);
            setPage($rss_entire, current_page - 1);
        }

        function setPage($rss_entire, page) {
            if (!isPageAvailable($rss_entire, page)) {
                return;
            }
            $rss_entire[0].dataset.rss_current_page = page;
            $rss_entire.find(".js-rss_paging_each_page_button").each(function(index){
                if (page === index + 1) {
                    this.dataset.rss_paging_is_current = "true";
                } else {
                    this.dataset.rss_paging_is_current = "false";
                }
            });
        }

        function isPageAvailable($rss_entire, page) {
            const last_page = getLastPage($rss_entire);
            return page > 0 && page <= last_page;
        }

        function getLastPage($rss_entire) {
            const articles_per_page = parseInt($rss_entire[0].dataset.rss_show_articles_per_page);
            const total_articles = parseInt($rss_entire[0].dataset.rss_total_articles);
            return Math.ceil(total_articles / articles_per_page);
        }

        function createText($rss_entire) {
            const one_based_current_page = parseInt($rss_entire[0].dataset.rss_current_page);
            const articles_per_page = parseInt($rss_entire[0].dataset.rss_show_articles_per_page);
            const total_articles = parseInt($rss_entire[0].dataset.rss_total_articles);
            var article_to = one_based_current_page * articles_per_page;
            if (article_to > total_articles) {
                article_to = total_articles;
            }
            const article_from = articles_per_page * (one_based_current_page - 1) + 1;
            return `${article_from}-${article_to}件/${total_articles}件`;

        }

        // ページ表示を切り替える
        function renderPagingRss($rss_entire) {
            const one_based_current_page = parseInt($rss_entire[0].dataset.rss_current_page);
            $rss_entire.find(".rss_page").each(function(zero_based_page) {
                const one_based_page = zero_based_page + 1;
                if (one_based_page === one_based_current_page) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            // ページ遷移ボタンのレンダリング
            const page_button_unclickable_class = "rss_paging_button_unclickable";
            const page_button_current_class = "rss_paging_button_current_page";

            $rss_entire.find(".js-rss_paging_each_page_button").each(function(zero_based_page){
                const one_based_page = zero_based_page + 1;
                const is_current_page = one_based_page === one_based_current_page;
                if (is_current_page) {
                    $(this).addClass(page_button_unclickable_class);
                    $(this).addClass(page_button_current_class);
                } else {
                    $(this).removeClass(page_button_unclickable_class);
                    $(this).removeClass(page_button_current_class);
                }
            });
            if (one_based_current_page === 1) {
                $rss_entire.find(".js-rss_paging_go_first").addClass(page_button_unclickable_class);
                $rss_entire.find(".js-rss_paging_go_prev").addClass(page_button_unclickable_class);
            } else {
                $rss_entire.find(".js-rss_paging_go_first").removeClass(page_button_unclickable_class);
                $rss_entire.find(".js-rss_paging_go_prev").removeClass(page_button_unclickable_class);
            }
            const last_page = getLastPage($rss_entire);
            if (one_based_current_page === last_page) {
                $rss_entire.find(".js-rss_paging_go_last").addClass(page_button_unclickable_class);
                $rss_entire.find(".js-rss_paging_go_next").addClass(page_button_unclickable_class);
            } else {
                $rss_entire.find(".js-rss_paging_go_last").removeClass(page_button_unclickable_class);
                $rss_entire.find(".js-rss_paging_go_next").removeClass(page_button_unclickable_class);
            }

            // テキスト
            $rss_entire.find(".js-rss_paging_text").text(createText($rss_entire));
        }
    }
</script>
HTML;

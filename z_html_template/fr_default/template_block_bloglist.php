<?php
/**
 * 公開サイト BLOG記事一覧出力BMタグを編集
 * 
 * 記事タイトルと投稿内容の最新N件を表示：
 * ###_DCMS_BLOG_LIST_{表示件数}_###
 * 記事タイトルのみ最新N件を表示：
 * ###_DCMS_BLOG_TITLELIST_{表示件数}_###
 * 
 * カテゴリ指定で、記事タイトルと投稿内容の最新N件を表示：
 * ###_DCMS_BLOG_LIST_CATEGORY_{カテゴリURL}_{表示件数}_###
 * カテゴリ指定で、記事タイトルのみ最新N件を表示：
 * ###_DCMS_BLOG_TITLELIST_CATEGORY_{カテゴリURL}_{表示件数}_###
 * 
 * タグ指定で、記事タイトルと投稿内容の最新N件を表示：
 * ###_DCMS_BLOG_LIST_TAG_{タグURL}_{表示件数}_###
 * タグ指定で、記事タイトルのみ最新N件を表示：
 * ###_DCMS_BLOG_TITLELIST_TAG_{タグURL}_{表示件数}_###
 * 
 *   設定が必要な変数
 *     $dcmsBlogListType : 'LIST' 記事タイトルと投稿内容の最新N件を表示、'TITLELIST' 記事タイトルのみ最新N件を表示
 *     $dcmsBlogListArray : BLOG記事一覧配列
 *
 *   設定される変数
 *     $blogPostList
 */

$dcmsBlogPostList = '';
ob_start();
?>

<?php if ($dcmsBlogListType == 'LIST') : ?>

    <?php /* 記事タイトルと投稿内容の最新N件を表示 */?>
    
    <?php foreach ($dcmsBlogListArray as $post):?>
    <div class="blog_section01">
        <div class="blog_article01">
            <span class="blog_date01"><?php echo $post['blogPublishDate_YMD'];?></span>
            <h4 class="blog_subtitle02">
                <?php echo $post['blogSubject'];?>
            </h4>
            <div class="blog_auther01">
                <dl class="blog_dlist01">
                    <dt>作成者 :</dt>
                    <dd><?php echo $post['userName'];?></dd>
                </dl>
            </div>
            <br />
            <p class="blog_text01 readmore">
                <?php echo $post['blogDetailExcerpt'];?>
            </p>
            <br /><a href="<?php echo $post['blogPostUrl'];?>" class="readmore_btn">もっと読む</a>
        </div>
        <div class="blog_info01">
            <?php if (count($post['blogCategory']) > 0) : ?>
            <dl class="blog_dlist01">
                <dt>カテゴリ :</dt>
                <dd>
                <?php foreach ($post['blogCategory'] as $category):?>
                <a href="<?php echo $category['blogCategoryUrlFull'];?>"><?php echo $category['blogCategoryName'];?></a>
                <?php endforeach;?>
                </dd>
            </dl>
            <?php endif;?>
            <?php if (count($post['blogTag']) > 0) : ?>
            <dl class="blog_dlist01">
                <dt>タグ :</dt>
                <dd>
                <?php foreach ($post['blogTag'] as $tag):?>
                <a href="<?php echo $tag['blogTagUrlFull'];?>"><?php echo $tag['blogTagName'];?></a>
                <?php endforeach;?>
                </dd>
            </dl>
            <?php endif;?>
        </div>
    </div>
    <?php endforeach;?>

<?php else:?>

    <?php /* 記事タイトルのみ最新N件を表示 */?>

    <?php foreach ($dcmsBlogListArray as $post):?>
    <div class="blog_section01">
        <div class="blog_article01">
            <span class="blog_date01"><?php echo $post['blogPublishDate_YMD'];?></span>
            <h4 class="blog_subtitle02">
                <?php echo $post['blogSubject'];?>
            </h4>
            <div class="blog_auther01">
                <dl class="blog_dlist01">
                    <dt>作成者 :</dt>
                    <dd><?php echo $post['userName'];?></dd>
                </dl>
            </div>
            <br /><a href="<?php echo $post['blogPostUrl'];?>" class="readmore_btn">もっと読む</a>
        </div>
    </div>
    <?php endforeach;?>

<?php endif;?>

<?php 
$dcmsBlogPostList = ob_get_clean();
?>
                            
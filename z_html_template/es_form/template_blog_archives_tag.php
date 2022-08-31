<?php
/**
 * 公開サイト ブログ(タグアーカイブページ)
 */
?>
<?php echo '<' . '?xml version="1.0" encoding="utf-8"?' . '>' . PHP_EOL;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ja" xml:lang="ja" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title><?php echo $this->metaTitle;?></title>
    <meta name="keywords" content="<?php echo $this->metaKeyword;?>">
    <meta name="description" content="<?php echo $this->metaDescription;?>">

    <link rel="stylesheet" type="text/css" href="<?php echo $this->baseUrl;?>dcms_media/css/index.css" media="all"></head>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->baseUrl;?>dcms_media/css/blog.css" media="all"></head>
    <?php echo $this->req['contentsBaseLayoutInfo']['contentsBaseHead'] . PHP_EOL;?>
<body class="common">
    <?php echo $this->snsTagScript . PHP_EOL;?>
    <a name="top" id="top"></a>
    <div id="wrapper">
        <?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:HEADER_###');?>
        <!--header end-->

        <?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:LEFTNAVI_###');?>

        <div id="cms-content">
            <div id="contents">
                <div id="locator">
                    <?php echo $this->getDcmsCommonParts('###_DCMS_BODY_PAGE_NAVI_###');?>
                </div>
                <div id="contents_left">
                    <!-- ブロック貼り付けエリア -->
                    <div id="dcms_layoutPageBlockPasteArea">
                        <!-- ブロック -->
                        <div id="dcms_layoutPageBlock">

                            <div class="blog_section02">
                                <h3 class="blog_subtitle01">
                                   <?php echo $this->blogSettings['blogName'];?>
                                   <span class="blog_subtext01"><?php echo $this->blogSettings['blogSubName'];?></span>
                                </h3>
                                
                                <?php if (count($this->tagList) > 0) : ?>
                                <div class="blog_archive_list_box01">
                                    <ul class="blog_list">
                                    <?php foreach ($this->tagList as $tag):?>
                                        <?php if ($tag['current']) : ?>
                                        <li class="current"><a href="<?php echo $tag['blogArchivesTagUrl'];?>"><?php echo $tag['blogTagName'];?></a></li>
                                        <?php else:?>
                                        <li><a href="<?php echo $tag['blogArchivesTagUrl'];?>"><?php echo $tag['blogTagName'];?></a></li>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                    </ul>
                                </div>
                                <?php endif;?>
                                
                                <h4 class="blog_subtitle04">タグ：<strong>「<?php echo $this->currentTagName;?>」</strong>の記事（<?php echo $this->currentTagCount;?>件）</h4>
                                
                                <?php if (count($this->list) > 0) : ?>
                                <div class="blog_pull_right">
                                    <?php if ($this->sortAsc) : ?>
                                    <a href="<?php echo $this->linkSortDesc;?>">新しい順</a> | 古い順
                                    <?php else:?>
                                    新しい順 | <a href="<?php echo $this->linkSortAsc;?>">古い順</a>
                                    <?php endif;?>
                                </div>
                                <?php endif;?>
                                
                            </div>
                            <div class="blog_pager01">    
                                <?php echo $this->searchPageLink();?>
                            </div>
                            
                            <?php if (count($this->list) == 0) : ?>
                            
                            <div class="blog_section01">
                                <div class="blog_article01">
                                    <p class="blog_text01 readmore">
                                        記事が見つかりませんでした。
                                    </p>
                                </div>
                            </div>                            
                            
                            <?php else :?>
                            
                            <?php foreach ($this->list as $post):?>
                            <div class="blog_section01">
                                <?php if (!empty($post['blogCoverImageUrl'])) : ?>
                                <div class="blog_cover_thum_small">
                                    <p class="blog_thum_wrap_small"><a href="<?php echo $post['blogPostUrl'];?>"><img src="<?php echo $post['blogCoverImageUrl'];?>" alt="" /></a></p>
                                </div>
                                <?php endif;?>
                                <div class="blog_article01">
                                    <span class="blog_date01"><?php echo $post['blogPublishDate_YMD'];?></span>
                                    <h4 class="blog_subtitle02">
                                        <a href="<?php echo $post['blogPostUrl'];?>"><?php echo $post['blogSubject'];?></a>
                                    </h4>
                                    <?php if (count($post['blogSnsButton']) > 0) : ?>
                                    <div class="blog_sns_area">
                                        <ul>
                                            <?php if (!empty($post['blogSnsButton']['twitter'])) : ?>
                                            <li class="blog_twitter_btn">
                                                <?php echo $post['blogSnsButton']['twitter'];?>
                                            </li>
                                            <?php endif;?>
                                            <?php if (!empty($post['blogSnsButton']['facebook'])) : ?>
                                            <li class="blog_facebook_btn">
                                                <?php echo $post['blogSnsButton']['facebook'];?>
                                            </li>
                                            <?php endif;?>
                                            <?php if (!empty($post['blogSnsButton']['google'])) : ?>
                                            <li class="blog_google_btn">
                                                <?php echo $post['blogSnsButton']['google'];?>
                                            </li>
                                            <?php endif;?>
                                            <?php if (!empty($post['blogSnsButton']['mixi'])) : ?>
                                            <li class="blog_mixi_btn">
                                                <?php echo $post['blogSnsButton']['mixi'];?>
                                            </li>
                                            <?php endif;?>
                                            <?php if (!empty($post['blogSnsButton']['line'])) : ?>
                                            <li class="blog_line_btn">
                                                <?php echo $post['blogSnsButton']['line'];?>
                                            </li>
                                            <?php endif;?>
                                        </ul>
                                    </div>
                                    <?php endif;?>
                                    <div class="blog_auther01">
                                        <dl class="blog_dlist01">
                                            <dt>作成者 :</dt>
                                            <dd><?php echo $post['userName'];?></dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                            
                            <?php endif;?>
                            
                            <div class="blog_pager01">
                                <?php echo $this->searchPageLink();?>
                            </div>
                        </div>
                        <!-- // ブロック -->
                    </div>
                    <!-- // ブロック貼り付けエリア -->
                </div>
                <?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:RIGHTNAVI_###');?>
            </div>
        </div>
        <div class="clearfloat"></div>

        <?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:FOOTER_###');?>
        <!--footer end-->
    </div>
    <form method="get" id="fPageChg">
    <?php echo $this->hiddenParams($this->paramTrans, 'fPageChg');?>
    </form>
</body>
</html>
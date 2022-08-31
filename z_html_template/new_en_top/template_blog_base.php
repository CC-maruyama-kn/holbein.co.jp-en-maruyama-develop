<?php
/**
 * 公開サイト ブログ(記事単一ページ)
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
                            
                            <div class="blog_section01">
                                <?php if (!empty($this->post['blogCoverImageUrl'])) : ?>
                                <div class="blog_thum_wide">
                                    <img src="<?php echo $this->post['blogCoverImageUrl'];?>" alt="" />
                                </div>
                                <?php endif;?>
                                <div class="blog_article01">
                                    <span class="blog_date01"><?php echo $this->post['blogPublishDate_YMD'];?></span>
                                    <h4 class="blog_subtitle02">
                                        <?php echo $this->post['blogSubject'];?>
                                    </h4>
                                    <?php if (count($this->post['blogSnsButton']) > 0) : ?>
                                    <div class="blog_sns_area">
                                        <ul>
                                            <?php if (!empty($this->post['blogSnsButton']['twitter'])) : ?>
                                            <li class="blog_twitter_btn">
                                                <?php echo $this->post['blogSnsButton']['twitter'];?>
                                            </li>
                                            <?php endif;?>
                                            <?php if (!empty($this->post['blogSnsButton']['facebook'])) : ?>
                                            <li class="blog_facebook_btn">
                                                <?php echo $this->post['blogSnsButton']['facebook'];?>
                                            </li>
                                            <?php endif;?>
                                            <?php if (!empty($this->post['blogSnsButton']['google'])) : ?>
                                            <li class="blog_google_btn">
                                                <?php echo $this->post['blogSnsButton']['google'];?>
                                            </li>
                                            <?php endif;?>
                                            <?php if (!empty($this->post['blogSnsButton']['mixi'])) : ?>
                                            <li class="blog_mixi_btn">
                                                <?php echo $this->post['blogSnsButton']['mixi'];?>
                                            </li>
                                            <?php endif;?>
                                            <?php if (!empty($this->post['blogSnsButton']['line'])) : ?>
                                            <li class="blog_line_btn">
                                                <?php echo $this->post['blogSnsButton']['line'];?>
                                            </li>
                                            <?php endif;?>
                                        </ul>
                                    </div>
                                    <?php endif;?>
                                    <div class="blog_info01">
                                        <?php if (count($this->post['blogCategory']) > 0) : ?>
                                        <dl class="blog_dlist01">
                                            <dt>カテゴリ :</dt>
                                            <dd>
                                            <?php foreach ($this->post['blogCategory'] as $category):?>
                                            <a href="<?php echo $category['blogCategoryUrlFull'];?>"><?php echo $category['blogCategoryName'];?></a>
                                            <?php endforeach;?>
                                            </dd>
                                        </dl>
                                        <?php endif;?>
                                        <?php if (count($this->post['blogTag']) > 0) : ?>
                                        <dl class="blog_dlist01">
                                            <dt>タグ :</dt>
                                            <dd>
                                            <?php foreach ($this->post['blogTag'] as $tag):?>
                                            <a href="<?php echo $tag['blogTagUrlFull'];?>"><?php echo $tag['blogTagName'];?></a>
                                            <?php endforeach;?>
                                            </dd>
                                        </dl>
                                        <?php endif;?>
                                    </div>
                                    <div class="blog_auther01">
                                        <dl class="blog_dlist01">
                                            <dt>作成者 :</dt>
                                            <dd><?php echo $this->post['userName'];?></dd>
                                        </dl>
                                    </div>
                                    <div class="blog_text01 detail_text">
                                        <?php echo $this->post['blogDetail'];?>
                                    </div>
                                    
                                    <?php if ($this->feedbackLink) : ?>
                                    <div class="blog_feedback">
                                        <a href="<?php echo $this->feedbackLink;?>"><?php echo $this->feedbackLinkTitle;?></a>
                                    </div>
                                    <?php endif;?>
                                </div>
                            </div>
                            
                            <div class="blog_pager_detail_box01">
                                <ul class="blog_pager_detail_list01">
                                    <?php if ($this->blogPrevPost) : ?>
                                    <li class="prev"><a href="<?php echo $this->linkBlogPrevPost;?>">前の記事</a></li>
                                    <?php endif;?>
                                    <?php if ($this->blogNextPost) : ?>
                                    <li class="next"><a href="<?php echo $this->linkBlogNextPost;?>">次の記事</a></li>
                                    <?php endif;?>
                                </ul>
                            </div>

                            <?php if ($this->facebookComment) : ?>
                            <div class="blog_sns_plugin blog_section01">
                                <h4 class="blog_subtitle03">コメント</h4>
                                <div class="blog_facebook_comment">
                                    <?php echo $this->facebookComment;?>
                                </div>
                            </div>
                            <?php endif;?>
                            
                            <?php if ($this->blogRelatedPosts) : ?>
                            <div class="blog_sns_plugin blog_section01">
                                <h4 class="blog_subtitle03">こちらの記事もどうぞ</h4>
                                <ul class="blog_related_list">
                                    <?php foreach ($this->blogRelatedPosts as $post):?>
                                    <li>
                                        <?php if (!empty($post['blogCoverImageUrl'])) : ?>
                                        <div class="blog_cover_thum_xsmall">
                                            <p class="blog_thum_wrap_xsmall"><a href="<?php echo $post['blogPostUrl'];?>"><img src="<?php echo $post['blogCoverImageUrl'];?>" alt="" /></a></p>
                                        </div>
                                        <div class="blog_article01 blog_cover_text_xsmall">
                                            <a href="<?php echo $post['blogPostUrl'];?>"><?php echo $post['blogSubject'];?></a>
                                        </div>
                                        <?php else:?>
                                        <a href="<?php echo $post['blogPostUrl'];?>"><?php echo $post['blogSubject'];?></a>
                                        <?php endif;?>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                            <?php endif;?>
                        
                            <?php endif;?>
                            
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
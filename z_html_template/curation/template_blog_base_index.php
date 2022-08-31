<?php
/**
 * 公開サイト ブログ(インデックスページ)
 */
?>
<?php echo '<' . '?xml version="1.0" encoding="utf-8"?' . '>' . PHP_EOL;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ja" xml:lang="ja" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title><?php echo $this->blogSettings['blogName'];?> - <?php echo $this->blogSettings['blogSubName'];?></title>
    <meta name="keywords" content="<?php echo $this->metaKeyword;?>">
    <meta name="description" content="<?php echo $this->metaDescription;?>">
    <meta property="og:site_name" content="<?php echo $this->blogSettings['blogName'];?>">
    <meta property="og:locale" content="ja_JP" />
    <meta property="og:title" content="<?php echo $this->blogSettings['blogName'];?> - <?php echo $this->blogSettings['blogSubName'];?>">
    <meta property="og:type" content="blog" />
    <meta property="og:description" content="<?php echo $this->metaDescription;?>">
    <meta property="og:url" content="<?php echo $this->currentUrlFull;?>">
    <meta property="og:image" content="/dcms_media/image/blog_logo_sns.jpg">

    <link rel="stylesheet" type="text/css" href="<?php echo $this->baseUrl;?>dcms_media/css/index.css" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->baseUrl;?>dcms_media/css/blog.css" media="all">
    <?php echo $this->req['contentsBaseLayoutInfo']['contentsBaseHead'] . PHP_EOL;?>

<?php if ($this->req['contentsBaseLayoutInfo']['contentsBaseGoogleAnalytics'] != '') : ?> 
<!--start Google Analytics -->
 <?php echo $this->convertShareSslUrl($this->req['contentsBaseLayoutInfo']['contentsBaseGoogleAnalytics']);?>
<!--end Google Analytics -->
<?php endif; ?>
</head>
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
                                
                                <div class="blog_section01" style="background-color:#efefef;">
                                    <img src="<?php echo $this->baseUrl;?>dcms_media/image/dummyImage02_text.png" alt="ダミーイメージ01" width="728" height="240" />
                                </div>
                                
                                <div class="blog_section02" style="margin-bottom:20px;">
                                    <p><?php echo nl2br($this->blogSettings['blogWholeDescription']);?></p>
                                </div>

                                <h4 class="blog_subtitle03">最新記事</h4>
                            </div>
                            
                            <?php if (count($this->list) == 0) : ?>
                            
                            <div class="blog_section01">
                                <div class="blog_article01 clearfix">
                                    <p class="blog_text01 readmore">
                                        記事が見つかりませんでした。
                                    </p>
                                </div>
                            </div>                            
                            
                            <?php else :?>
                            
                            <?php foreach ($this->list as $post):?>
                            
                            <?php if ($post['isMediaPost']) : ?>
                            <div class="blog_section01 media_<?php echo $post['mediaId'];?>">
                                <?php if (!empty($post['blogCoverImageUrl'])) : ?>
                                <div class="blog_cover_thum">
                                    <p class="blog_thum_wrap"><a href="<?php echo $post['blogPostUrl'];?>"><img src="<?php echo $post['blogCoverImageUrl'];?>" alt="<?php echo isset($post['blogCoverImageAlt']) && $post['blogCoverImageAlt']!='' ? strip_tags($post['blogCoverImageAlt']) : strip_tags($post['blogSubject']) ;?>" /></a></p>
                                </div>
                                <div class="blog_article01 blog_cover_text clearfix cur_<?php echo $post['curationNum'];?>">
                                <?php else:?>
                                <div class="blog_article01 clearfix cur_<?php echo $post['curationNum'];?>">
                                <?php endif;?>
                                    <span class="blog_date01"><?php echo $post['blogPublishDate_YMD'];?><span class="blog_date01_published">（掲載元公開：<?php echo $post['mediaSitePostPublishDate_YMDHI'];?>）</span></span>
                            <?php else:?>
                            <div class="blog_section01">
                                <?php if (!empty($post['blogCoverImageUrl'])) : ?>
                                <div class="blog_cover_thum">
                                    <p class="blog_thum_wrap"><a href="<?php echo $post['blogPostUrl'];?>"><img src="<?php echo $post['blogCoverImageUrl'];?>" alt="<?php echo isset($post['blogCoverImageAlt']) && $post['blogCoverImageAlt']!='' ? strip_tags($post['blogCoverImageAlt']) : strip_tags($post['blogSubject']) ;?>" /></a></p>
                                </div>
                                <div class="blog_article01 blog_cover_text clearfix">
                                <?php else:?>
                                <div class="blog_article01 clearfix">
                                <?php endif;?>
                                    <span class="blog_date01"><?php echo $post['blogPublishDate_YMD'];?></span>
                            <?php endif;?>
                                    
                                    <h4 class="blog_subtitle02">
                                        <?php echo $post['blogSubject'];?>
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
                                        <?php if ($post['isMediaPost']) : ?>
                                        <dl class="blog_dlist01">
                                            <dt>メディア :</dt>
                                            <dd><a href="<?php echo $post['blogArchivesMediaUrl'];?>"><?php echo $post['mediaSiteName'];?></a></dd>
                                        </dl>
                                        <?php endif;?>
                                        <dl class="blog_dlist01">
                                            <dt>作成者 :</dt>
                                            <dd><?php echo $post['userName'];?></dd>
                                        </dl>
                                    </div>
                                    <br />
                                    <p class="blog_text01 readmore">
                                        <?php echo $post['blogDetailExcerpt'];?>
                                    </p>
                                    <?php if ($post['isMediaPost']) : ?>
                                    <a href="<?php echo $post['mediaSitePostUrl'];?>" class="readmore_btn" target="_blank">もっと読む</a>
                                    <?php else:?>
                                    <a href="<?php echo $post['blogPostUrl'];?>" class="readmore_btn">もっと読む</a>
                                    <?php endif;?>
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
                                <?php if ($post['isMediaPost']) : ?>
                                <div class="media_info01 clearfix">
                                    <?php if (!empty($post['mediaImageUrl'])) : ?>
                                    <div class="media_info_img"><a href="<?php echo $post['blogArchivesMediaUrl'];?>"><img src="<?php echo $post['mediaImageUrl'];?>" /></a></div>
                                    <?php else:?>
                                    <div class="media_info_img"><a href="<?php echo $post['blogArchivesMediaUrl'];?>"><img src="<?php echo $this->baseUrl;?>dcms_media/image/media_noimage_large.png" /></a></div>
                                    <?php endif;?>
                                    <div class="media_info_text">
                                        <div class="media_info_text_name"><a href="<?php echo $post['mediaSiteUrl'];?>" target="_blank"><?php echo $post['mediaSiteName'];?></a>&nbsp;<a href="<?php echo $post['blogArchivesMediaUrl'];?>">（<?php echo $post['mediaName'];?>）</a></div>
                                        <div class="media_info_text_url"><a href="<?php echo $post['mediaSiteUrl'];?>" target="_blank"><?php echo $post['mediaSiteUrl'];?></a></div>
                                        <div class="media_info_text_explain"><?php echo nl2br($post['mediaDescription']);?></div>
                                    </div>
                                </div>
                                <?php endif;?>
                            </div>
                            <?php endforeach;?>
                            
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
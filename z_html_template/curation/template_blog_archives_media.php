<?php
/**
 * 公開サイト ブログ(メディアアーカイブページ)
 */
?>
<?php echo '<' . '?xml version="1.0" encoding="utf-8"?' . '>' . PHP_EOL;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ja" xml:lang="ja" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>メディア：<?php echo $this->currentMediaSiteName;?>の記事 - <?php echo $this->blogSettings['blogName'];?></title>
    <meta name="keywords" content="<?php echo $this->metaKeyword;?>">
    <meta name="description" content="<?php echo $this->metaDescription;?>">
    <meta property="og:site_name" content="<?php echo $this->blogSettings['blogName'];?>">
    <meta property="og:locale" content="ja_JP" />
    <meta property="og:title" content="メディア：<?php echo $this->currentMediaSiteName;?>の記事 - <?php echo $this->blogSettings['blogName'];?>">
    <meta property="og:type" content="article" />
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
                                
                                <?php if (count($this->mediaList) > 0) : ?>
                                <div class="blog_section01 blog_media_info_list">
                                    <?php foreach ($this->mediaList as $media):?>

                                        <?php if ($media['current']) : ?>
                                        <div class="media_info01 blog_media_info media_<?php echo $media['mediaId'];?> clearfix current">
                                        <?php else:?>
                                        <div class="media_info01 blog_media_info media_<?php echo $media['mediaId'];?> clearfix">
                                        <?php endif;?>
                                        
                                        <?php if (!empty($media['mediaImageUrl'])) : ?>
                                        <div class="media_info_img"><a href="<?php echo $media['mediaSiteUrl'];?>" target="_blank"><img src="<?php echo $media['mediaImageUrl'];?>" /></a></div>
                                        <?php else:?>
                                        <div class="media_info_img"><a href="<?php echo $media['mediaSiteUrl'];?>" target="_blank"><img src="<?php echo $this->baseUrl;?>dcms_media/image/media_noimage_large.png" /></a></div>
                                        <?php endif;?>
                                        <div class="media_info_text">
                                            <div class="media_info_text_name"><a href="<?php echo $media['mediaSiteUrl'];?>" target="_blank"><?php echo $media['mediaSiteName'];?></a>&nbsp;<a href="<?php echo $media['blogArchivesMediaUrl'];?>">（<?php echo $media['mediaName'];?>）</a></div>
                                            <div class="media_info_text_url"><a href="<?php echo $media['mediaSiteUrl'];?>" target="_blank"><?php echo $media['mediaSiteUrl'];?></a></div>
                                            <div class="media_info_text_explain"><?php echo nl2br($media['mediaDescription']);?></div>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
                                </div>
                                <?php endif;?>
                                
                                <h4 class="blog_subtitle04">メディア：<strong>「<?php echo $this->currentMediaSiteName;?>」</strong>の記事（<?php echo $this->currentMediaCount;?>件）</h4>
                                
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
                            
                            <!-- メディア情報出力ここから -->
                            <div class="blog_section01 blog_media_info">
                                <div class="media_info01 media_<?php echo $this->current['mediaId'];?> clearfix"><!-- メディア ID をクラスとして出力 -->
                                        
                                    <?php if (!empty($this->current['mediaImageUrl'])) : ?>
                                    <div class="media_info_img"><a href="<?php echo $this->current['mediaSiteUrl'];?>" target="_blank"><img src="<?php echo $this->current['mediaImageUrl'];?>" /></a></div>
                                    <?php else:?>
                                    <div class="media_info_img"><a href="<?php echo $this->current['mediaSiteUrl'];?>" target="_blank"><img src="<?php echo $this->baseUrl;?>dcms_media/image/media_noimage_large.png" /></a></div>
                                    <?php endif;?>
                                    <div class="media_info_text">
                                        <div class="media_info_text_name"><a href="<?php echo $this->current['mediaSiteUrl'];?>" target="_blank"><?php echo $this->current['mediaSiteName'];?></a>&nbsp;<a href="<?php echo $this->current['blogArchivesMediaUrl'];?>">（<?php echo $this->current['mediaName'];?>）</a></div>
                                        <div class="media_info_text_url"><a href="<?php echo $this->current['mediaSiteUrl'];?>" target="_blank"><?php echo $this->current['mediaSiteUrl'];?></a></div>
                                        <div class="media_info_text_explain"><?php echo nl2br($this->current['mediaDescription']);?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- メディア情報出力ここまで -->
                            
                            <div class="blog_pager01">    
                                <?php echo $this->searchPageLink();?>
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
                            <div class="blog_section01 media_<?php echo $post['mediaId'];?>">
                                <?php if (!empty($post['blogCoverImageUrl'])) : ?>
                                <div class="blog_cover_thum_small">
                                    <p class="blog_thum_wrap_small"><a href="<?php echo $post['blogPostUrl'];?>"><img src="<?php echo $post['blogCoverImageUrl'];?>" alt="<?php echo isset($post['blogCoverImageAlt']) && $post['blogCoverImageAlt']!='' ? strip_tags($post['blogCoverImageAlt']) : strip_tags($post['blogSubject']) ;?>" /></a></p>
                                </div>
                                <?php endif;?>
                                <div class="blog_article01 clearfix cur_<?php echo $post['curationNum'];?>">
                                    <span class="blog_date01"><?php echo $post['blogPublishDate_YMD'];?><span class="blog_date01_published">（掲載元公開：<?php echo $post['mediaSitePostPublishDate_YMDHI'];?>）</span></span>
                                    <h4 class="blog_subtitle02">
                                        <a href="<?php echo $post['blogPostUrl'];?>"><?php echo $post['blogSubject'];?></a>
                                    </h4>
                                    <a href="<?php echo $post['mediaSitePostUrl'];?>" class="readmore_btn" target="_blank">続きを読む</a>
                                    
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
                                    <div class="blog_auther01 clearfix">
                                        <dl class="blog_dlist01">
                                            <dt>メディア :</dt>
                                            <dd><a href="<?php echo $post['blogArchivesMediaUrl'];?>"><?php echo $post['mediaSiteName'];?></a></dd>
                                        </dl>
                                        <dl class="blog_dlist01">
                                            <dt>作成者 :</dt>
                                            <dd><?php echo $post['userName'];?></dd>
                                        </dl>
                                    </div>
                                </div>
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
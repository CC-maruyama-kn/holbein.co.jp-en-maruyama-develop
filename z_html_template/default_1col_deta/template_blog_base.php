<?php
/**
* 公開サイト ブログ(記事単一ページ)
*/
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">-->
<title><?php echo $this->post['blogSubject'];?>-<?php echo $this->blogSettings['blogName'];?></title>
<meta name="keywords" content="<?php echo $this->metaKeyword;?>">
<meta name="description" content="<?php echo $this->metaDescription;?>">
<meta property="og:site_name" content="<?php echo $this->blogSettings['blogName'];?>">
<meta property="og:locale" content="ja_JP" />
<meta property="og:title" content="<?php echo $this->post['blogSubject']; ?>" />
<meta property="og:type" content="article" />
<meta property="og:description" content="<?php echo $this->post['blogDetailExcerpt']; ?>" />
<meta property="og:url" content="<?php echo $this->post['blogPostUrl']; ?>" />
<meta property="og:image" content="<?php echo $this->post['blogCoverImageUrl'];?>">
<?php echo $this->req['contentsBaseLayoutInfo']['contentsBaseHead'] . PHP_EOL;?>
<?php if ($this->req['adminPreviewFlg'] === FALSE && $this->req['contentsBaseLayoutInfo']['contentsBaseGoogleAnalytics'] != '') : ?>
<!--start Google Analytics -->
<?php echo $this->convertShareSslUrl($this->req['contentsBaseLayoutInfo']['contentsBaseGoogleAnalytics']
<!--end Google Analytics -->);?>
<?php endif; ?>
</head><body id="common" class="common">
<?php echo $this->snsTagScript . PHP_EOL;?>
<div id="wrapper"><!--header st--> 
<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:HEADER_###');?> 
<!--header end--> <?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:LEFTNAVI_###');?>
<div id="contents"><!--locator st--> 
<div id="locator"> <?php echo $this->getDcmsCommonParts('###_DCMS_BODY_PAGE_NAVI_###');?> </div>
<!--locator end--> <div id="contents_left"> 
<!-- ブロック貼り付けエリア -->
<div id="dcms_layoutPageBlockPasteArea"> 
<!-- ブロック -->
<div id="dcms_layoutPageBlock">
<div class="blog_section02">
<h3 class="blog_subtitle01"> <?php echo $this->blogSettings['blogName'];?> <span class="blog_subtext01"><?php echo $this->blogSettings['blogSubName'];?></span> </h3>
</div>
<?php if (count($this->list) == 0) : ?>
<div class="blog_section01">
<div class="blog_article01">
<p class="blog_text01 readmore"> 記事が見つかりませんでした。 </p>
</div>
</div>
<?php else :?>
<div class="blog_section01"><!--カバー写真 st--> 
<?php if (!empty($this->post['blogCoverImageUrl'])) : ?>
<div class="blog_thum_wide"> <img src="<?php echo $this->post['blogCoverImageUrl'];?>" alt="" /> </div>
<?php endif;?>
<!--カバー写真 end--> <div class="blog_article01"><!--日付 st-->
<time class="blog_date01"><?php echo $this->post['blogPublishDate_YMD'];?></time>
<!--日付 end--><h4 class="blog_subtitle02"> <?php echo $this->post['blogSubject'];?> </h4><!--sns st-->
<?php if (count($this->post['blogSnsButton']) > 0) : ?>
<?php if (count($post['blogSnsButton']) > 0) : ?>
<div class="blog_sns_area">
<ul>
<?php if (!empty($post['blogSnsButton']['twitter'])) : ?>
<li class="blog_twitter_btn"> <?php echo $post['blogSnsButton']['twitter'];?> </li>
<?php endif;?>
<?php if (!empty($post['blogSnsButton']['facebook'])) : ?>
<li class="blog_facebook_btn"> <?php echo $post['blogSnsButton']['facebook'];?> </li>
<?php endif;?>
<?php if (!empty($post['blogSnsButton']['google'])) : ?>
<li class="blog_google_btn"> <?php echo $post['blogSnsButton']['google'];?> </li>
<?php endif;?>
<?php if (!empty($post['blogSnsButton']['mixi'])) : ?>
<li class="blog_mixi_btn"> <?php echo $post['blogSnsButton']['mixi'];?> </li>
<?php endif;?>
<?php if (!empty($post['blogSnsButton']['line'])) : ?>
<li class="blog_line_btn"> <?php echo $post['blogSnsButton']['line'];?> </li>
<?php endif;?>
</ul>
</div>
<?php endif;?>
<?php endif;?>
<!--sns end--><div class="blog_info01">
<!--カテゴリ st-->
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
<!--カテゴリ end-->
<!--タグ st-->
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
<!--タグ end-->
</div>
<div class="blog_auther01">
<dl class="blog_dlist01">
<dt>作成者 :</dt>
<dd><?php echo $this->post['userName'];?></dd>
</dl>
</div>
<div class="blog_text01 detail_text"> <?php echo $this->post['blogDetail'];?> </div>
<?php if ($this->feedbackLink) : ?>
<div class="blog_feedback"> <a href="<?php echo $this->feedbackLink;?>"><?php echo $this->feedbackLinkTitle;?></a> </div>
<?php endif;?>
</div>
</div><!--前次 st-->
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
<!--前次 end--><!--facebook コメント st-->
<?php if ($this->facebookComment) : ?>
<div class="blog_sns_plugin blog_section01">
<h4 class="blog_subtitle03">コメント</h4>
<div class="blog_facebook_comment"> <?php echo $this->facebookComment;?> </div>
</div>
<?php endif;?>
<!--facebook コメント end--><!--関連記事 st-->
<?php if ($this->blogRelatedPosts) : ?>
<div class="blog_sns_plugin blog_section01">
<h4 class="subtitle04">こちらの記事もどうぞ</h4>
<ul class="blog_related_list">
<?php foreach ($this->blogRelatedPosts as $post):?>
<li>
<?php if (!empty($post['blogCoverImageUrl'])) : ?>
<div class="blog_cover_thum_xsmall">
<p class="blog_thum_wrap_xsmall"><a href="<?php echo $post['blogPostUrl'];?>"><img src="<?php echo $post['blogCoverImageUrl'];?>" alt="" /></a></p>
</div>
<div class="blog_article01 blog_cover_text_xsmall"> <a href="<?php echo $post['blogPostUrl'];?>"><?php echo $post['blogSubject'];?></a> </div>
<?php else:?>
<a href="<?php echo $post['blogPostUrl'];?>"><?php echo $post['blogSubject'];?></a>
<?php endif;?>
</li>
<?php endforeach;?>
</ul>
</div>
<?php endif;?>
<!--関連記事 end--><?php endif;?>
</div>
<!-- // ブロック --> 
</div>
<!-- // ブロック貼り付けエリア --> 
</div>
<!--contents_left st--> <!--contents_right st--> 
<div id="contents_right">
<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:RIGHTNAVI_###');?> </div>
</div>
</div>
<!--contents_right,contents end--> <!--footer st-->
<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:FOOTER_###');?> 
<!--footer end--> </div>
<form method="get" id="fPageChg">
<?php echo $this->hiddenParams($this->paramTrans, 'fPageChg');?>
</form>
</body>
</html>
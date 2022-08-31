<?php
/**
* 公開サイト ブログ(タグアーカイブページ)
*/
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">-->
<title>タグ：<?php echo $this->currentTagName;?>の記事 -<?php echo $this->blogSettings['blogName'];?></title>
<meta name="keywords" content="<?php echo $this->metaKeyword;?>">
<meta name="description" content="<?php echo $this->metaDescription;?>">
<meta property="og:site_name" content="<?php echo $this->blogSettings['blogName'];?>">
<meta property="og:locale" content="ja_JP" />
<meta property="og:title" content="タグ：<?php echo $this->currentTagName;?>の記事 - <?php echo $this->blogSettings['blogName'];?>">
<meta property="og:type" content="article" />
<meta property="og:description" content="<?php echo $this->metaDescription;?>">
<meta property="og:url" content="http://xxxxxxx.xxx/">
<meta property="og:image" content="/dcms_media/image/blog_logo_sns.jpg"><?php echo $this->req['contentsBaseLayoutInfo']['contentsBaseHead'] . PHP_EOL;?>
<?php if ($this->req['contentsBaseLayoutInfo']['contentsBaseGoogleAnalytics'] != '') : ?>
<!--start Google Analytics -->
<?php echo $this->convertShareSslUrl($this->req['contentsBaseLayoutInfo']['contentsBaseGoogleAnalyti
<!--end Google Analytics -->cs']);?>
<?php endif; ?>
</head><body id="common" class="common">
<?php echo $this->snsTagScript . PHP_EOL;?>
<div id="wrapper"><!--header st--> 
<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:HEADER_###');?> 
<!--header end--> <?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:LEFTNAVI_###');?><div id="contents" class="clearfix"><!--locator st--> 
<div id="locator"> <?php echo $this->getDcmsCommonParts('###_DCMS_BODY_PAGE_NAVI_###');?> </div>
<!--locator end--> 
<div id="contents_left" class="clearfix"> <!-- ブロック貼り付けエリア -->
<div id="dcms_layoutPageBlockPasteArea"> 
<!-- ブロック -->
<div id="dcms_layoutPageBlock"><div class="blog_section02">
<h3 class="subtitle03"> <?php echo $this->blogSettings['blogName'];?> <span class="blog_subtext01"><?php echo $this->blogSettings['blogSubName'];?></span> </h3>
<!--タグ リスト st--> 
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
<!--タグ リスト end--> <h4 class="subtitle04">タグ：<strong>「<?php echo $this->currentTagName;?>」</strong>の記事（<?php echo $this->currentTagCount;?>件）</h4><!--新しい古い順 st--> 
<?php if (count($this->list) > 0) : ?>
<div class="blog_pull_right">
<?php if ($this->sortAsc) : ?>
<a href="<?php echo $this->linkSortDesc;?>">新しい順</a> | 古い順
<?php else:?>
新しい順 | <a href="<?php echo $this->linkSortAsc;?>">古い順</a>
<?php endif;?>
</div>
<?php endif;?>
<!--新しい古い順 end--> </div><!--pager st-->
<div class="blog_pager01"> <?php echo $this->searchPageLink();?> </div>
<!--pager end--><?php if (count($this->list) == 0) : ?>
<div class="blog_section01">
<div class="blog_article01">
<p class="blog_text01 readmore"> 記事が見つかりませんでした。 </p>
</div>
</div>
<?php else :?>
<?php foreach ($this->list as $post):?>
<div class="blog_section01"><!--カバー写真 st--> 
<?php if (!empty($post['blogCoverImageUrl'])) : ?>
<div class="blog_cover_thum_small">
<p class="blog_thum_wrap_small"><a href="<?php echo $post['blogPostUrl'];?>"><img src="<?php echo $post['blogCoverImageUrl'];?>" alt="" /></a></p>
</div>
<?php endif;?>
<!--カバー写真 end--> 
<div class="blog_article01"><!--日付 st-->
<time class="blog_date01"><?php echo $post['blogPublishDate_YMD'];?></time>
<!--日付 end--><h4 class="subtitle04"> <a href="<?php echo $post['blogPostUrl'];?>"><?php echo $post['blogSubject'];?></a></h4><!--sns st-->
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
<!--sns end--><div class="blog_auther01">
<dl class="blog_dlist01">
<dt>作成者 :</dt>
<dd><?php echo $post['userName'];?></dd>
</dl>
</div></div>
</div>
<?php endforeach;?>
<?php endif;?><!--pager st-->
<div class="blog_pager01"> <?php echo $this->searchPageLink();?> </div>
<!--pager end--></div>
<!-- // ブロック --> 
</div>
<!-- // ブロック貼り付けエリア --> 
<!--contents_left end--> <!--contents_right st--> 
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
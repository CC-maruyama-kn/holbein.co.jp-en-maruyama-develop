<?php
/**
* 公開サイト ブログ(記事一覧ページ)
*/
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">-->
<title><?php echo $this->req['folderNavi'][-1]['contentsName']; ?>-<?php echo $this->blogSettings['blogName'];?></title>
<meta name="keywords" content="<?php echo $this->metaKeyword;?>">
<meta name="description" content="<?php echo $this->metaDescription;?>">
<meta property="og:site_name" content="<?php echo $this->blogSettings['blogName'];?>">
<meta property="og:locale" content="ja_JP" />
<meta property="og:title" content="<?php echo $this->req['folderNavi'][-1]['contentsName']; ?> - <?php echo $this->blogSettings['blogName'];?>">
<meta property="og:type" content="article" />
<meta property="og:description" content="<?php echo $this->metaDescription;?>">
<meta property="og:url" content="http://xxxxxxx.xxx/">
<meta property="og:image" content="/dcms_media/image/blog_logo_sns.jpg">
<?php echo $this->req['contentsBaseLayoutInfo']['contentsBaseHead'] . PHP_EOL;?>
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
<!--locator end--> <!--contents_left st--> 
<div id="contents_left"> 
<!-- ブロック貼り付けエリア -->
<div id="dcms_layoutPageBlockPasteArea"> 
<!-- ブロック -->
<div id="dcms_layoutPageBlock"><!--blog_section02 st-->
<div class="blog_section02">
<h1 class="subtitle01"> <?php echo $this->blogSettings['blogName'];?> <span class="blog_subtext01"><?php echo $this->blogSettings['blogSubName'];?></span> </h1>
<?php if ($this->search) : ?>
<h4 class="blog_subtitle04">検索結果：<strong>「<?php echo $this->searchKeyword;?>」</strong></h4>
<br />
（総数：<?php echo $this->pager->searchCount;?>件 ／ <?php echo $this->pager->startCount;?> ～ <?php echo $this->pager->endCount;?>件）
<?php else :?>
<h4 class="subtitle04"><?php echo $this->req['folderNavi'][-1]['contentsName']; ?></h4>
<?php endif;?><!--新しい古い順 st--> 
<?php if (count($this->list) > 0) : ?>
<div class="blog_pull_right">
<?php if ($this->sortAsc) : ?>
<a href="<?php echo $this->linkSortDesc;?>">新しい順</a> | 古い順
<?php else:?>
新しい順 | <a href="<?php echo $this->linkSortAsc;?>">古い順</a>
<?php endif;?>
</div>
<?php endif;?>
<!--新しい古い順 end--> 
</div>
<!--blog_section02 end--><!--pager st-->
<div class="blog_pager01"> <?php echo $this->searchPageLink();?> </div>
<!--pager end-->
<?php if (count($this->list) == 0) : ?>
<div class="blog_section01">
<div class="blog_article01">
<p class="blog_text01 readmore"> 記事が見つかりませんでした。 </p>
</div>
</div>
<?php else :?>
<?php foreach ($this->list as $post):?>
<div class="blog_section01"><!--カバー写真 st--> 
<?php if (!empty($post['blogCoverImageUrl'])) : ?>
<div class="blog_cover_thum">
<p class="blog_thum_wrap"><a href="<?php echo $post['blogPostUrl'];?>"><img src="<?php echo $post['blogCoverImageUrl'];?>" alt="" /></a></p>
</div>
<!--カバー写真 end-->
 
<div class="blog_article01 blog_cover_text">
<?php else:?>
<div class="blog_article01">
<?php endif;?><!--日付 st-->
<time class="blog_date01"><?php echo $post['blogPublishDate_YMD'];?></time>
<!--日付 end--><h4 class="blog_subtitle04"> <?php echo $post['blogSubject'];?> </h4><!--sns st-->
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
</div>
<p class="blog_text01 readmore"> <?php echo $post['blogDetailExcerpt'];?> </p>
<a href="<?php echo $post['blogPostUrl'];?>" class="readmore_btn">もっと読む</a> </div>
<div class="blog_info01"><!--カテゴリ st-->
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
<!--カテゴリ end--><!--タグ st-->
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
<!--タグ end--></div></div>
<?php endforeach;?>
<?php endif;?><!--pager st-->
<div class="blog_pager01"> <?php echo $this->searchPageLink();?> </div>
<!--pager end--></div>
<!--blog_section01 end--></div>
<!-- // ブロック --> 
</div>
<!-- // ブロック貼り付けエリア --> 
</div>
<!--contents_left st--> <!--contents_right st--> 
<div id="contents_right">
<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:RIGHTNAVI_###');?>
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
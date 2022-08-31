<?php
/**
 * 公開サイト ブログ(カテゴリアーカイブページ)
 */
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
  <title>「
    <?php echo $this->currentCategoryName;?>」の記事｜
    <?php echo $this->metaTitle;?>
  </title>
  <meta name="keywords" content="<?php echo $this->metaKeyword;?>">
  <meta name="description" content="<?php echo $this->metaDescription;?>">
  <?php echo $this->req['contentsBaseLayoutInfo']['contentsBaseHead'] . PHP_EOL;?>
  <?php if ($this->req['contentsBaseLayoutInfo']['contentsBaseGoogleAnalytics'] != '') : ?>
  <!--start Google Analytics -->
  <?php echo $this->convertShareSslUrl($this->req['contentsBaseLayoutInfo']['contentsBaseGoogleAnalytics']);?>
  <!--end Google Analytics -->
  <?php endif; ?>
</head>

<body>
  %{FACEBOOKSCRIPT}%
  <!--header st-->
  <?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:HEADER_###');?>
  <!--header end-->
  
<div id="wrapper">
  
  
  	  <!--locator st-->
      		<div class="pagetitle_area">
				<!--↓↓↓パンくず↓↓↓-->
				<div id="locator" class="loca">
					<div class="inner">
						<?php echo $this->getDcmsCommonParts('###_DCMS_BODY_PAGE_NAVI_###');?> 
					</div>
				</div>
				<!--↑↑↑パンくず↑↑↑-->
			</div>
    <!--locator end-->
    

  
  
  

  <!--contents-st-->
  <div id="contents" class="clearfix">
  <div class="contents_inner cf">
    <!--contents_left-st-->
    <div id="contents_left">
    

<div class="pagename_wrap">
<div id="pagetitle" class="pagename">
<h2 class="inner">カテゴリ:「<?php echo $this->currentCategoryName;?>」の記事（<?php echo $this->currentCategoryCount;?>件）</h2>
</div>
</div>
    
    
    
      <!--archive_category-st-->
      <?php if (count($this->categoryList) > 0) : ?>
      <div class="archivelist">
        <div class="list cate">
          <?php foreach ($this->categoryList as $category):?>
          <?php if ($category['current']) : ?>
          <a class="<?php echo $category['blogCategoryUrl'];?> current" href="<?php echo $category['blogArchivesCategoryUrl'];?>">
            <?php echo $category['blogCategoryName'];?>
          </a>
          <?php else:?>
          <a class="<?php echo $category['blogCategoryUrl'];?>" href="<?php echo $category['blogArchivesCategoryUrl'];?>">
            <?php echo $category['blogCategoryName'];?>
          </a>
          <?php endif;?>
          <?php endforeach;?>
        </div>
      </div>
      <?php endif;?>
      <!--archive_category-end-->
      <!-- 新しい順古い順-st -->
      <?php if (count($this->list) > 0) : ?>
      <div class="newold">
        <?php if ($this->sortAsc) : ?>
        <a href="<?php echo $this->linkSortDesc;?>">新しい順</a> | 古い順
        <?php else:?> 新しい順 |
        <a href="<?php echo $this->linkSortAsc;?>">古い順</a>
        <?php endif;?>
      </div>
      <?php endif;?>
      <!-- 新しい順古い順-end -->
      <!-- list-st -->
      <?php if (count($this->list) == 0) : ?>
      <article>
        <p> 記事が見つかりませんでした。</p>
      </article>
      <?php else :?>
      <?php foreach ($this->list as $post):?>
      <!--article-st-->
      <article>
        <figure class="post_thumbnail"><a href="<?php echo $post['blogPostUrl'];?>"><img src="<?php echo $post['blogCoverImageUrl'];?>" alt="<?php echo strip_tags($post['blogSubject']);?>" /></a>
        </figure>
        <section class="info">
          <time><span><?php echo $post['blogPublishDate_YMD'];?></span></time>
          <h1 class="title"><a href="<?php echo $post['blogPostUrl'];?>"><?php echo $post['blogSubject'];?></a></h1>
          <!--category-st-->
          <?php if (count($post['blogCategory']) > 0) : ?>
          <div class="catelist">
            <?php foreach ($post['blogCategory'] as $category):?>
            <a href="<?php echo $category['blogCategoryUrlFull'];?>">
              <?php echo $category['blogCategoryName'];?>
            </a>
            <?php endforeach;?>
          </div>
          <?php endif;?>
          <!--category-end-->
          <!--Tag-st-->
          <?php if (count($post['blogTag']) > 0) : ?>
          <div class="taglist">
            <?php foreach ($post['blogTag'] as $tag):?>
            <a href="<?php echo $tag['blogTagUrlFull'];?>">
              <?php echo $tag['blogTagName'];?>
            </a>
            <?php endforeach;?>
          </div>
          <?php endif;?>
          <!--Tag-end-->
        </section>
      </article>
      <!--article-end-->
      <?php endforeach;?>
      <?php endif;?>
      <!-- list-end -->
      <!-- pager-st -->
      <div class="pager">
        <?php echo $this->searchPageLink();?> </div>
      <!--pager-end-->
    </div>
    <!--contents_left-end-->
    <!--contents_right-st-->
    <div id="contents_right">
      <?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:RIGHTNAVI_###');?> </div>
    <!--contents_right-end-->
  </div>
    </div>
  <!--contents-end-->
  
    </div>
  <!--wrapper-end-->
  
  
  <!--footer-st-->
  <?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:FOOTER_###');?>
  <!--footer-end-->

  <form method="get" id="fPageChg">
    <?php echo $this->hiddenParams($this->paramTrans, 'fPageChg');?>
  </form>



</body>

</html>
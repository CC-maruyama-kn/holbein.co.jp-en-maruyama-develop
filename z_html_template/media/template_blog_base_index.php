<?php
/**
 * 公開サイト ブログ(インデックスページ)
 */
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
  <title>
    <?php echo $this->metaTitle;?>
  </title>
  <meta name="keywords" content="<?php echo $this->metaKeyword;?>">
  <meta name="description" content="<?php echo $this->metaDescription;?>">
  <meta property="og:title" content="<?php echo $this->blogSettings['blogName'];?> - <?php echo $this->blogSettings['blogSubName'];?>">
  <meta property="og:description" content="<?php echo $this->metaDescription;?>">
  <meta property="og:url" content="#">
  <meta property="og:image" content="<?php echo $this->post['blogCoverImageUrl'];?>">
  <?php echo $this->req['contentsBaseLayoutInfo']['contentsBaseHead'] . PHP_EOL;?>
  <?php if (strstr($_SERVER['REQUEST_URI'], '/dcmsadm/') === FALSE && $this->req['contentsBaseLayoutInfo']['contentsBaseGoogleAnalytics'] != '') : ?>
  <!--start Google Analytics -->
  <?php echo $this->convertShareSslUrl($this->req['contentsBaseLayoutInfo']['contentsBaseGoogleAnalytics']);?>
  <!--end Google Analytics -->
  <?php endif; ?>
</head>

<body>
  <!-- スライドに表示させる枚数を指定 -->
  <?php
    const SLIDE_NUM = 5; //スライドに表示させる枚数を指定
    const VIEW_NEWS_NUM = 5; //表示する記事の枚数 現状は最新記事のみを表示(スライド下の最新記事数)
    const VIEW_TAG_NAME = "ピックアップ";//表示対象のタグ名
    /*
    * スライド表示枚数 < blog総数　の場合、
    * スライドとして表示: typeA, 一覧として表示: typeB
    */
    const LAYOUT_TYPE = "typeA";
  ?> %{FACEBOOKSCRIPT}%
  <!--header st-->
  <?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:HEADER_###');?>
  <!--header end-->
  
  <div id="wrapper">
  
  

  
  
  	  <!--locator st-->

				<!--↓↓↓パンくず↓↓↓-->
				<div id="locator" class="loca">
					<div class="inner">
						<?php echo $this->getDcmsCommonParts('###_DCMS_BODY_PAGE_NAVI_###');?>
					</div>
				</div>
				<!--↑↑↑パンくず↑↑↑-->

    <!--locator end-->  



  <!--contents-st-->
  <div id="contents" class="clearfix">
  <div class="contents_inner cf">
    <!--contents_left-st-->
    <div id="contents_left">
      <!-- ブロック貼り付けエリア -->
      <div id="dcms_layoutPageBlockPasteArea">
        <!-- ブロック -->
        <div id="dcms_layoutPageBlock">
        
        
        <h1 class="blogtitle01"><?php echo $this->blogSettings['blogName'];?></h1>
        
        
          <!--flexslider-st-->
          <!--<?php $pickup_flag = 0; //ピックアップ記事が1つ以上存在するか?>
          <?php if (count($this->list) > SLIDE_NUM || (count($this->list) <= SLIDE_NUM && LAYOUT_TYPE === "typeA")) : ?>
          <div class="flexslider">
            <ul class="slides">
              <?php if (count($this->list) == 0) : ?>
                <li>
                  <p> 記事が見つかりませんでした。</p>
                </li>
              <?php else :?>
                <?php
                  $currentSlideItemNum = 0;
                  foreach ($this->list as $post): ?>
                  <?php if($currentSlideItemNum >= SLIDE_NUM ): ?>
                    <?php break;?>
                  <?php else :?>

                  <?php //タグがピックアップ記事かどうか調べる処理?>
                  <?php $view_flag = 0; ?>
                    <?php if (count($post['blogTag']) > 0) : ?>
                      <div class="taglist">
                        <?php foreach ($post['blogTag'] as $tag):?>
                          <?php if ($tag['blogTagName'] == VIEW_TAG_NAME) : ?>
                            <?php $view_flag = 1; ?>
                            <?php $pickup_flag = 1; ?>
                          <?php endif;?>
                        <?php endforeach;?>
                      </div>
                    <?php endif;?>
                    <?php //ピックアップタグを含む場合の処理?>
                    <?php if ($view_flag == 1) : ?>
                      <li style="background-image:url(<?php echo $post['blogCoverImageUrl'];?>);">
                        <div class="mainin">
                          <time><?php echo $post['blogPublishDate_YMD'];?></time>
                          <h1 class="maintitle"><a href="<?php echo $post['blogPostUrl'];?>"><?php echo $post['blogSubject'];?></a></h1>
                          <?php if (count($post['blogCategory']) > 0) : ?>
                            <div class="catelist">
                              <?php foreach ($post['blogCategory'] as $category):?>
                                <a href="<?php echo $category['blogCategoryUrlFull'];?>"><?php echo $category['blogCategoryName'];?></a>
                              <?php endforeach;?>
                            </div>
                          <?php endif;?>
                        </div>
                      </li>
                      <?php $currentSlideItemNum++; ?>
                    <?php endif;?>
                    <?php //ピックアップタグを含む場合の処理 END?>
                  <?php endif;?>
                <?php endforeach;?>
                <?php if($pickup_flag == 0) : //ピックアップの記事が存在しない?>
                  <li>
                  <p> 記事が見つかりませんでした。</p>
                  </li>
                <?php endif;?>

              <?php endif;?>
            </ul>
          </div>
          <?php endif;?>-->
          <!--flexslider-end-->
          <!--list-st-->
          <?php if (count($this->list) > VIEW_NEWS_NUM || (count($this->list) <= VIEW_NEWS_NUM && LAYOUT_TYPE === "typeA")) : ?>
          <?php
            $currentPostNum = 0;
            /*
            if(count($this->list) <= SLIDE_NUM && LAYOUT_TYPE === "typeB"){
              // スライドの指定数より記事数が少ない場合、一覧の開始記事インデックスをずらす
              $currentPostNum = 1;
            }
            */
          ?>
          <main class="top_main">
            <?php if (count($this->list) == 0) : ?>
            <article>
              <p> 記事が見つかりませんでした。</p>
            </article>
            <?php else :?>
            <?php foreach ($this->list as $post):?>
            <?php //if($currentPostNum >= VIEW_NEWS_NUM ): ?>
            <?php //break;?>
            <?php //else :?>
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
            <?php $currentPostNum++; ?>
            <?php //endif;?>
            <?php endforeach;?>
            <?php endif;?>
          </main>
          <?php endif;?>
          <!--list-end-->
          <div class="pager">
            <?php echo $this->searchPageLink();?> </div>
        </div>
        <!-- // ブロック -->
      </div>
      <!-- // ブロック貼り付けエリア -->
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
  <script>
    $( document ).ready( function () {
      $( '.flexslider:not(:has(li))' ).addClass( 'removeThis' );
    } );
  </script>



</body>

</html>
<?php
/**
 * 公開サイト ブログ(記事単一ページ)
 */
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<title><?php echo $this->post['blogSubject'];?>｜<?php echo $this->metaTitle;?></title>
	<meta name="keywords" content="<?php echo $this->metaKeyword;?>">
	<meta name="description" content="<?php echo $this->metaDescription;?>">
	<meta property="og:title" content="<?php echo $this->post['blogSubject'];?>">
	<meta property="og:description" content="<?php echo $this->post['blogDetailExcerpt'];?>">
	<meta property="og:url" content="<?php echo $this->$post['blogPostUrl'];?>">
	<meta property="og:image" content="<?php echo $this->post['blogCoverImageUrl'];?>">

	<?php echo $this->req['contentsBaseLayoutInfo']['contentsBaseHead'] . PHP_EOL;?>
	<?php if (strstr($_SERVER['REQUEST_URI'], '/dcmsadm/') === FALSE && $this->req['contentsBaseLayoutInfo']['contentsBaseGoogleAnalytics'] != '') : ?>
	<!--start Google Analytics -->
	<?php echo $this->convertShareSslUrl($this->req['contentsBaseLayoutInfo']['contentsBaseGoogleAnalytics']);?>
	<!--end Google Analytics -->
	<?php endif; ?>
</head>

<body>
%{FACEBOOKSCRIPT}%

<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:HEADER_###');?>

<div id="container">

<div id="locator"><div class="inner"><?php echo $this->getDcmsCommonParts('###_DCMS_BODY_PAGE_NAVI_###');?></div></div>

<main class="inner">

	<div id="contents_left">
		<!-- ブロック貼り付けエリア -->
		<div id="dcms_layoutPageBlockPasteArea">
		<!-- ブロック -->
		<div id="dcms_layoutPageBlock">
			<div class="pagename"><p class="pagetitle inner"><?php echo $this->metaTitle;?></p></div>
			<article id="main">
				<h1 class="fs120_bolc m30"><?php echo $this->post['blogSubject'];?></h1>
				<!--time st-->
				<time><?php echo $this->post['blogPublishDate_YMD'];?></time>
				<!--time end-->
				<!--category-st-->
				<?php if (count($this->post['blogCategory']) > 0) : ?>
				<div class="catelist">
				<?php foreach ($this->post['blogCategory'] as $category):?>
					<a href="<?php echo $category['blogCategoryUrlFull'];?>"><?php echo $category['blogCategoryName'];?></a>
				<?php endforeach;?>
				</div>
				<?php endif;?>
				<!--category-end-->
				<!--Tag-st-->
				<?php if (count($this->post['blogTag']) > 0) : ?>
				<div class="taglist">
				<?php foreach ($this->post['blogTag'] as $tag):?>
					<a href="<?php echo $tag['blogTagUrlFull'];?>"><?php echo $tag['blogTagName'];?></a>
				<?php endforeach;?>
				</div>
				<?php endif;?>
				<!--Tag-end-->
				<!--sns_share-st-->
				<ul class="sns_share clearfix head">
					<li class="line"><a class="line" href="http://line.me/R/msg/text/?<?php echo $this->post['blogSubject'];?><?php echo $tag['blogTagUrlFull'];?>">LINEで送る</a>
					</li>
					<li class="twitter"><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $post['blogPostUrl'];?>">Tweet</a>
						<script>
						! function ( d, s, id ) {
						var js, fjs = d.getElementsByTagName( s )[ 0 ],
						p = /^http:/.test( d.location ) ? 'http' : 'https';
						if ( !d.getElementById( id ) ) {
							js = d.createElement( s );
							js.id = id;
							js.src = p + '://platform.twitter.com/widgets.js';
							fjs.parentNode.insertBefore( js, fjs );
						}
						}( document, 'script', 'twitter-wjs' );
						</script>
					</li>
					<li class="fb">
						<div class="fb-share-button" data-href="<?php echo $post['blogPostUrl'];?>" data-width="120" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
					</li>
					<li class="hateb">
						<a href="http://b.hatena.ne.jp/entry/<?php echo $post['blogPostUrl'];?>" class="hatena-bookmark-button" data-hatena-bookmark-layout="standard-balloon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a>
						<script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
					</li>
				</ul>
				<!--sns_share-end-->
				<!--cover_image-st-->
				<figure class="cover"><img src="<?php echo $this->post['blogCoverImageUrl'];?>" alt="<?php echo $this->post['blogSubject'];?>"/></figure>
				<!--cover_image-end-->
				<!--記事内容-st-->
				<?php echo $this->post['blogDetail'];?>
				<!--記事内容-end-->
				<!--sns_share-st-->
				<ul class="sns_share clearfix foot">
					<li class="line"><a class="line" href="http://line.me/R/msg/text/?<?php echo $this->post['blogSubject'];?><?php echo $tag['blogTagUrlFull'];?>">LINEで送る</a>
					</li>
					<li class="twitter"><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $post['blogPostUrl'];?>">Tweet</a>
						<script>
						! function ( d, s, id ) {
						var js, fjs = d.getElementsByTagName( s )[ 0 ],
						p = /^http:/.test( d.location ) ? 'http' : 'https';
						if ( !d.getElementById( id ) ) {
							js = d.createElement( s );
							js.id = id;
							js.src = p + '://platform.twitter.com/widgets.js';
							fjs.parentNode.insertBefore( js, fjs );
						}
						}( document, 'script', 'twitter-wjs' );
						</script>
					</li>
					<li class="fb">
						<div class="fb-share-button" data-href="<?php echo $post['blogPostUrl'];?>" data-width="120" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
					</li>
					<li class="hateb">
						<a href="http://b.hatena.ne.jp/entry/<?php echo $post['blogPostUrl'];?>" class="hatena-bookmark-button" data-hatena-bookmark-layout="standard-balloon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a>
						<script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
					</li>
				</ul>
				<!--sns_share-end-->
			</article>

			<!--前の記事次の記事-st-->
			<ul id="nextprev" class="clearfix">
			<?php if ($this->blogPrevPost) : ?>
				<li class="prev"><a href="<?php echo $this->linkBlogPrevPost;?>">&lt; 前の記事</a></li>
			<?php endif;?>
			<?php if ($this->blogNextPost) : ?>
				<li class="next"><a href="<?php echo $this->linkBlogNextPost;?>">次の記事 &gt;</a></li>
			<?php endif;?>
			</ul>
			<!--前の記事次の記事-end-->

			<!--関連記事-st-->
			<?php if ($this->blogRelatedPosts) : ?>
			<div id="relation">
				<h2 class="title">関連記事</h2>
				<?php foreach ($this->blogRelatedPosts as $post):?>
				<article class="relationlist">
					<a href="<?php echo $post['blogPostUrl'];?>">
						<figure class="post_thumbnail"><img src="<?php echo $post['blogCoverImageUrl'];?>" alt="<?php echo $this->post['blogSubject'];?>"/></figure>
						<time><?php echo $post['blogPublishDate_YMD'];?></time>
						<p class="txt"><?php echo $post['blogSubject'];?></p>
					</a>
				</article>
				<?php endforeach;?>
			</div>
			<?php endif;?>
			<!--関連記事-end-->
		</div>
		<!-- // ブロック -->
		</div>
		<!-- // ブロック貼り付けエリア -->
	</div><!--contents_left-->

	<div id="contents_right">
		<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:RIGHTNAVI_###');?>
	</div><!--contents_right-->

	</main>

	</div><!--container-->

	<?php echo $this->getDcmsCommonParts('###_DCMS_COMMON:FOOTER_###');?>

	<form method="get" id="fPageChg"><?php echo $this->hiddenParams($this->paramTrans, 'fPageChg');?></form>

</body>
</html>
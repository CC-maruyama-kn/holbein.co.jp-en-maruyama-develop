<?php
/**
 * 公開サイト ブログ(記事単一AMPページ)
 */
?>
<!doctype html>
<html amp lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $this->post['blogSubject']; ?>-<?php echo $this->blogSettings['blogName']; ?></title>

<link rel="canonical" href="<?php echo $this->currentCanonicalUrlFull; ?>">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

<style amp-custom>
	/* AMP用CSSは50kb以内で記述 */
	body {
		background-color: white;
		font-family: sans-serif;
		color: #333333;
		font-size: 15px;
		line-height: 1.6;
	}
	amp-img {
		background-color: gray;
		border: 1px solid #eeeeee;
	}
	header {
		text-align: center;
		border-bottom: 1px solid #eeeeee;
		box-shadow: 0 0 3px 1px rgba(0,0,0,0.05);
		padding: 8px 0;
	}
	header amp-img{
		display: block;
		margin: auto;
	}
	header amp-img,
		footer amp-img {
		background: none;
		border: none;
	}

	/* 共通 */
	p,ol,ul,div,h2,h3,h4,h5,h6,blockquote{
		width: 94%;
		margin-right: auto;
		margin-left: auto;
		box-sizing: border-box;
	}
	div > p,div > h2,div > h3,div > h4,div > h5,div > h6,div > div,
	div > blockquote,blockquote > p,blockquote > div {
		width: 100%;
	}
	a {
		color: #286298;
	}
	ul,ol {
		padding-left: 20px;
		margin: 8px auto;
	}
	li {
		margin-bottom: 8px;
		line-height: 1.4;
	}
	blockquote {
		width: 94%;
		margin: 20px auto;
		background-color: #f5f5f5;
		padding: 20px 25px;
		position: relative;
	}
	blockquote::before {
		font-style: normal;
		font-weight: 900;
		position: absolute;
		top: 10px;
		left: 15px;
		vertical-align: middle;
		content: "”";
		color: #bbbbbb;
		font-size: 26px;
		line-height: 1;
	}
		amp-img {
		background: #fff;
	}

	/* メイン */
	.mainimg {
		margin-bottom: 10px;
		border: none;
	}

	/* 見出し */
	h1 {
		font-size: 22px;
		width: 94%;
		margin: 15px auto 10px;
		line-height: 1.3;
		font-weight: normal;
	}
	h2 {
		font-size: 20px;
		width: 94%;
		margin: 50px auto 15px;
		line-height: 1.5;
		border-top: 3px solid #286298;
		border-bottom: 1px solid #286298;
		padding: 15px 0 12px;
	}
	h3 {
		font-size: 18px;
		width: 94%;
		margin: 35px auto 15px;
		line-height: 1.4;
		position: relative;
		border-bottom: 2px solid #dddddd;
		padding: 0 0 12px;
	}
	h3::after {
		position: absolute;
		content: " ";
		border-bottom: 2px solid #286298;
		bottom: -2px;
		width: 30px;
		display: block;
	}
	h4 {
		font-size: 17px;
		width: 94%;
		margin: 35px auto 15px;
		line-height: 1.4;
		position: relative;
		padding: 0 0 8px;
		border-bottom: 2px solid #dddddd;
	}
	h5 {
		font-size: 16px;
		width: 94%;
		margin: 25px auto 15px;
		line-height: 1.4;
		font-weight: bold;
		border-bottom: 1px solid #286298;
		padding: 0 0 10px;
	}
	h6 {
		font-size: 16px;
		width: 94%;
		margin: 25px auto 10px;
		line-height: 1.4;
		font-weight: bold;
	}
	h4 + p,h5 + p,h6 + p {
		margin-top: 0;
	}

	/* 投稿属性 */
	.belong {
		display: flex;
		flex-wrap: wrap;
		width: 94%;
		margin: 0 auto 4px;
		font-size: 9px;
		box-sizing: border-box;
		color: #777777;
	}
	.belong dt {
		width: 60px;
		position: relative;
	}
	.belong dt::after {
		content: ":";
		position: absolute;
		right: 10px;
		top: 0;
	}
	.belong dd {
		width: calc(100% - 60px);
		margin-left: 0;
	}
	.belong2 {
	margin: 0 auto 12px;
	}
	.belong2 time {
		font-size: 12px;
		color: #777777;
	}
	.belong2 p {
	font-size: 12px;
		margin: 0;
		color: #777777;
	}

	/* 目次 */
	.p_link_in {
		border: 1px solid #dddddd;
		background-color: #f9f9f9;
		margin: 0;
		width: 100%;
		padding: 0 20px 15px;
	}
	.pl_title {
		border-bottom: 3px solid #dddddd;
		line-height: 1.3;
		font-weight: bold;
		font-size: 18px;
		padding-bottom: 8px;
		margin: 15px auto;
	}
	.pl_txt {
		display: flex;
		margin: 6px auto;
	}
	.list_none {
		margin: 6px auto 10px;
	}
	.pl_txt a,.list_none a {
		color: #286298;
		font-size: 14px;
	}
	.p_link_in .num {
		font-weight: bold;
		padding-right: 8px;
		font-size: 13px;
	}

	.toc_area {
		width: 94%;
		border: 1px solid #dddddd;
		background-color: #f9f9f9;
		margin: 16px auto;
		padding: 0 25px 15px;
		box-sizing: border-box;
	}
	.toc_titl {
		text-align: center;
		font-size: 20px;
		border-bottom: 3px solid #eeeeee;
		padding-bottom: 8px;
		line-height: 1;
	}
	.toc_list {
		margin: 0;
	}
	.toc_list li {
		margin-bottom: 10px;
		font-size: 13px;
	}
	.toc_list li a + .toc_list {
		margin-top: 8px;
	}

	/* 関連記事 */
	.relation article {
		margin-bottom: 10px;
	}
	.relation article a {
		display: flex;
		overflow: hidden;
		color: #286298;
	}
	.relation h2 {
		margin: 35px auto 20px;
		width: 100%;
		padding: 0 0 10px 0;
		border-bottom: 2px solid #cccccc;
		background-color: transparent;
		border-top: none;
	}
	.relation .caption {
		width: calc(100% - 130px);
		padding: 0 5px 0 0;
		margin: 0;
	}
	.relation h3 {
		font-size: 14px;
		line-height: 1.6;
		padding: 0;
		margin: 0 0 5px;
		line-height: 1.6;
		font-weight: normal;
		border: none;
	}
	.relation h3::after {
		border: none;
	}
	.relation p {
		font-size: 12px;
		padding: 0;
		margin: 0;
	}
	.relation article figure {
		width: 130px;
		margin: 0;
	}
	/* footer */
	footer {
		margin: 20px 0 0;
		padding: 5 0 5px;
		border-top: 3px solid #eeeeee;
		text-align: center;
	}
	footer .copytext {
		font-size: 12px;
		margin-bottom: 8px;
	}

	footer .copyright {
		width: 100%;
		font-size: 10px;
		color: #999999;
		margin-top: 8px;
	}

	/* SNS */
	amp-social-share {
		margin: 0 5px;
	}
	/* social */
	.social {
		margin-bottom: 10px;
		width: 100%;
		overflow: hidden;
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
	}
	/* LINE */
	amp-social-share[type=line] {
		width: 60px ;
		height: 44px ;
		background-color: #00B900 ;
		background-image: url( 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path fill="#fff" d="M12.91 6.57c.232 0 .42.19.42.42 0 .23-.188.42-.42.42h-1.17v.75h1.17c.232 0 .42.188.42.42 0 .23-.188.42-.42.42h-1.59c-.23 0-.418-.19-.418-.42V5.4c0-.23.188-.42.42-.42h1.59c.23 0 .418.19.418.42 0 .232-.188.42-.42.42h-1.17v.75h1.17zm-2.57 2.01c0 .18-.116.34-.288.398-.043.014-.088.02-.133.02-.136 0-.26-.06-.34-.167L7.95 6.618V8.58c0 .23-.186.42-.42.42-.23 0-.417-.19-.417-.42V5.4c0-.18.115-.34.286-.397.043-.015.09-.022.133-.022.13 0 .256.068.335.17L9.5 7.37V5.4c0-.23.188-.42.42-.42.23 0 .42.19.42.42v3.18zm-3.828 0c0 .23-.188.42-.42.42-.23 0-.418-.19-.418-.42V5.4c0-.23.188-.42.42-.42.23 0 .418.19.418.42v3.18zM4.868 9h-1.59c-.23 0-.42-.19-.42-.42V5.4c0-.23.19-.42.42-.42.232 0 .42.19.42.42v2.76h1.17c.232 0 .42.188.42.42 0 .23-.188.42-.42.42M16 6.87C16 3.29 12.41.376 8 .376S0 3.29 0 6.87c0 3.208 2.846 5.896 6.69 6.405.26.056.615.172.705.394.08.2.053.514.026.72l-.11.683c-.034.203-.16.79.694.432.855-.36 4.608-2.714 6.286-4.646C15.445 9.594 16 8.302 16 6.87"/></svg>' ) ;
		/* MIT License | https://icon.now.sh/ */
	}
	/* はてなブックマーク */
	amp-social-share[type=hatena_bookmark] {
		width: 60px ;
		height: 44px ;
		font-family: Verdana ;
		background-color: #00A4DE ;
		font-weight: 700 ;
		color: #fff ;
		line-height: 44px ;
		text-align: center ;
		font-size: 28px ;
	}
</style>

<script type="application/ld+json">
	{ // 構造化データ
		"@context": "http://schema.org",
		"@type": "BlogPosting",

		"mainEntityOfPage":{
			"@type":"WebPage",
			"@id":"<?php echo $this->currentCanonicalUrlFull; ?>"
		},

		"publisher": {
			"@type": "<?php echo $this->ampSettings['publisher']['type']; ?>",
			"name": "<?php echo $this->ampSettings['publisher']['name']; ?>",
			"logo": {
				"@type": "ImageObject",
				"url": "<?php echo $this->ampSettings['siteLogo']['imageUrl']; ?>",
				"width": "<?php echo $this->ampSettings['siteLogo']['imageWidth']; ?>",
				"height": "<?php echo $this->ampSettings['siteLogo']['imageHeight']; ?>"
			}
		},

		"author": {
			"@type": "<?php echo $this->ampSettings['auther']['type']; ?>",
			"name": "<?php echo $this->ampSettings['auther']['name']; ?>"
		},

		"headline": "(<?php echo $this->post['blogSubject']; ?>)",
		"description": "(<?php echo $this->metaDescription; ?>)",
		"datePublished": "<?php echo $this->post['blogPublishDateIso8601']; ?>",
		"dateModified": "<?php echo $this->post['blogModifiedDateIso8601']; ?>",

		"image": {
			"@type": "ImageObject",
			"url": "<?php echo $this->post['blogAmpImage']['imageUrl']; ?>",
			"width": "<?php echo $this->post['blogAmpImage']['imageWidth']; ?>",
			"height": "<?php echo $this->post['blogAmpImage']['imageHeight']; ?>"
		}
	}
</script>

<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
<script async src="https://cdn.ampproject.org/v0.js"></script>

<!-- ライブラリ（ソーシャルボタン表示） -->
<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
<!-- ライブラリ（Youtube表示） -->
<script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
<!-- ライブラリ（アナリティクス設置 -->
<!-- AMP Analytics -->
<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>

</head>
<body>
    <!--###_DCMS_BLOG_AMP_TRACKING_CODE_###-->


    <header>
        <div>
            <amp-img src="<?php echo $this->ampSettings['siteLogo']['imageUrl']; ?>"
            alt="<?php echo $this->ampSettings['publisher']['name']; ?>"
            height="<?php echo $this->ampSettings['siteLogo']['imageHeight']; ?>"
            width="<?php echo $this->ampSettings['siteLogo']['imageWidth']; ?>"
            ></amp-img>
        </div>
    </header>

    <!-- 投稿タイトル -->
    <h1><?php echo $this->post['blogSubject']; ?></h1>

	<!-- 投稿属性情報 -->
    <dl class="belong">
        <dt>カテゴリ</dt>
        <dd>
        <?php if (count($this->post['blogCategory']) > 0) : ?>
            <?php foreach ($this->post['blogCategory'] as $category):?>
                <?php echo $category['blogCategoryName'];?>&nbsp;
            <?php endforeach;?>
        <?php else:?>
            未分類
        <?php endif;?>
        </dd>
        <dt>タグ</dt>
        <dd>
        <?php if (count($this->post['blogTag']) > 0) : ?>
            <?php foreach ($this->post['blogTag'] as $category):?>
                <?php echo $category['blogTagName'];?>&nbsp;
            <?php endforeach;?>
        <?php endif;?>
        </dd>
    </dl>
	<div class="belong2">
		<time><?php echo $this->post['blogPublishDate_YMD']; ?></time>
		<p><?php echo $this->ampSettings['auther']['name']; ?></p>
	</div>

    <!--投稿カバー画像-->
    <amp-img src="<?php echo $this->post['blogCoverImageUrl']; ?>"
    alt="<?php echo isset($this->post['blogCoverImageAlt']) && $this->post['blogCoverImageAlt']!='' ? strip_tags($this->post['blogCoverImageAlt']) :  strip_tags($this->post['blogSubject']);?>"
    height="<?php echo $this->post['blogCoverImageHeight']; ?>"
    width="<?php echo $this->post['blogCoverImageWidth']; ?>"
    layout="responsive"
    class="mainimg"
    ></amp-img>

	<!-- ソーシャルボタン -->
    <div class="social">
        <?php if ($this->blogSettings['twitterUseStatus'] == cmnConstExt::BLOG_SETTING_USE_ACTIVE) { ?>
        <amp-social-share type="twitter"
        width="60"
        height="44"
        ></amp-social-share>
        <?php } ?>

        <?php if ($this->blogSettings['facebookUseStatus'] == cmnConstExt::BLOG_SETTING_USE_ACTIVE) { ?>
        <amp-social-share type="facebook"
        width="60"
        height="44"
        data-param-app_id=818514034832914
        ></amp-social-share>
        <?php } ?>

        <?php if ($this->blogSettings['googleUseStatus'] == cmnConstExt::BLOG_SETTING_USE_ACTIVE) { ?>
        <amp-social-share type="gplus"
        width="60"
        height="44"
        ></amp-social-share>
        <?php } ?>

        <?php if ($this->blogSettings['lineUseStatus'] == cmnConstExt::BLOG_SETTING_USE_ACTIVE) { ?>
        <amp-social-share type="line"
        layout="container"
        data-share-endpoint="http://line.me/R/msg/text/?TITLE%3ASOURCE_URL"
        ></amp-social-share>
        <?php } ?>

        <amp-social-share type="hatena_bookmark"
        layout="container"
        data-share-endpoint="http://b.hatena.ne.jp/entry/s/syncer.jp/Web/AMP/Component/amp-social-share/"
        >B!</amp-social-share>
    </div>

    <!--投稿本文-->
    <?php echo $this->post['blogDetail']; ?>

    <?php if ($this->blogRelatedPosts) : ?>
	<!-- 関連記事表示 -->
    <div class="relation">
        <h2>関連記事</h2>
        <?php foreach ($this->blogRelatedPosts as $post):?>
        <article>
            <a href="<?php echo $post['blogPostUrl'];?>">
                <div class="caption">
                    <h3><?php echo $post['blogSubject'];?></h3>
                    <p><?php echo $post['blogDetailExcerpt'];?></p>
                </div>
                <?php if (!empty($post['blogCoverImageUrl'])) : ?>
                <figure>
                    <amp-img src="<?php echo $post['blogCoverImageUrl'];?>"
                    alt="<?php echo isset($this->post['blogCoverImageAlt']) && $this->post['blogCoverImageAlt']!='' ? strip_tags($this->post['blogCoverImageAlt']) :  strip_tags($this->post['blogSubject']);?>"
                    height="<?php echo $post['blogCoverImageHeight'];?>"
                    width="<?php echo $post['blogCoverImageWidth'];?>"
                    layout="intrinsic"
                    ></amp-img>
                </figure>
                <?php endif;?>
            </a>
        </article>
        <?php endforeach;?>
    </div>
    <?php endif;?>

    <footer>
        <!-- amp-img src="<?php echo $this->ampSettings['siteLogo']['imageUrl']; ?>"
        alt="<?php echo $this->ampSettings['publisher']['name']; ?>"
        height="<?php echo $this->ampSettings['siteLogo']['imageHeight']; ?>"
        width="<?php echo $this->ampSettings['siteLogo']['imageWidth']; ?>"
        ></amp-img>
        <p class="マーケティング担当者のために<br>マーケティングに関わるためになる情報をためていく</p -->
        <p class="copyright">Copyright &copy; startialab inc. All rights reserved.</p>
    </footer>

</body>
</html>
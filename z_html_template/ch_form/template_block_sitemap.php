<?php
/**
 * 公開サイト サイトマップを編集
 *   設定が必要な変数
 *     $siteMapArray : contentsInfo の サイトマップ配列
 *
 *   設定される変数
 *     $blockSiteMap
 */
	$blockSiteMap = "";
	if (isset($siteMapArray) === FALSE) {
		$siteMapArray = array();
	}
	
	if (!function_exists('template_block_sitemap_func_getSiteMapListTag')) {
		// サブナビタグの生成
		function template_block_sitemap_func_getSiteMapListTag(&$folderTreeArray, $level = 0) {
			// <UL>タグ
			$tagUnorderedListStart = $level == 0 ? '<ul class="sitemap">' : '<ul>';
			$tagUnorderedListEnd = '</ul>';
	
			// <LI>タグ
			$tagListItemStart = '<li>';
			$tagListItemEnd = '</li>';
					
			// <A>タグ
			$tagAnchor = '<a href="%s" title="%s">%s</a>';
			
			// インデント
			$indent = '  ';
			$indentUl = str_repeat($indent, $level*2);
			
			$result = '';
			
			// <UL>タグ開始
			$result .= $indentUl . $tagUnorderedListStart . PHP_EOL;
	
			foreach ($folderTreeArray as $val) {
				
				// 階層の深さ(1～)
				$folderLebel = $val['folderLevel'];
				// コンテンツ名
				$contentsName = $val['contentsName'];
				// コンテンツURL
				$contentsUrlFullPath = $val['contentsUrlFullPath'];
				
				// <LI>タグ開始
				$result .= $indentUl.$indent . $tagListItemStart . PHP_EOL;
				
				// <A>タグ
				$result .= $indentUl.$indent.$indent . sprintf($tagAnchor, $contentsUrlFullPath, $contentsName, $contentsName) . PHP_EOL;
				
				// カレントの場合のみ子要素を展開
				if (isset($val['childs'])) {
					$result .= template_block_sitemap_func_getSiteMapListTag($val['childs'], $val['folderLevel'] + 1);
				}
				
				// <LI>タグ終了
				$result .= $indentUl.$indent . $tagListItemEnd . PHP_EOL;
			}
	
			// <UL>タグ終了
			$result .= $indentUl . $tagUnorderedListEnd . PHP_EOL;
	
			return $result;
		}
	}

	// サイトマップを編集
	if (count($siteMapArray) > 0) {
		$blockSiteMap .= template_block_sitemap_func_getSiteMapListTag($siteMapArray);
	}

<?php
/**
 * 公開サイト BLOG のカテゴリツリーサブナビを編集
 *   設定が必要な変数
 *     $bloCategoryTreeNaviArray : カテゴリ の サブナビ配列
 *
 *   設定される変数
 *     $blogCategoryTreeNavi
 */
	$blogCategoryTreeNavi = "";
	if (isset($bloCategoryTreeNaviArray) === FALSE) {
		$bloCategoryTreeNaviArray = array();
	}
	
	if (!function_exists('template_blog_navi_category_tree_edit_func_getCategoryListTag')) {
		// サブナビタグの生成
		function template_blog_navi_category_tree_edit_func_getCategoryListTag(&$folderTreeArray, $level = 0) {
			// <UL>タグ
			$tagUnorderedListStart = $level == 0 ? '<ul class="blog_sidelist01">' : '<ul>';
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
				$categoryLebel = $val['blogCategoryLevel'];
				// カテゴリ名
				$categoryName = $val['blogCategoryName'];
				// カテゴリURL
				$categoryUrlFullPath = $val['blogCategoryUrlFull'];
				
				// <LI>タグ開始
				$result .= $indentUl.$indent . $tagListItemStart . PHP_EOL;
				
				// <A>タグ
				$result .= $indentUl.$indent.$indent . sprintf($tagAnchor, $categoryUrlFullPath, $categoryName, $categoryName . ' (' . $val['count'] . ')' ) . PHP_EOL;
				
				// 子要素を展開
				if (isset($val['childs'])) {
					$result .= template_blog_navi_category_tree_edit_func_getCategoryListTag($val['childs'], $val['blogCategoryLevel'] + 1);
				}
				
				// <LI>タグ終了
				$result .= $indentUl.$indent . $tagListItemEnd . PHP_EOL;
			}
	
			// <UL>タグ終了
			$result .= $indentUl . $tagUnorderedListEnd . PHP_EOL;
	
			return $result;
		}
	}

	// カテゴリーツリーを編集
	if (count($bloCategoryTreeNaviArray) > 0) {
		$blogCategoryTreeNavi .= '<div class="blog_side_section01">' . PHP_EOL;
		$blogCategoryTreeNavi .= '<h5 class="blog_sidetitle01">カテゴリ</h5>' . PHP_EOL;
		$blogCategoryTreeNavi .= template_blog_navi_category_tree_edit_func_getCategoryListTag($bloCategoryTreeNaviArray);
		$blogCategoryTreeNavi .= '</div>';
	}

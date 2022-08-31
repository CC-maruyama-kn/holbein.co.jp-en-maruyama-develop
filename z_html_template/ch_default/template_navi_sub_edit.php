<?php
/**
 * 公開サイト コンテンツ のサブナビを編集
 *   設定が必要な変数
 *     $subNaviArray : contentsInfo の サブナビ配列
 *
 *   設定される変数
 *     $pageSubNavi
 */
	$pageSubNavi = "";
	if (isset($subNaviArray) === FALSE) {
		$subNaviArray = array();
	}
	
	if (!function_exists('template_navi_sub_edit_func_getMenuListTag')) {
		// サブナビタグの生成
		function template_navi_sub_edit_func_getMenuListTag(&$folderTreeArray, $level = 0) {
			// <UL>タグ
			$tagUnorderedListStart = '<ul>';
			$tagUnorderedListEnd = '</ul>';
	
			// <LI>タグ
			$tagListItemStart = '<li>';
			$tagCurrentListItemStart = '<li class="current">';
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
				// カレント
				$isCurrent = $val['isCurrent'];
				
				// <LI>タグ開始
				$result .= $indentUl.$indent . ($isCurrent ? $tagCurrentListItemStart : $tagListItemStart) . PHP_EOL;
				
				// <A>タグ
				$result .= $indentUl.$indent.$indent . sprintf($tagAnchor, $contentsUrlFullPath, $contentsName, $contentsName) . PHP_EOL;
				
				// カレントの場合のみ子要素を展開
				if (isset($val['childs']) && $isCurrent) {
					$result .= template_navi_sub_edit_func_getMenuListTag($val['childs'], $val['folderLevel']);
				}
				
				// <LI>タグ終了
				$result .= $indentUl.$indent . $tagListItemEnd . PHP_EOL;
			}
	
			// <UL>タグ終了
			$result .= $indentUl . $tagUnorderedListEnd . PHP_EOL;
	
			return $result;
		}
	}

	// ナビを編集
	if (count($subNaviArray) > 0) {
		foreach($subNaviArray as $val) {
			// コンテンツ名
			$contentsName = $val['contentsName'];
			// コンテンツURL
			$contentsUrlFullPath = $val['contentsUrlFullPath'];
			
			// カレントでない場合は表示しない
			if (!$val['isCurrent']) continue;
						
			// 1階層目をサブナビタイトルとして出力
			$pageSubNavi .= '<div id="subnav"><div id="subnav_title">'. PHP_EOL;
			$pageSubNavi .= sprintf('<a href="%s" title="%s">%s</a>', $contentsUrlFullPath, $contentsName, $contentsName) . PHP_EOL;
			$pageSubNavi .= '</div>'. PHP_EOL;

			// 子要素をリストタグで出力
			if (isset($val['childs'])) {
				$pageSubNavi .= template_navi_sub_edit_func_getMenuListTag($val['childs']);
			}
			$pageSubNavi .= '</div>'. PHP_EOL;
		}
	}

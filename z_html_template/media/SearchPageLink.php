<?php
/**
 * ビュー　ヘルパー
 * 
 * ページングタグを生成（個別テンプレート用）
 *
 * @copyright 2009 $copyright All rights reserved.
 * @version   1.0.0
 *
 * modify : 
 *
 */

class Prv_View_Helper_SearchPageLink
{
    public $view;

    public function setView(Zend_View_Interface $view)
    {
        $this->view = $view;
    }

    /**
     * ページングタグを生成（個別テンプレート用）
     *
     * @return string ページングタグ
     */
    public function searchPageLink()
    {
        $result = '';
        $aryResult = array();

        if ($this->view->pager->searchCount > $this->view->pager->listMax) {

            $pageTotalCount = intval($this->view->pager->searchCount / $this->view->pager->listMax);

            $ttl = $pageTotalCount * $this->view->pager->listMax;

            if ($this->view->pager->searchCount > $ttl) {
                $pageTotalCount++;
            }

            // 前へ
            if ($this->view->pager->page > 1) {

                $page = $this->view->pager->page - 1;

                $aryResult[] = '<a href="javascript:document.getElementById(\'fPageChg-page\').value=\''
                             . $page
                             . '\';document.getElementById(\'fPageChg\').submit();">&lt;&lt; 前へ</a>';
            }

            // 前のページ
            $pageMin = 1;
            if ($this->view->pager->page > 1) {
                if ($this->view->pager->page > $this->view->pager->linkBackNextMax) {
                    $pageMin = $this->view->pager->page - $this->view->pager->linkBackNextMax;

                    // ページリンク数が一定になるように調整
                    $nextCount = $pageTotalCount - $this->view->pager->page;
                    if ($this->view->pager->linkBackNextMax > $nextCount) {
                        $backCount = $pageMin - ($this->view->pager->linkBackNextMax - $nextCount);
                        if ($backCount > 1) {
                            $pageMin = $backCount;
                        } else {
                            $pageMin = 1;
                        }
                    }

                } else {
                    $pageMin = 1;
                }

                for ($idx = $pageMin; $idx < $this->view->pager->page; $idx++) {

                    $page = $idx;

                    $aryResult[] = '<a href="javascript:document.getElementById(\'fPageChg-page\').value=\''
                                 . $page . '\';document.getElementById(\'fPageChg\').submit();">'
                                 . $page . '</a>';
                }
            }


            // 自ページ
            $page = $this->view->pager->page;

//            $aryResult[] = '<a href="javascript:document.getElementById(\'fPageChg-page\').value=\''
//                         . $page . '\';document.getElementById(\'fPageChg\').submit();">'
//                         . $page . '</a>';

            $aryResult[] = '<span>' . $page . '</span>';

            // 次のページ
            if ($this->view->pager->page < $pageTotalCount) {

                $pageMax = $this->view->pager->page + $this->view->pager->linkBackNextMax;

                if ($pageMax > $pageTotalCount) {
                    $pageMax = $pageTotalCount;
                }

                // ページリンク数が一定になるように調整
                $backCount = $this->view->pager->page - $pageMin;
                if ($this->view->pager->linkBackNextMax > $backCount) {
                    $nextCount = $pageMax + ($this->view->pager->linkBackNextMax - $backCount);
                    if ($nextCount > $pageTotalCount) {
                        $pageMax = $pageTotalCount;
                    } else {
                        $pageMax = $nextCount;
                    }
                }

                $start = $this->view->pager->page + 1;

                for ($idx = $start; $idx <= $pageMax; $idx++) {

                    $page = $idx;

                    $aryResult[] = '<a href="javascript:document.getElementById(\'fPageChg-page\').value=\''
                                 . $page . '\';document.getElementById(\'fPageChg\').submit();">'
                                 . $page . '</a>';
                }
            }

            // 次へ
            if ($this->view->pager->page < $pageTotalCount) {

                $page = $this->view->pager->page + 1;

                $aryResult[] = '<a href="javascript:document.getElementById(\'fPageChg-page\').value=\''
                             . $page . '\';document.getElementById(\'fPageChg\').submit();">次へ &gt;&gt;</a>' . PHP_EOL;
            }
        }

        if (count($aryResult) > 0) {
//            $result = '<ul>' . implode(PHP_EOL, $aryResult) . '</ul>' . PHP_EOL;
            $result = '&nbsp;&nbsp;' . implode('&nbsp;&nbsp;', $aryResult) . PHP_EOL;

//        } else {
//            // １ページのみの時
//            if ($this->view->pager->searchCount > 0) {
//                $result = '1' . PHP_EOL;
//            }
        }

        return $result;
    }
}

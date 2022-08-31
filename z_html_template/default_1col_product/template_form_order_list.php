<?php
/**
 * 公開サイト 注文リスト出力用
 *
 *
 *   設定が必要な変数
 *     $dcmsOrderListiArray : 注文リスト配列
 *
 *         ■共通
 *         $itemValue['item_info']['itemCode'] : 管理コード
 *         $itemValue['item_info']['itemPrice'] : 金額マスタ
 *         $itemValue['qty'] : 注文数
 *         $itemValue['detail_total'] : 注文数 × 金額マスタ
 *
 *         ■アイテム管理
 *         $itemValue['item_info']['itemName'] : アイテム名
 *         $itemValue['item_info']['itemImage1UrlFullPath'] : アイテム画像1
 *         $itemValue['item_info']['itemImage2UrlFullPath'] : アイテム画像2
 *         $itemValue['item_info']['itemImage3UrlFullPath'] : アイテム画像3
 *         $itemValue['item_info']['itemImage4UrlFullPath'] : アイテム画像4
 *         $itemValue['item_info']['itemImage5UrlFullPath'] : アイテム画像5
 *         $itemValue['item_info']['itemPriceSub1'] : 参考金額表示1
 *         $itemValue['item_info']['itemPriceSub2'] : 参考金額表示2
 *         $itemValue['item_info']['itemUnitName'] : アイテム単位
 *         $itemValue['item_info']['itemDescription'] : 説明文
 *
 *         ■Plusdb
 *         $itemValue['item_info']['celXXX'] : Plusdbセル名に紐付く値
 *
 *     $dcmsOrderListiSummaryArray : 注文リストサマリ情報配列
 *         $dcmsOrderListiSummaryArray['tax'] : 消費税
 *         $dcmsOrderListiSummaryArray['subTotal'] : 小計
 *         $dcmsOrderListiSummaryArray['total'] : 合計
 *
 *     $dcmsBaseFromUrl : FormのBaseURLの取得
 *     $dcmsOrderListPageUrl :注文リストのURL
 *     $dcmsOrderFormPageUrl :注文フォームのURL
 *
 *     $dcmsOrderListHasError : エラー有無
 *     $dcmsOrderListMessage : エラーメッセージ
 *
 *   設定される変数
 *     $dcmsOrderListHtml
 */

$dcmsOrderListHtml = "";

ob_start();
?>

<script type="text/javascript"><!--
    function dcmsOrderListUpdate(code) {
        location.href='<?php echo $dcmsBaseFromUrl; ?>dcms-order/update?itemCode=' + code + '&itemQty=' + $('#itemQty_' + code).val();
    }
    function dcmsOrderListRemove(code) {
        location.href='<?php echo $dcmsBaseFromUrl; ?>dcms-order/remove?itemCode=' + code;
    }
// --></script>

<div class="cart_section01">
    <div class="cart_formatarea01">
        <a class="cart_btn_return01" href="javascript:location.href = document.referrer;">前のページに戻る</a>
        <a class="cart_btn_submit01" href="<?php echo $dcmsOrderFormPageUrl; ?>">注文する</a>
    </div>

    <? if($dcmsOrderListHasError): ?>
    <p><font color="#C62430"><?php echo $dcmsOrderListMessage; ?></font></p>
    <? endif; ?>

    <div class="cart_list01">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tab_order">
            <tbody>
                <tr>
                    <td class="highlight">商品コード</td>
                    <td class="highlight">商品名</td>
                    <td class="highlight">商品金額（税別）</td>
                    <td class="highlight">注文数</td>
                    <td class="highlight"></td>
                </tr>
                <?php foreach ($dcmsOrderListiArray as $itemValue): ?>
                <tr>
                    <td align="right"><?php echo $itemValue['item_info']['itemCode']; ?></td>
                    <td><?php echo $itemValue['item_info']['itemName']; ?></td>
                    <td align="right"><?php echo number_format($itemValue['item_info']['itemPrice']); ?>円</td>
                    <td>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td width="10">&nbsp;</td>
                                    <td class="order_number">
                                        <input type="text" id="itemQty_<?php echo $itemValue['item_info']['itemCode']; ?>" size="5" value="<?php echo $itemValue['qty']; ?>" maxlength="4" style="ime-mode: disabled;"></td>
                                    <td>&nbsp;</td>
                                    <td width="60">
                                        <a class="cart_btn01 cart_btn_change01" href="javascript:void(0);" onclick="dcmsOrderListUpdate('<?php echo $itemValue['item_info']['itemCode']; ?>');">
                                            変更</a>
                                    </td>
                                    <td width="10">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td align="center">
                        <a class="cart_btn01 cart_btn_delete01" href="javascript:void(0);" onclick="dcmsOrderListRemove('<?php echo $itemValue['item_info']['itemCode']; ?>');">
                            削除</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="cart_formatarea01">
        <a class="cart_btn_return01" href="javascript:location.href = document.referrer;">前のページに戻る</a>
        <a class="cart_btn_submit01" href="<?php echo $dcmsOrderFormPageUrl; ?>">注文する</a>
    </div>

</div>

<?php
$dcmsOrderListHtml = ob_get_clean();
?>
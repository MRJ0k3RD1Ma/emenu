<?php

/* @var $order array */
$this->title = "Buyurtmalar ro`yhati";
?>


<div class="orderlist-wrapper">

<h2 class="h2" style="display: block; width: 100%"><span>Mening buyurtmalarim:</span></h2>
    <br>

    <?php $price = 0; foreach ($order as $key=>$item):
        if($pro = \common\models\Menu::findOne($key)){
            $price += $pro->narxi * $item;
        ?>

        <div class="order-item-list" style="display: block; width: 100%; border-bottom: 1px solid #000;" id="order-item-<?= $pro->id?>">
            <div class="order-item _in-order order-item--regular">
                <div class="order-item-header"><h3 class="order-item-title" style="font-weight: bold"><?= $pro->name?></h3> <!----></div>
                <div class="order-item-footer">
                    <div class="order-item-price">
                        <div class="menu-item-price menu-item-price--small">
                            <span class="menu-item-price__current"><b><?= Yii::$app->formatter->format($pro->narxi,['decimal',0])?></b> <span>so'm</span></span>
                        </div>
                    </div>
                    <div class="order-item-count">
                        <div class="order-action order-action--small order-action--value">
                            <button class="order-action-button _remove ripple focus" value="<?= $pro->id?>">
                                –
                            </button>
                            <span class="order-action-count" id="count-<?= $pro->id?>"><?= $item?></span>
                            <button class="order-action-button _add ripple focus" value="<?= $pro->id?>">
                                +
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } endforeach;?>



<div class="order-total-price"><span>Barchasi: </span>
    <div class="menu-item-price menu-item-price--regular">
        <span class="menu-item-price__current">
            <b id="total-price-b"><?= Yii::$app->formatter->format($price,['decimal',0])?></b>
            <span>so'm</span>
        </span>
    </div>
</div>

</div>
<?php
$this->title = "Shark night club";
/* @var $id  integer*/
?>

<div class="navigation">
    <div class="navigation-wrapper base-scrollbar">
        <?php foreach (\common\models\Navigate::find()->where(['status'=>1])->all() as $item):?>
            <div class="navigation-item ">
                <a href="<?= Yii::$app->urlManager->createUrl(['/site/index','id'=>$item->id])?>" class="navigation-link <?= $id == $item->id ? 'selected' : ''?>"><?= $item->name ?></a>
            </div>
        <?php endforeach;?>
    </div>

</div>



<div class="category">
    <div class="category-wrapper" id="categories">
        <?php
        $order = [];
        if(Yii::$app->session->has('order')){
            $order = Yii::$app->session->get('order');
        }
        ?>
        <?php foreach ($menu as $item):?>
            <div class="category-item">
                <a>
                    <div class="category-img__wrapper">
                        <img src="/upload/<?= $item->image ?>" alt="img" />
                    </div>

                    <div class="menu-item-content">
                        <div class="menu-item-body">
                            <div class="menu-item-header">
                                <h3 class="menu-item-title"><span><?= $item->name?></span></h3>
                            </div>
                        </div>
                        <div class="menu-item-footer">
                            <div>
                                <div class="menu-item-price menu-item-price--regular">
                                    <span class="menu-item-price__current">
                                        <b><?= $item->narxi ?></b> <span>сум</span>
                                    </span>

                                </div>

                            </div>
                            <div class="order-item-count">
                                <div class="order-action order-action--small order-action--value">
                                    <button class="order-action-button _remove ripple focus" value="<?= $item->id?>">
                                        –
                                    </button>
                                    <span class="order-action-count" id="count-<?= $item->id?>"><?= isset($order[$item->id]) ? $order[$item->id] : 0 ?></span>
                                    <button class="order-action-button _add ripple focus" value="<?= $item->id?>">
                                        +
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </a>
            </div>
        <?php endforeach;?>
    </div>
</div>




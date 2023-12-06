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

        <?php foreach ($category as $item):?>
        <div class="category-item">
            <a href="<?= Yii::$app->urlManager->createUrl(['/site/category','id'=>$item->id])?>">
                <div class="category-img__wrapper">
                    <img src="/upload/<?= $item->image ?>" alt="img" />
                </div>
                <div class="category-item__text"><?= $item->name?></div>
            </a>
        </div>
        <?php endforeach;?>
    </div>
</div>




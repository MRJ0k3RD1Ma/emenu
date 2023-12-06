<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Category $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'navigate_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Navigate::find()->where(['status'=>1])->all(),'id','name',['prompt'=>''])) ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?php
            if($model->image[0]=='h' and $model->image[1]=='t' and $model->image[2]=='t' and $model->image[3]=='p' and ($model->image[4]=='s' or $model->image[4]==':')
                and ($model->image[5]==':' or $model->image[5]=='/') and $model->image[6]=='/' ){
                $img = $model->image;
            }else{
                $img = "/upload/".$model->image;
            }
            ?>
            <img src="<?= $img?>" alt="" style="width: 200px; height: auto">
        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'role_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\UserRole::find()->all(),'id','name'),['prompt'=>'Rolni tanlang']) ?>


            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>


        </div>
        <div class="col-md-4">
            <div class="form-group" style="margin-bottom: 33px;">
                <img src="/upload/<?= $model->isNewRecord ? 'default/avatar.png' : $model->image?>" id="blah" style="height:200px; width:auto;">
            </div>
            <div class="form-group">
                <label>Rasm</label>
                <div class="custom-file">
                    <input type="file" name="User[image]" id="user-image" class="custom-file-input">
                    <label class="custom-file-label">Rasmni tanlang</label>
                </div>
            </div>

            <?= $form->field($model, 'status')->dropDownList(Yii::$app->params['user.status']) ?>

        </div>


    </div>
    <div class="row">
        <div class="col-md-6">

           <?= $form->field($model,'region_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\RegionView::find()->all(),'region_id','name_lot'),['prompt'=>'Viloyatni tanlang'])?>

        </div>
        <div class="col-md-6">
            <?= $form->field($model,'district_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\DistrictView::find()->where(['region_id'=>$model->region_id])->all(),'id','name_lot'),['prompt'=>'Tumanni tanlang'])?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$getdistrict = Yii::$app->urlManager->createUrl(['/cp/default/getdistrict']);
$this->registerJs("
        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
              $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
          }
        }
        
        $('#user-image').change(function() {
          readURL(this);
        });
   $('#user-region_id').change(function(){
       $.get('{$getdistrict}?id='+$('#user-region_id').val()).done(function(data){
            $('#user-district_id').empty();
            $('#user-district_id').append(data);
       })  
   });
");
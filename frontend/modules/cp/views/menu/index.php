<?php

use common\models\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
/* @var $model Menu*/
/* @var $id integer*/
/** @var yii\web\View $this */
/** @var common\models\search\MenuSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Menular';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">


    <div class="card">
        <div class="card-body">


            <div class="row">
                <div class="col-md-6">
                    <?php foreach (\common\models\Category::find()->where(['status'=>1])->all() as $item):?>
                        <a href="<?= Yii::$app->urlManager->createUrl(['/cp/menu/','id'=>$item->id])?>" style="margin-left: 10px; margin-bottom:5px;" class="btn btn-<?= $id == $item->id ? 'success' : 'primary' ?>"><?= $item->name?></a>
                    <?php endforeach;?>
                    <hr>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

//            'id',
                            [
                                'attribute'=>'image',
                                'format'=>'raw',
                                'value'=>function($d){

                                    if($d->image[0]=='h' and $d->image[1]=='t' and $d->image[2]=='t' and $d->image[3]=='p' and ($d->image[4]=='s' or $d->image[4]==':')
                                        and ($d->image[5]==':' or $d->image[5]=='/') and $d->image[6]=='/' ){
                                        $img = $d->image;
                                    }else{
                                        $img = "/upload/".$d->image;
                                    }
                                    return "<img src='{$img}' style='height: auto; width: 200px;' />";
                                }
                            ],
                            'name',
                            'comment',
                            'narxi',
                            'narxi2',

                            [
                                'attribute'=>'status',
                                'format'=>'raw',
                                'value'=>function($d){
                                    $url_update = Yii::$app->urlManager->createUrl(['/cp/menu/status','id'=>$d->id]);
                                    if($d->status == 1){

                                        return "<a href='{$url_update}' class='btn btn-success'>AKTIV</a> ";
                                    }else{
                                        return "<a href='{$url_update}' class='btn btn-danger'>DEAKTIV</a>";
                                    }
                                }
                            ],
                            [
                                'label'=>'',
                                'format'=>'raw',
                                'value'=>function($d){
                                    $url_update = Yii::$app->urlManager->createUrl(['/cp/menu/update','id'=>$d->id]);
                                    $url_delete = Yii::$app->urlManager->createUrl(['/cp/menu/delete','id'=>$d->id]);
                                    return "<button class='btn btn-primary update' value='{$url_update}'><span class='fa fa-pencil'></span></button> ".
                                        "<a class='btn btn-danger' href='{$url_delete}' data-method='post'><span class='fa fa-trash'></span></a>"
                                        ;
                                }
                            ],
                        ],
                    ]); ?>

                </div>
                <div class="col-md-6">
                    <?php $form = ActiveForm::begin(['action'=>Yii::$app->urlManager->createUrl(['/cp/menu/create'])]); ?>

                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'narxi')->textInput() ?>

                    <?= $form->field($model, 'narxi2')->textInput() ?>

                    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
                    <?php $model->category_id = $id ?>
                    <?= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Category::find()->all(),'id','name',['prompt'=>' '])) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>


</div>


    <div class="modal hide fade bs-example-modal-lg" id="update" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        O`zgartirish
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> ×
                    </button>
                </div>
                <div class="modal-body updatebody">

                </div>
            </div>
        </div>
    </div>
<?php
$this->registerJs("
        $('.update').click(function(){
            var url = this.value;
            $('#update').modal('show').find('.modal-body.updatebody').load(url);
        })
    ")
?>
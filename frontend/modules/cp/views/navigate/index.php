<?php

use common\models\Navigate;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
/** @var yii\web\View $this */
/** @var common\models\search\NavigateSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/* @var $model Navigate*/
$this->title = 'Navigatsiyalar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="navigate-index">

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 table-responsive">

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
//                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'name',
                            [
                                'attribute'=>'status',
                                'format'=>'raw',
                                'value'=>function($d){
                                    $url_update = Yii::$app->urlManager->createUrl(['/cp/navigate/status','id'=>$d->id]);
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
                                    $url_update = Yii::$app->urlManager->createUrl(['/cp/navigate/update','id'=>$d->id]);
                                    $url_delete = Yii::$app->urlManager->createUrl(['/cp/navigate/delete','id'=>$d->id]);
                                    return "<button class='btn btn-primary update' value='{$url_update}'><span class='fa fa-pencil'></span></button> ".
                                        "<a class='btn btn-danger' href='{$url_delete}' data-method='post'><span class='fa fa-trash'></span></a>"
                                        ;
                                }
                            ],
                        ],
                    ]); ?>
                </div>

                <div class="col-md-6">
                    <h4>Yangi Navigatsiya qo`shish</h4>
                    <?php $form = ActiveForm::begin(['action'=>Yii::$app->urlManager->createUrl(['/cp/navigate/create'])]); ?>

                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

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
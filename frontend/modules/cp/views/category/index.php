<?php

use common\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
/* @var $model Category*/
/** @var yii\web\View $this */
/** @var common\models\search\CategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Kategoriyalar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">


    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">

                    <?php foreach (\common\models\Navigate::find()->where(['status'=>1])->all() as $item):?>
                        <a href="<?= Yii::$app->urlManager->createUrl(['/cp/category/','id'=>$item->id])?>" class="btn btn-<?= $id == $item->id ? 'success' : 'primary' ?>"><?= $item->name?></a>
                    <?php endforeach;?>
                    <hr>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

//                            'id',
//                            'image',
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
//                            'navigate_id',
                            [
                                'attribute'=>'status',
                                'format'=>'raw',
                                'value'=>function($d){
                                    $url_update = Yii::$app->urlManager->createUrl(['/cp/category/status','id'=>$d->id]);
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
                                    $url_update = Yii::$app->urlManager->createUrl(['/cp/category/update','id'=>$d->id]);
                                    $url_delete = Yii::$app->urlManager->createUrl(['/cp/category/delete','id'=>$d->id]);
                                    return "<button class='btn btn-primary update' value='{$url_update}'><span class='fa fa-pencil'></span></button> ".
                                        "<a class='btn btn-danger' href='{$url_delete}' data-method='post'><span class='fa fa-trash'></span></a>"
                                        ;
                                }
                            ],
                            //'sort',
                        ],
                    ]); ?>
                </div>
                <div class="col-md-6">

                    <h4>Yangi kategoriya qo`shish</h4>

                    <?php $form = ActiveForm::begin(['action'=>Yii::$app->urlManager->createUrl(['/cp/category/create'])]); ?>

                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?php $model->navigate_id = $id;?>

                    <?= $form->field($model, 'navigate_id')
                        ->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Navigate::find()->where(['status'=>1])->all(),'id','name',['prompt'=>' '])) ?>

                    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>

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
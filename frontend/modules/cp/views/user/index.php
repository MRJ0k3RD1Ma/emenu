<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Foydalanuvchilar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a('Foydalanuvchi qo`shish', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//                    'id',
//                    'name',
                    [
                        'attribute'=>'name',
                        'format'=>'raw',
                        'value'=>function($d){
                            $url = Yii::$app->urlManager->createUrl(['/cp/user/view','id'=>$d->id]);
                            return "<a href='{$url}'>{$d->name}</a>";
                        }
                    ],
                    'username',
                    'phone',
//                    'password',
//                    'auth_key',
                    //'token',
                    //'code',
                    //'access_token',
                    //'updated',
                    //'role_id',
                    [
                        'attribute'=>'role_id',
                        'value'=>function($d){
                            return $d->role->name;
                        },
                        'filter'=>\yii\helpers\ArrayHelper::map(\common\models\UserRole::find()->all(),'id','name')
                    ],
                    //'image',
                    //'soato_id',
                    [
                        'attribute'=>'soato_id',
                        'value'=>function($d){
                            return $d->fulladdress;
                        },
                        'filter'=> $searchModel->soato_id ?
                            \yii\helpers\ArrayHelper::map(\common\models\DistrictView::find()->where(['region_id'=>$searchModel->soato_id])->all(),'id','name_lot')
                            : \yii\helpers\ArrayHelper::map(\common\models\RegionView::find()->all(),'region_id','name_lot')
                    ],
//                    'status',
                    [
                        'attribute'=>'status',
                        'value'=>function($d){
                            return Yii::$app->params['user.status'][$d->status];
                        },
                        'filter'=>Yii::$app->params['user.status']
                    ],
                    'created',
                ],
            ]); ?>
        </div>
    </div>




</div>

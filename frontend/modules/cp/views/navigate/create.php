<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Navigate $model */

$this->title = 'Create Navigate';
$this->params['breadcrumbs'][] = ['label' => 'Navigates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="navigate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Рабочее время';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="work-hour">
      <div class="contact-title">Рабочее время</div>
      <ul>
        <li>
          <span class="day">Понедельник</span>
          <span class="hour">10:00 - 23:00</span>
        </li>
        <li>
          <span class="day">Вторник</span>
          <span class="hour">10:00 - 23:00</span>
        </li>
        <li>
          <span class="day">Среда</span>
          <span class="hour">10:00 - 23:00</span>
        </li>
        <li>
          <span class="day">Четверг</span>
          <span class="hour">10:00 - 23:00</span>
        </li>
        <li>
          <span class="day">Пятница</span>
          <span class="hour">10:00 - 23:00</span>
        </li>
        <li>
          <span class="day">Суббота</span>
          <span class="hour">10:00 - 23:00</span>
        </li>
        <li>
          <span class="day">Воскресенье</span>
          <span class="hour">10:00 - 23:00</span>
        </li>
      </ul>
    </div>
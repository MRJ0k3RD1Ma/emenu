<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Контактная информация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="contact">
      <div class="contact-title">Контактная информация</div>
      <div class="contact-item">
        <div class="contact-item__icon">
          <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
            <path
              d="m424.472656 301h-113.214844l58.960938-94.078125c13.5625-21.511719 20.734375-46.382813 20.734375-71.921875 0-74.4375-60.5625-135-135-135-74.441406 0-135 60.5625-135 135 0 25.539062 7.167969 50.410156 20.710937 71.886719l58.984376 94.113281h-113.21875l-87.429688 211h511.902344zm-76.933594 120h94.183594l25.277344 61h-111.683594zm-22.46875 61h-138.386718l7.582031-61h123.03125zm104.222657-91h-85.578125l-7.648438-60h68.363282zm-278.339844-256c0-57.898438 47.101563-105 105-105 57.894531 0 105 47.101562 105 105 0 19.867188-5.570313 39.203125-16.132813 55.953125l-88.867187 141.800781-88.890625-141.832031c-10.539062-16.71875-16.109375-36.054687-16.109375-55.921875zm105 254.246094 36.503906-58.246094h13.367188l7.648437 60h-115.480468l7.460937-60h13.996094zm-148.480469-58.246094h67.75l-7.460937 60h-85.152344zm-37.292968 90h93.855468l-7.585937 61h-111.546875zm0 0"
            ></path>
            <path
              d="m330.953125 135c0-41.355469-33.644531-75-75-75s-75 33.644531-75 75 33.644531 75 75 75 75-33.644531 75-75zm-120 0c0-24.8125 20.1875-45 45-45s45 20.1875 45 45-20.1875 45-45 45-45-20.1875-45-45zm0 0"
            ></path>
          </svg>
        </div>
        <div class="contact-item__content">
          <div class="contact-item__title">Адрес</div>
          <div class="contact-item__about">
            г.Ургенч,ул.Аль-Хорезмий 77,ориентир почта БТС /
            Uzbekistan -
          </div>
        </div>
      </div>
      <div class="contact-item">
        <div class="contact-item__icon">
          <svg
            version="1.1"
            id="Capa_1"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px"
            y="0px"
            viewBox="0 0 473.806 473.806"
            style="enable-background: new 0 0 473.806 473.806"
            xml:space="preserve"
          >
            <path
              d="M374.456,293.506c-9.7-10.1-21.4-15.5-33.8-15.5c-12.3,0-24.1,5.3-34.2,15.4l-31.6,31.5c-2.6-1.4-5.2-2.7-7.7-4
                  c-3.6-1.8-7-3.5-9.9-5.3c-29.6-18.8-56.5-43.3-82.3-75c-12.5-15.8-20.9-29.1-27-42.6c8.2-7.5,15.8-15.3,23.2-22.8
                  c2.8-2.8,5.6-5.7,8.4-8.5c21-21,21-48.2,0-69.2l-27.3-27.3c-3.1-3.1-6.3-6.3-9.3-9.5c-6-6.2-12.3-12.6-18.8-18.6
                  c-9.7-9.6-21.3-14.7-33.5-14.7s-24,5.1-34,14.7c-0.1,0.1-0.1,0.1-0.2,0.2l-34,34.3c-12.8,12.8-20.1,28.4-21.7,46.5
                  c-2.4,29.2,6.2,56.4,12.8,74.2c16.2,43.7,40.4,84.2,76.5,127.6c43.8,52.3,96.5,93.6,156.7,122.7c23,10.9,53.7,23.8,88,26
                  c2.1,0.1,4.3,0.2,6.3,0.2c23.1,0,42.5-8.3,57.7-24.8c0.1-0.2,0.3-0.3,0.4-0.5c5.2-6.3,11.2-12,17.5-18.1c4.3-4.1,8.7-8.4,13-12.9
                  c9.9-10.3,15.1-22.3,15.1-34.6c0-12.4-5.3-24.3-15.4-34.3L374.456,293.506z M410.256,398.806
                  C410.156,398.806,410.156,398.906,410.256,398.806c-3.9,4.2-7.9,8-12.2,12.2c-6.5,6.2-13.1,12.7-19.3,20
                  c-10.1,10.8-22,15.9-37.6,15.9c-1.5,0-3.1,0-4.6-0.1c-29.7-1.9-57.3-13.5-78-23.4c-56.6-27.4-106.3-66.3-147.6-115.6
                  c-34.1-41.1-56.9-79.1-72-119.9c-9.3-24.9-12.7-44.3-11.2-62.6c1-11.7,5.5-21.4,13.8-29.7l34.1-34.1c4.9-4.6,10.1-7.1,15.2-7.1
                  c6.3,0,11.4,3.8,14.6,7c0.1,0.1,0.2,0.2,0.3,0.3c6.1,5.7,11.9,11.6,18,17.9c3.1,3.2,6.3,6.4,9.5,9.7l27.3,27.3
                  c10.6,10.6,10.6,20.4,0,31c-2.9,2.9-5.7,5.8-8.6,8.6c-8.4,8.6-16.4,16.6-25.1,24.4c-0.2,0.2-0.4,0.3-0.5,0.5
                  c-8.6,8.6-7,17-5.2,22.7c0.1,0.3,0.2,0.6,0.3,0.9c7.1,17.2,17.1,33.4,32.3,52.7l0.1,0.1c27.6,34,56.7,60.5,88.8,80.8
                  c4.1,2.6,8.3,4.7,12.3,6.7c3.6,1.8,7,3.5,9.9,5.3c0.4,0.2,0.8,0.5,1.2,0.7c3.4,1.7,6.6,2.5,9.9,2.5c8.3,0,13.5-5.2,15.2-6.9
                  l34.2-34.2c3.4-3.4,8.8-7.5,15.1-7.5c6.2,0,11.3,3.9,14.4,7.3c0.1,0.1,0.1,0.1,0.2,0.2l55.1,55.1
                  C420.456,377.706,420.456,388.206,410.256,398.806z"
            ></path>
            <path
              d="M256.056,112.706c26.2,4.4,50,16.8,69,35.8s31.3,42.8,35.8,69c1.1,6.6,6.8,11.2,13.3,11.2c0.8,0,1.5-0.1,2.3-0.2
                  c7.4-1.2,12.3-8.2,11.1-15.6c-5.4-31.7-20.4-60.6-43.3-83.5s-51.8-37.9-83.5-43.3c-7.4-1.2-14.3,3.7-15.6,11
                  S248.656,111.506,256.056,112.706z"
            ></path>
            <path
              d="M473.256,209.006c-8.9-52.2-33.5-99.7-71.3-137.5s-85.3-62.4-137.5-71.3c-7.3-1.3-14.2,3.7-15.5,11
                  c-1.2,7.4,3.7,14.3,11.1,15.6c46.6,7.9,89.1,30,122.9,63.7c33.8,33.8,55.8,76.3,63.7,122.9c1.1,6.6,6.8,11.2,13.3,11.2
                  c0.8,0,1.5-0.1,2.3-0.2C469.556,223.306,474.556,216.306,473.256,209.006z"
            ></path>
          </svg>
        </div>
        <div class="contact-item__content">
          <div class="contact-item__title">Телефон</div>
          <div class="contact-item__about">+99 893 744 44 44</div>
        </div>
      </div>
      <div class="contact-map">
        
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1775.142901049292!2d60.6307101965922!3d41.56009746416731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDHCsDMzJzM2LjUiTiA2MMKwMzcnNTAuNSJF!5e0!3m2!1sru!2s!4v1724511836297!5m2!1sru!2s"
          width="100%"
          height="100%"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
      <div class="contact-title">
        Следуйте за нами в социальных сетях
      </div>
      <div class="contact-social">
        <ul>
          <li>
            <a href="https://www.instagram.com/feromon_loungebar" target="_blank">
              <img src="/frdes/images/instagramIcon.svg" alt="instagramm">
            </a>
          </li>
          <li>
            <a href="#">
              <img src="/frdes/images/telegramIcon.svg" alt="telegramIcon">
            </a>
          </li>
        </ul>
      </div>
    </div>
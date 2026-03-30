<?php

use yii\web\View;
use common\models\Callback;
use yii\helpers\Url;

/**
 * @var $model Callback
 * @var $this View
 */

?>
<div class="card-about">
    <a href="<?= Url::to(['callback/view', 'id' => $model->id]) ?>" class="card-about__main-link"></a>
    <div class="card-about__inner">
        <div class="card-about__top">
            <div class="card-about__image">
                <img class="image is-lazy is-loaded"
                     src="<?= $model->main_image ?>" data-src="<?= $model->main_image ?>"
                     alt="<?= $model->title ?>" data-ll-status="">
            </div>
            <div class="card-about__label"><?= $model->type ? \Yii::t('frontend', 'Case') : \Yii::t('frontend', 'Callback') ?></div>
        </div>
        <div class="card-about__bottom">
            <div class="card-about__bottom-left">
                <h5 class="card-about__title h5"><?= $model->title ?></h5>
                <div class="card-about__text">Основной вид деятельности — <?= implode(', ', \yii\helpers\ArrayHelper::map($model->activities, 'id', 'title')) ?></div>
                <div class="card-about__link">
                    <a href="<?= Url::to(['callback/view', 'id' => $model->id]) ?>"
                       class="text-link text-default text-link--underline">Подробнее</a>
                </div>
            </div>
            <div class="card-about__bottom-right">
                <div class="card-about__info">
                    <div class="card-about__info-image">
                        <img class="image is-lazy is-loading"
                             src="<?= $model->main_image ?>"
                             data-src="" alt="<?= $model->title ?>" data-ll-status="">
                    </div>
                    <div class="card-about__info-description">
                        <div class="card-about__info-description-label"><?= $model->client_name ?></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php

use frontend\models\CallbackSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ListView;

/**
 * @var CallbackSearch $searchModel
 * @var View $this
 * @var ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('frontend', 'Cases and Callbacks');
$this->registerCss(<<<CSS
.filter__tag-list {
display: flex;
flex-wrap: wrap;
}
.filter-tag-list__item {
display: flex;
width: auto;
}
CSS);
?>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelector(".logo-white").style.display = "none !important";
        document.querySelector(".logo-red").style.display = "block !important";
        document.querySelector(".w-logo").style.display = "none";
        document.querySelector(".r-logo").style.display = "block";
        document.querySelector(".header.js-header").classList.remove("is-white");
        document.querySelectorAll('.tabs-list__el').forEach(item => {
            item.addEventListener('click', (event) => {
                event.preventDefault();
                console.log(event.target.getAttribute('data-key'))
                console.log(document.querySelector('[name="CallbackSearch[searchType]"]'))
                document.querySelector('[name="CallbackSearch[searchType]"]').value = event.target.getAttribute('data-key')
                document.querySelector('#filter-form').submit();
            })
        });
    })
</script>

<div class="hero ">
    <div class="hero__inner wrapper wrap-pl-1 wrap-pr-1">
        <nav class="breadcrumbs animate" aria-label="breadcrumb" data-animate="">
            <ul class="breadcrumbs__list text-default" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                <li class="breadcrumbs__crumb" itemprop="itemListElement" itemscope=""
                    itemtype="https://schema.org/ListItem">
                    <a href="/" class="breadcrumbs__text breadcrumbs__link text-lead" itemprop="item">
                        <span itemprop="name">Главная</span>
                    </a>
                    <meta itemprop="position" content="1">
                </li>
                <li class="breadcrumbs__crumb" itemprop="itemListElement" itemscope=""
                    itemtype="https://schema.org/ListItem">
                    <a href="/site/about" class="breadcrumbs__text breadcrumbs__link text-lead" itemprop="item">
                        <span itemprop="name">Компания</span>
                    </a>
                    <meta itemprop="position" content="2">
                </li>
                <li class="breadcrumbs__crumb" itemprop="itemListElement" itemscope=""
                    itemtype="https://schema.org/ListItem">
                    <span class="breadcrumbs__text breadcrumbs__link text-lead" itemprop="item"><span itemprop="name">Клиенты о нас</span></span>
                    <meta itemprop="position" content="3">
                </li>
            </ul>
        </nav>

        <h1 class="hero__title h2">Клиенты о нас</h1>
    </div>
</div>
<div class="tabs-link wrapper wrap-pl-1 wrap-pr-1" data-link-tabs="">
    <div class="tabs-link__wrap">
        <div class="tabs-list">
            <div class="tabs-list__wrap">
                <a href="#" class="tabs-list__el <?= $searchModel->searchType === '' || $searchModel->searchType === null ? "active" : "" ?>" data-href="#all" data-tab="" data-key="">Все</a>
                <a href="#" class="tabs-list__el <?= $searchModel->searchType === '1' ? "active" : "" ?>" data-href="#case" data-tab="" data-key="1">Кейсы</a>
                <a href="#" class="tabs-list__el <?= $searchModel->searchType === '0' ? "active" : "" ?>" data-href="#review" data-tab="" data-key="0">Отзывы</a>
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="filter wrapper">
        <div class="d-lg-none">
            <a href="#filters" class="btn btn--primary btn--hover-primary has-icon" data-modal="" data-effect="mfp-move-from-left">
                <span class="btn__icon">
					<i class="icon is-small" aria-hidden="true">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M13.8816 10.969C13.7533 11.0974 13.6645 11.3095 13.6645 11.4909V18.5175L11.3545 16.1987C11.3521 16.1963 11.3346 16.154 11.3346 16.1505V11.4901C11.3346 11.309 11.247 11.0985 11.1174 10.969L5.80947 5.66569H19.1886L13.8816 10.969ZM5.67348 5C5.0123 5 4.77668 5.56966 5.24534 6.03831L10.6467 11.4397C10.6517 11.4447 10.6689 11.486 10.6689 11.4901V16.1505C10.6689 16.3305 10.7565 16.5422 10.8838 16.6694L13.762 19.5476C13.9716 19.7573 14.3302 19.6088 14.3302 19.3122V11.4909C14.3302 11.4869 14.3482 11.4438 14.3524 11.4397L19.7537 6.03831C20.2232 5.56882 19.9891 5 19.3256 5H5.67348Z"
                                  fill="currentColor" stroke="currentColor"></path>
                        </svg>
                    </i>
				</span>
                <span class="btn__text ">Фильтр</span>
            </a>
        </div>
        <div class="modal mfp-hide mfp-with-anim modal--filter" id="filters">
            <button title="Close (Esc)" type="button" class="mfp-close">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 18L18.7279 5.27211" stroke-width="2"></path>
                    <path d="M6 5L18.7279 17.7279" stroke-width="2"></path>
                </svg>
            </button>
            <div class="modal__content bg-white">
                <h3 class="modal__head h3">Фильтр</h3>
                <div class="modal__body">
                    <div class="modal__left">
                        <?php $form = \yii\widgets\ActiveForm::begin([
                                'id' => 'filter-form',
                                'options' => [
                                        'enctype' => 'multipart/form-data',
                                        'class' => 'form-layout js-validate',
                                        'novalidate' => '',
                                        'data' => [
                                                'parsley-validate' => '',
                                                'parsley-initialized' => ''
                                        ],
                                ],
                                'fieldConfig' => [
                                        'template' => "{input}", // Отключаем автоматическую обертку
                                        'options' => ['tag' => false],
                                ],

                        ]); ?>

                        <!-- Используйте $form->field() вместо Html::activeDropDownList() -->
                        <div class="form-layout__items">
                            <div class="form-layout__item ">
                                <div class="form-layout__field">
                                    <div class="field theme-light">
                                        <div class="control">
                                            <?= $form->field($searchModel, 'searchActivities')
                                                    ->dropDownList(
                                                            CallbackSearch::getAllActivities(),
                                                            [
                                                                    'multiple' => true,
                                                                    'data' => [
                                                                            'select' => '',
                                                                            'select-size' => 'default',
                                                                            'select-theme' => 'light',
                                                                            'select-placeholder' => \Yii::t('frontend', 'Select an Activity'),
                                                                            'parsley-multiple' => 'activities',
                                                                            'select2-id' => 'activities',
                                                                    ],
                                                                    'tabIndex' => '-1',
                                                                    'aria-hidden' => 'true',
                                                                    'onChange' => 'this.form.submit()',
                                                            ]
                                                    )
                                                    ->label(false) // Убираем стандартную метку
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-layout__item ">
                                <div class="form-layout__field">
                                    <div class="field theme-light">
                                        <div class="control">
                                            <?= $form->field($searchModel, 'searchElements')
                                                    ->dropDownList(
                                                            CallbackSearch::getAllElements(),
                                                            [
                                                                    'multiple' => true,
                                                                    'data' => [
                                                                            'select' => '',
                                                                            'select-size' => 'default',
                                                                            'select-theme' => 'light',
                                                                            'select-placeholder' => \Yii::t('frontend', 'Select an Element'),
                                                                            'parsley-multiple' => 'elements',
                                                                            'select2-id' => 'elements',
                                                                    ],
                                                                    'tabIndex' => '-1',
                                                                    'aria-hidden' => 'true',
                                                                    'onChange' => 'this.form.submit()',
                                                            ]
                                                    )
                                                    ->label(false)
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="display: none">
                            <?= $form->field($searchModel, 'searchType')->hiddenInput(['class' => 'hidden-type'])->label(false) ?>
                        </div>

                        <?php \yii\widgets\ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="case_reload_area">
    <div class="wrapper wrap-pl-1 wrap-pr-1 pb-md-80 pb-64">
        <div class="card-about-list">
                <?php
                echo ListView::widget([
                        'dataProvider' => $dataProvider,
                        'class' => 'card-about-list__item',
                        'itemView' => function ($model, $key, $index, $widget) {
                            return $this->render('_item',['model' => $model]);

                            // or just do some echo
                            // return $model->title . ' posted by ' . $model->author;
                        },
                        'summary' => false,
                        'options' => [
                                'class' => 'card-about-list__items animate',
                        ],
                    'itemOptions' => [
                            'class' => 'card-about-list__item',
                    ]
                ]);

                ?>
        </div>
    </div>
</div>
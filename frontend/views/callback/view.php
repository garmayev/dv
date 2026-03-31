<?php

use yii\web\View;
use common\models\Callback;

/**
 * @var $this View
 * @var $model Callback
 */

$this->title = $model->title;

function features(string $title, string $image, string $text, string $type, bool $isActive)
{
    $label = \Yii::t('common', $type);
    $mainClass = $isActive ? 'shown' : '';
    $visibleRoll = $isActive ? '' : 'display: none';
    return "<div class='main-features__accordion {$mainClass}' data-image-src='{$image}' data-features-accordion-row=''>
        <button type='button' class='main-features__toggle h5 animate' data-features-accordion-toggle='' data-animate=''>$label
            <svg width='24' height='24' viewBox='0 0 24 24' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                <rect x='20.48' y='8.41431' width='12' height='2' transform='rotate(135 20.48 8.41431)'></rect>
                <rect x='4.92371' y='7' width='12' height='2' transform='rotate(45 4.92371 7)'></rect>
            </svg>
        </button>
        <div class='main-features__roll' data-features-accordion-roll='' style='$visibleRoll'>
            <div class='main-features__content'>
                <div class='user-text animate' data-animate=''>{$text}</div>
            </div>
            <div class='main-features__image'>
                <img class='image is-lazy is-cover' src='data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==' data-src='$image' alt='{$title}'>
                <div class='owl-carousel'>
                    <img src='$image' alt='$title'>
                </div>
            </div>
        </div>
    </div>";
}

?>

<script>
    document.querySelector(".logo-white").style.display = "none !important";
    document.querySelector(".logo-red").style.display = "block !important";
    document.querySelector(".w-logo").style.display = "none";
    document.querySelector(".r-logo").style.display = "block";
    document.querySelector(".header.js-header").classList.add("is-white");
    document.addEventListener("DOMContentLoaded", () => {
        const images = $(".text-lead img")
        images.removeAttr("height");
        images.removeAttr("width");
    });
</script>
<style>
    @media (max-width: 600px) {
        .main-slider-slide.active {
            padding-top: 3.5rem;
        }
        .main-slider-slide__content {
            padding: 0 1rem;
        }
        .main-slider-slide__title.h2 {
            font-size: 1.3rem !important;
            padding-right: 0;
        }
        .case-description__content {
            margin-bottom: 1rem;
        }
    }
    .text-lead img {
        display: inline-block;
        max-width: 100%;
    }
</style>
<div class="mb-2-fixed">
    <div class="hero-main  ">
        <div class="hero-main__wrap">
            <div class="main-slider main-slider--not-slider">
                <canvas class="main-slider__canvas main-slider__canvas--loaded" width="1920" height="1075"></canvas>
                <div class="main-slider__slides">
                    <div class="main-slider__slides-overlay" style="opacity: 1;"></div>
                    <div data-id="0" data-src="<?= $model->main_image ?>" class="main-slider-slide active has-overlay" title="<?= $model->title ?>">
                        <div class="main-slider-slide__content">
                            <div class="main-slider-slide__main">
                                <div class="main-slider-slide__subtitle">
                                    <a href="/callback/index" class="main-slider-slide__subtitle-text">Кейсы</a>
                                </div>
                                <div class="main-slider-slide__title h2"><?= $model->title ?></div>
                                <div class="main-slider-slide__actions">
                                    <div class="main-slider-slide__action ">
                                        <a href="#technic-invite" class="btn btn--primary btn--hover-primary has-icon" data-modal="" data-effect="mfp-move-from-left">
                							<span class="btn__icon btn__icon--right">
                                                <i class="icon is-small" aria-hidden="true">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M21.5931 12.0811L12.2682 21.406L10.854 19.9918L17.7647 13.0811H4.02054V11.0811H17.7647L10.854 4.17044L12.2682 2.75623L21.5931 12.0811Z"></path>
                                                    </svg>
                                                </i>
                                            </span>
                                            <span class="btn__text ">Хочу также</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-slider-controls">
                    <div class="main-slider-info">
                        <div class="main-slider-info__title text-default">Агротехника профессионалов</div>
                    </div>
                    <div class="main-slider-nav hidden main-slider-nav--autoplay white">
                        <div class="nav-arrows nav-arrows--default">
                            <button type="button" class="nav-arrows__button" data-nav-arrow-prev="" title="Назад" aria-label="Назад"></button>
                            <button type="button" class="nav-arrows__button" data-nav-arrow-next="" title="Вперёд" aria-label="Вперёд"></button>
                            <button class="nav-arrows__pause">
                                <i class="icon is-small" aria-hidden="true"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17 12L9 20L9 4L17 12Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                            </button>
                            <span class="nav-arrows__arrow">
                                <i class="icon is-small" aria-hidden="true">
                                    <svg width="24" height="24" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 19L9 12L16 5" stroke-width="2" stroke-linecap="square"></path>
                                    </svg>
                                </i>
                            </span>
                            <span class="nav-arrows__arrow">
                                <i class="icon is-small" aria-hidden="true">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.00012 5L16.0001 12L9.00012 19" stroke-width="2" stroke-linecap="square"></path>
                                    </svg>
                                </i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mb-lg-0 mb-2-fixed" data-share-area="">
    <div class="wrapper wrap-pl-1 wrap-pr-1 mb-2-fixed">
        <div class="case-description">
            <div class="case-description__base">
                <div class="case-description__content">
                    <div class="case-description__heading">
                        <h2>Общее описание</h2>
                    </div>
                    <div class="case-description__lead text-lead">Основной вид деятельности — <?= implode(', ', \yii\helpers\ArrayHelper::map($model->activities, 'id', 'title')) ?>.</div>
                </div>
                <div class="case-description__side">
                    <div class="case-description__side-content">
                        <p class="case-description__side-title h4">Клиент</p>
                        <p class="text-default"><?= $model->client_name ?>></p>
                        <p class="text-default opacity-04"><?= $model->client_address ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if ($model->problems || $model->tasks || $model->decision) :
    ?>
    <div class="wrapper wrap-pl-1 wrap-pr-1 mb-2-fixed my-2-fixed">
        <div class="main-features" data-main-features="">
            <div class="main-features__body animate" data-body="" data-animate="">
                <?php
                if ($model->problems || $model->tasks || $model->decision) {
                    echo '<div class="main-features__mainImage" data-image-wrap="">
                        <div class="main-features__mainImage-wrap">
                            <img src="" alt="alt text" class="image is-lazy is-loading" data-image="" data-ll-status="loading">
                        </div>
                    </div>';
                }
                ?>
                <div class="main-features__wrap">
                    <div class="main-features__group" data-features-accordion-group="" data-image-src="">
                        <div class="main-features__accordions">
                            <?php
                            if ($model->problems && $model->problem_img) {
                                echo features($model->title, $model->problem_img, $model->problems, 'Problems', true);
                            }
                            if ($model->tasks && $model->task_img) {
                                echo features($model->title, $model->task_img, $model->tasks, 'Tasks', false);
                            }
                            if ($model->decision && $model->decision_img) {
                                echo features($model->title, $model->decision_img, $model->decision, 'Decisions', false);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        endif;
    ?>
    <?php if ($model->elements) : ?>
    <div class="slider-small-gap">
        <div class="wrapper wrap-pl-1 wrap-pr-1 mb-lg-128 mb-md-96 my-80">
            <div class="slider-products">
                <h2 class="slider-products__title">Используемые продукты</h2>
                <div class="slider-products__inner">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($model->elements as $element) {
                            echo "<div class='swiper-slide slider-products__slide'>
                            <div class='card' itemscope='' itemtype='http://schema.org/ImageObject'>
                                <a href='".\yii\helpers\Url::to(['products/element', 'parent' => $element->section->code, 'code' => $element->code])."' class='card__inner'>
                                    <div class='card__img'>
                                        <img class='image is-lazy isItemProp is-loaded' src='".$element->image."' data-src='".$element->image."' itemprop='contentUrl' alt='".$element->name."' data-ll-status='loaded'>
                                    </div>
                                </a>
                                <div class='card__info'>
                                    <a href='".\yii\helpers\Url::to(['products/element', 'parent' => $element->section->code, 'code' => $element->code])."' class='card__inner'>
                                    </a>
                                    <div class='card__info-wrap'>
                                        <a href='".\yii\helpers\Url::to(['products/element', 'parent' => $element->section->code, 'code' => $element->code])."' class='card__inner'>
                                            <div class='card__title h5' itemprop='name'>{$element->name}</div>
                                        </a>
                                        <div class='card__description' itemprop='description'>".$element->general_description->description."</div>
                                    </div>
                                </div>
                           </div>
                        </div>";
                        }
                        ?>

                        <div class="slider-products__line" data-line=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="mb-2-fixed mb-2-fixed--small">
        <div class="block-slider wrapper wrap-pr-1 wrap-pl-1">
            <div class="block-slider__head animate" data-animate="">
                <h2 class="block-slider__title h2">Результат</h2>
            </div>

            <div class="block-slider__wrap" data-slider-wrap="" data-no-slider="">
                <canvas class="block-slider__canvas" width="1779" height="600">
                </canvas>
                <div data-id="0" data-src="<?= $model->result_img ?>" class="block-slider__image"></div>
                <div class="swiper-container" data-slider="" style="margin-top: -100px;">
                    <div class="swiper-wrapper">
                        <div class="block-slider__slide swiper-slide">
                            <div class="block-slider__slide-content">
                                <div class="block-slider__slide-content-wrap has-factors">
                                    <div class="block-slider__factors">
                                    </div>
                                    <div class="block-slider__slide-content-text animate" data-animate="">
                                        <div class="text-lead">
                                            <?= $model->result_text ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="block-slider-m" data-slider-m-wrap="">
                <div class="swiper-container" data-slider="">
                    <div class="swiper-wrapper">
                        <div class="block-slider__slide swiper-slide">
                            <div class="block-slider__slide-img ">
                                <div class="image is-lazy is-cover" role="img" aria-label="image" data-bg="<?= $model->result_img ?>"></div>
                            </div>
                            <div class="block-slider__slide-content">
                                <div class="block-slider__slide-content-wrap has-factors">
                                    <div class="block-slider__slide-content-text" data-animate="">
                                        <div class="text-lead">
                                            <?= $model->result_text ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

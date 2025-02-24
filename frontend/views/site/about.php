<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'О Нас';
$this->params['breadcrumbs'][] = ['label' => 'Главная', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile("/js/script.js");
?>
<script src="https://api-maps.yandex.ru/2.1/?apikey=bc709e46-0fb9-47fe-89f5-c75b3164cdfe&lang=ru_RU"
        type="text/javascript"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        setTheme("white");
    });
</script>
<div class="hero-main">
    <div class="hero-main__wrap">
        <div class="main-slider main-slider--not-slider">
            <canvas class="main-slider__canvas main-slider__canvas--loaded" width="1866" height="1044"></canvas>
            <div class="main-slider__slides">
                <div class="main-slider__slides-overlay"></div>
                <div data-id="0" id="bx_3218110189_76"
                     data-src="/images/about.jpg"
                     class="main-slider-slide active" title="О компании" alt="О компании">
                    <div class="main-slider-slide__content">
                        <div class="main-slider-slide__main">
                            <div class="main-slider-slide__title h2">О компании</div>
                            <div class="main-slider-slide__text">
                                <p>На алтайском рынке Торговая компания «ЕВРОПА» существует более 18 лет. Сегодня это уже не
                                    просто торгующая современной сельхозтехникой организация. Здесь ценят, аккумулируют и
                                    передают алтайским аграриям самые современные агротехнологии и разработки ведущих
                                    европейских производителей, чтобы сделать сельское хозяйство региона успешным.</p>
                            </div>
                            <div class="main-slider-slide__actions">
                                <div class="main-slider-slide__action ">
                                </div>
                            </div>
                        </div>
                        <div class="main-slider-slide__fact">
                            <div class="main-slider-slide__fact-wrap">
                                <div class="factor animate" data-viewport-trigger="" data-animate="">
                                    <div class="factor__text text-default animate" data-animate="fade-in-up"
                                         data-animate-delay="1">Поставлено более
                                    </div>
                                    <div class="factor__head">
                                        <span class="factor__number">
                                            <span class="factor__number-value animate" data-counter=""
                                                  data-counter-separator=" ">300</span>
                                        </span>
                                        <span class="factor__suffix">
                                            <span style="display: none">300</span> моделей техники
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="main-slider-slide__fact-wrap">
                                <div class="factor animate" data-viewport-trigger="" data-animate="">
                                    <div class="factor__text text-default animate" data-animate="fade-in-up"
                                         data-animate-delay="1">Более
                                    </div>
                                    <div class="factor__head">
                                        <span class="factor__number">
                                            <span class="factor__number-value animate" data-counter=""
                                                  data-counter-separator=" ">30</span>
                                        </span>
                                        <span class="factor__suffix">
                                            <span style="display: none">30</span> лет успешной работы
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-slider-controls">
                <div class="main-slider-info">
                    <div class="main-slider-info__title text-default">Агротехника Профессионалов</div>
                </div>
                <div class="main-slider-nav hidden main-slider-nav--autoplay white">
                    <div class="nav-arrows nav-arrows--default">
                        <button type="button" class="nav-arrows__button" data-nav-arrow-prev="" title="Назад"
                                aria-label="Назад"></button>
                        <button type="button" class="nav-arrows__button" data-nav-arrow-next="" title="Вперёд"
                                aria-label="Вперёд"></button>
                        <button class="nav-arrows__pause">
                            <i class="icon is-small" aria-hidden="true">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17 12L9 20L9 4L17 12Z" fill="currentColor"></path>
                                </svg>
                            </i>
                        </button>
                        <span class="nav-arrows__arrow">
                            <i class="icon is-small" aria-hidden="true">
                                <svg width="24" height="24" stroke="currentColor" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 19L9 12L16 5" stroke-width="2" stroke-linecap="square"></path>
                                </svg>
                            </i>
                        </span>
                        <span class="nav-arrows__arrow">
                            <i class="icon is-small" aria-hidden="true">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.00012 5L16.0001 12L9.00012 19" stroke-width="2"
                                          stroke-linecap="square"></path>
                                </svg>
                            </i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrap-pl-1 wrap-pr-1 mt-56 mt-md-56 mt-lg-56 mb-56 ">
    <div class="general-description">
        <div class="general-description__wrap">
            <div class="general-description__content general-description__content--factor ">
                <div class="general-description__title h2" data-animate-lines="">Компания сегодня</div>
                <div class="general-description__left">
                    <ul class="general-description__factor-list">
                        <li class="general-description__factor">
                            <div class="factor animate" data-viewport-trigger="" data-animate="">
                                <div class="factor__text text-default animate" data-animate="fade-in-up"
                                     data-animate-delay="1">моделей и модификаций техники более
                                </div>
                                <div class="factor__head">
						    <span class="factor__number">
							<span class="factor__number-value" data-counter="">200</span>
						    </span>
                                    <span class="factor__suffix">
							<span style="display: none">200</span>
							единиц													</span>
                                </div>
                            </div>
                        </li>
                        <li class="general-description__factor">
                            <div class="factor animate" data-viewport-trigger="" data-animate="">
                                <div class="factor__text text-default animate" data-animate="fade-in-up"
                                     data-animate-delay="1">официальный дилер Ростсельмаш
                                </div>
                                <div class="factor__head">
						    <span class="factor__number">
							<span class="factor__number-value" data-counter="">20</span>
						    </span>
                                    <span class="factor__suffix">
							<span style="display: none">20</span>
							лет успешной работы
                                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="general-description__factor">
                            <div class="factor animate" data-viewport-trigger="" data-animate="">
                                <div class="factor__text text-default animate" data-animate="fade-in-up"
                                     data-animate-delay="1">
                                </div>
                                <div class="factor__head">
						    <span class="factor__number">
							<span class="factor__number-value" data-counter="">1</span>
						    </span>
                                    <span class="factor__suffix">
							<span style="display: none">1</span>
							регион присутствия в Алтайском крае
						    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="general-description__right general-description__right--wide">
                    <div class="general-description__description user-text">
                        <p>История компании началась в 2005 году. С момента своего основания «Европа»
                            является на Алтае
                            официальным дилером ведущих мировых производителей сельхозтехники — РОСТСЕЛЬМАШ и
                            KLEVER.</p>
                        <p class="mt-40">Кроме того, в составе сервисного центра существует 18 оснащенных необходимым инструментарием
                            мобильных бригад, благодаря чему клиенты компании «Европа» имеют возможность обслуживания
                            техники в полевых условиях — когда каждый час простоя техники буквально на вес золота.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="slider-history-company" id="bx_651765591_150229">
    <div class="mb-lg-96 mb-md-52 mb-52 mt-lg-52 sadsad">
        <div class="slider-story wrapper wrap-pr-1 wrap-pl-1">
            <div class="slider-story__wrap">
                <div class="slider-story__base">
                    <!-- Slider main container -->
                    <div class="swiper js-swiper-story swiper-initialized swiper-horizontal swiper-backface-hidden">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper" id="swiper-wrapper-f63f4c898b1cc5d2" aria-live="polite">
                            <!-- Slides -->
                            <div class="swiper-slide slider-story__slide swiper-slide-active" data-year="default"
                                 data-href-button="#default" role="group" aria-label="1 / 1">
                                <div class="slider-story__content">
                                    <div class="slider-story__info animate" data-animate="">
                                        <div class="user-text">
                                            <p>Успех отрасли невозможен без качественного сервисного
                                                обслуживания и ремонта, уверены в компании «Европа». Именно поэтому
                                                своим клиентам здесь всегда готовы предложить оперативное обслуживание
                                                техники. Сервисный центр ежегодно отрабатывает более 2000 заявок. </p>
                                            <p class="mt-40">Для этого на территории торгово-выставочного комплекса
                                                создана инфраструктура по предпродажной подготовке и гарантийному
                                                обслуживанию, а также ремонту любых сельхозмашин.</p>
                                            <p class="mt-40">Коллектив сервисного центра составляют 38 инженеров, среди
                                                которых специалисты по наладке механической части, гидравлической части,
                                                специалисты по наладке электроники. В своей работе они используют только
                                                оригинальные запчасти и расходные материалы.</p>
                                        </div>
                                    </div>
                                    <div class="slider-story__image">
                                        <img class="image is-cover" src="/images/DJI_0068.jpg" alt="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrap-pl-1 wrap-pr-1 mt-md-52 mt-lg-52 mb-56 ">
    <div class="general-description">
        <div class="general-description__wrap">
            <div class="general-description__content general-description__content--factor ">
                <div class="general-description__left">
                    <div class="general-description__factor-list">
                        <img src="/images/DJI_0152.jpg" style="width: 90%;" />
                    </div>
                </div>
                <div class="general-description__right general-description__right--wide">
                    <div class="general-description__description user-text">
                        <p>Все специалисты обладают большим опытом работы, постоянно проходят обучение на
                            заводах-производителях, обладают актуальной информацией о новых разработках, что позволяет
                            им качественно и в короткие сроки проводить техобслуживание и устранять неполадки в работе
                            оборудования.</p>
                        <p class="mt-40">А на складе запасных частей как в наличии, так и под заказ — только
                            оригинальные детали заводов-изготовителей: расширенный спектр запчастей и гарантийные
                            комплекты на весь шлейф техники, представленной на торговой площадке ТК «Европа»</p>
                        <a href="/site/certificate" class="btn btn--primary btn--hover-primary mt-40">
                            <span class="btn__text">Наши сертификаты</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mb-lg-52 mb-md-52 mb-96">
    <div class="operation-list">
        <div class="wrapper wrap-pl-1 wrap-pr-1">
            <div class="operation-list__head animate" data-animate="">
                <div class="operation-list__left">
                    <div class="operation-list__title h2">Техника для любой агрооперации</div>
                </div>
                <div class="operation-list__right">
                    <p class="operation-list__text text-default">Обладаем всем спектром новейших технологий для
                        полного цикла выпуска наиболее сбалансированной и эффективной продукции</p>
                </div>
            </div>
            <ul class="operation-list__list">
                <li class="operation-list__item animate" data-animate="">
                    <div class="operation-list__item-marker animate" data-animate="">
                        <div class="operation-list__item-square" style="transition-delay: 0.25s"></div>
                        <div class="operation-list__item-dotted" style="transition-delay: 0.25s"></div>
                    </div>
                    <span class="operation-list__item-text h5 animate" data-animate="" data-animate-delay="1">Обработка почвы</span>
                </li>
                <li class="operation-list__item animate" data-animate="">
                    <div class="operation-list__item-marker animate" data-animate="">
                        <div class="operation-list__item-square" style="transition-delay: 0.5s"></div>
                        <div class="operation-list__item-dotted" style="transition-delay: 0.5s"></div>
                    </div>
                    <span class="operation-list__item-text h5 animate" data-animate=""
                          data-animate-delay="2">Посев</span>
                </li>
                <li class="operation-list__item animate" data-animate="">
                    <div class="operation-list__item-marker animate" data-animate="">
                        <div class="operation-list__item-square" style="transition-delay: 0.75s"></div>
                        <div class="operation-list__item-dotted" style="transition-delay: 0.75s"></div>
                    </div>
                    <span class="operation-list__item-text h5 animate" data-animate="" data-animate-delay="3">Удобрение почвы</span>
                </li>
                <li class="operation-list__item animate" data-animate="">
                    <div class="operation-list__item-marker animate" data-animate="">
                        <div class="operation-list__item-square" style="transition-delay: 1s"></div>
                        <div class="operation-list__item-dotted" style="transition-delay: 1s"></div>
                    </div>
                    <span class="operation-list__item-text h5 animate" data-animate="" data-animate-delay="4">Уборка урожая</span>
                </li>
                <li class="operation-list__item animate" data-animate="">
                    <div class="operation-list__item-marker animate" data-animate="">
                        <div class="operation-list__item-square" style="transition-delay: 1.25s"></div>
                        <div class="operation-list__item-dotted" style="transition-delay: 1.25s"></div>
                    </div>
                    <span class="operation-list__item-text h5 animate" data-animate=""
                          data-animate-delay="5">Покос</span>
                </li>
                <li class="operation-list__item animate" data-animate="">
                    <div class="operation-list__item-marker animate" data-animate="">
                        <div class="operation-list__item-square" style="transition-delay: 1.5s"></div>
                    </div>
                    <span class="operation-list__item-text h5 animate" data-animate="" data-animate-delay="6">Подготовка валков</span>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class=" mb-80">
    <div class="map-box" data-map-box="" data-map-network=""
         data-url="/local/templates/.default/components/uplab.core/template.block/map-box/networkMapData.php">
        <div class="wrapper wrap-pr-1 wrap-pl-1 mb-lg-64 mb-md-56 mb-32">
            <div class="map-box__top animate" data-animate="">
                <h2 class="map-box__heading">Наш адрес</h2>
                <p class="map-box__description text-default">Работаем на территории Тамбовской и Липецкой областей</p>
            </div>
        </div>
        <div class="map-box__container animate" data-animate="">
            <div class="map-box__frame " id="rt-yandex-map-custom" style=""></div>
        </div>
    </div>
</div>
<?php
$branches = \common\models\Branch::find()->all();
$this->registerJsVar('models', $branches);
?>
<script>
    ymaps.ready(init);

    function init() {
        let centerLat = 0.0, centerLong = 0.0;
        models.map(model => {
            centerLat += model.latitude
            centerLong += model.longitude
        })
        console.log(centerLat, centerLong, models.length)
        console.log([centerLat / models.length, centerLong / models.length]);

        const myMap = new ymaps.Map("rt-yandex-map-custom", {
            center: [centerLat / models.length, centerLong / models.length],
            zoom: 9,
            controls: ['zoomControl'],
        });

        let cluster = new ymaps.Clusterer({
            clusterIcon: [
                {
                    href: '/dist/img/map-icon/001.svg',
                    size: [76, 43],
                    offset: [-8, -42]
                }
            ]
        }), placemarks = [];
        models.map(model => {
            placemarks.push(new ymaps.Placemark([model.latitude, model.longitude], {
                balloonContentHeader: model.title,
                balloonContentBody: `<p>${model.address}</p><p>Телефон: ${model.phone}</p>`
            }, {
                iconLayout: 'default#imageWithContent',
                iconImageHref: '/dist/img/map-icon/001.svg',
                iconImageSize: [76, 43],
                iconImageOffset: [-8, -42],
                interactiveZIndex: true,
            }))
        })

        cluster.add(placemarks);
        myMap.geoObjects.add(cluster);
        console.log("Placemark added")
    }
</script>

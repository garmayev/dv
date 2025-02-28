<?php
$branch = \common\models\Branch::findOne(\Yii::$app->session->get('branch'));
$cleanPhone = preg_replace('/[\ \(\)\+\-]/', '', $branch->phone);
$this->registerCss(<<<CSS
@media (min-width: 990px) {
    .footer__main-grid {
        -ms-grid-columns: 1fr 1fr 1fr 1fr;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        -ms-grid-rows: auto auto auto auto;
        grid-template-rows: auto auto auto auto;
        grid-template-areas:
        "logo logo logo logo"
        "actions nav nav nav"
        ". subsidiaries address switcher"
        ". policy policy copyrights" !important;
    }
    .footer__address-list {
        display: flex;
        flex-direction: column !important;
    }
}
CSS
);
?>
<footer class="footer">
    <div class="footer__contacts">
        <div class="footer__contacts-wrapper wrapper wrap-pr-1 wrap-pl-1">
            <ul class="footer__contacts-list">
                <li class="footer__contacts-item" data-animate="">
                    <span class="footer__contacts-item-label text-default">Телефон</span>
                    <a class="footer__contacts-item-link" href="tel:<?= $cleanPhone ?>" data-link-animate="">
                        <?= $branch->phone ?></a>
                </li>
                <li class="footer__contacts-write-us" data-animate="" data-animate-delay="2">
                    <a href="#write_us" class="btn btn--empty btn--hover-white btn--large" data-modal=""
                       data-effect="mfp-move-from-left">
                        <span class="btn__text btn__text--small">Напишите нам</span>
                    </a>
                </li>
            </ul>
            <ul class="footer__contacts-social footer__social-list" data-animate="" data-animate-sequence="">
                <li class="footer__social-item">
                    <a href="https://dzen.ru/tk_europa" target="_blank"
                       class="footer__social-link footer__social-link--vk" aria-label="VK">
                        <svg width="169" height="169" viewbox="0 0 169 169" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg" style="height: 24px; width: 24px">
                            <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    fill="white"
                                    d="M84.0337 168.01H84.7036C118.068 168.01 137.434 164.651 151.152 151.333C165.139 137.206 168.369 117.709 168.369 84.4749V83.5351C168.369 50.311 165.139 30.9445 151.152 16.677C137.444 3.3594 117.938 0 84.7136 0H84.0437C50.6797 0 31.3031 3.3594 17.5856 16.677C3.59808 30.8045 0.368652 50.311 0.368652 83.5351V84.4749C0.368652 117.699 3.59808 137.066 17.5856 151.333C31.1732 164.651 50.6797 168.01 84.0337 168.01Z"
                            ></path>
                            <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    fill="#D0043C"
                                    d="M148.369 82.7304C148.369 82.0906 147.849 81.5608 147.209 81.5308C124.246 80.661 110.271 77.732 100.494 67.955C90.6967 58.1581 87.7776 44.1724 86.9079 21.1596C86.8879 20.5198 86.358 20 85.7082 20H83.0291C82.3893 20 81.8594 20.5198 81.8295 21.1596C80.9597 44.1624 78.0406 58.1581 68.2437 67.955C58.4568 77.742 44.4911 80.661 21.5283 81.5308C20.8885 81.5508 20.3687 82.0806 20.3687 82.7304V85.4096C20.3687 86.0494 20.8885 86.5792 21.5283 86.6092C44.4911 87.4789 58.4667 90.408 68.2437 100.185C78.0206 109.962 80.9397 123.908 81.8195 146.83C81.8394 147.47 82.3693 147.99 83.0191 147.99H85.7082C86.348 147.99 86.8779 147.47 86.9079 146.83C87.7876 123.908 90.7067 109.962 100.484 100.185C110.271 90.398 124.236 87.4789 147.199 86.6092C147.839 86.5892 148.359 86.0594 148.359 85.4096V82.7304H148.369Z"
                        </svg>
                        <span class="footer__social-text">Дзен</span>
                    </a>
                </li>
                <li class="footer__social-item" style="opacity: 1; transform: translate(0px, 0px);">
                    <a href="https://www.youtube.com/channel/UCFPY47OGwrZmFHwsPO0YGdA" target="_blank"
                       class="footer__social-link footer__social-link--youtube" aria-label="Youtube">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M19.9103 4.46645C20.819 4.7177 21.5356 5.45318 21.7802 6.38624C22.2348 8.09051 22.2173 11.6429 22.2173 11.6429C22.2173 11.6429 22.2173 15.1773 21.7804 16.8817C21.5356 17.8146 20.8192 18.5502 19.9103 18.8013C18.2499 19.25 11.6087 19.25 11.6087 19.25C11.6087 19.25 4.98472 19.25 3.30705 18.7836C2.39812 18.5323 1.68166 17.7967 1.4369 16.8638C1 15.1773 1 11.625 1 11.625C1 11.625 1 8.09051 1.4369 6.38624C1.68149 5.45335 2.4156 4.69975 3.30688 4.44867C4.96724 4 11.6085 4 11.6085 4C11.6085 4 18.2499 4 19.9103 4.46645ZM14.9239 11.625L9.61957 14.6087V8.6413L14.9239 11.625Z"></path>
                        </svg>
                        <span class="footer__social-text">Youtube</span>
                    </a>
                </li>
                <li class="footer__social-item">
                    <a href="https://t.me/tk_evropa" target="_blank"
                       class="footer__social-link footer__social-link--telegram" aria-label="Telegram">
                        <svg width="24" height="24" viewbox="0 0 24 24" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M9.84784 14.5451L9.517 19.0122C9.99034 19.0122 10.1953 18.817 10.4412 18.5827L12.6604 16.5467L17.2588 19.7794C18.1022 20.2306 18.6964 19.993 18.9239 19.0346L21.9423 5.45712L21.9431 5.45632C22.2106 4.25952 21.4923 3.79153 20.6706 4.08512L2.9285 10.6059C1.71764 11.0571 1.73598 11.7051 2.72267 11.9987L7.25861 13.3531L17.7947 7.02431C18.2905 6.70911 18.7414 6.88351 18.3705 7.19871L9.84784 14.5451Z"
                                    fill="#efeff2"
                            ></path>
                        </svg>
                        <span class="footer__social-text">Telegram</span>
                    </a>
                </li>
                <li class="footer__social-item" style="opacity: 1; transform: translate(0px, 0px);">
                    <a href="https://rutube.ru/channel/38761511/" target="_blank"
                       class="footer__social-link footer__social-link--youtube" aria-label="Tutube">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M19.9103 4.46645C20.819 4.7177 21.5356 5.45318 21.7802 6.38624C22.2348 8.09051 22.2173 11.6429 22.2173 11.6429C22.2173 11.6429 22.2173 15.1773 21.7804 16.8817C21.5356 17.8146 20.8192 18.5502 19.9103 18.8013C18.2499 19.25 11.6087 19.25 11.6087 19.25C11.6087 19.25 4.98472 19.25 3.30705 18.7836C2.39812 18.5323 1.68166 17.7967 1.4369 16.8638C1 15.1773 1 11.625 1 11.625C1 11.625 1 8.09051 1.4369 6.38624C1.68149 5.45335 2.4156 4.69975 3.30688 4.44867C4.96724 4 11.6085 4 11.6085 4C11.6085 4 18.2499 4 19.9103 4.46645ZM14.9239 11.625L9.61957 14.6087V8.6413L14.9239 11.625Z"></path>
                        </svg>
                        <span class="footer__social-text">Rutube</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="footer__main">
        <div class="footer__main-grid wrapper wrap-pl-1 wrap-pr-1">
            <div class="footer__logo">
                <span class="footer__logo-wrapper">
                    <div class="n-logo-t">
                        <?php $logo_white = \common\models\Config::findOne(['title' => 'logo_white']) ?>
                        <a href="/"><img src="<?= $logo_white->value ?>" alt="" style="width: 250px;"></a>
                    </div>
                </span>
            </div>
            <div class="footer__actions">
                <ul class="footer__action-list">
                    <li class="footer__action">
                        <p class="subscribe-descr text-default">Официальный дилер
                            Ростсельмаш<br/> "АгроТехника-ДВ"</p>
                    </li>
                    <li class="footer__action">
                        <a href="tel:<?= $cleanPhone ?>" class="text-link text-default"
                           target="_blank"><?= $branch->phone ?></a>
                    </li>
                    <li class="footer__action">
                        <a href="mailto:<?= $branch->email ?>" class="text-link text-default"
                           target="_blank"><?= $branch->email ?></a>
                    </li>
                </ul>
            </div>
            <div class="footer__nav">
                <ul class="footer__nav-list">
                    <li class="footer__nav-item">
                        <a href="/products/" class="footer__nav-item-link"
                           data-link-animate="primary">Техника</a>
                    </li>
                    <li class="footer__nav-item">
                        <a href="/finance/index" class="footer__nav-item-link" data-link-animate="primary">Финансирование</a>
                    </li>
                    <li class="footer__nav-item">
                        <a href="/systems/" class="footer__nav-item-link"
                           data-link-animate="primary">Точное земледелие</a>
                    </li>
                    <li class="footer__nav-item">
                        <a href="/finance/specials" class="footer__nav-item-link">Акции</a>
                    </li>
                    <li class="footer__nav-item">
                        <a href="/site/about" class="footer__nav-item-link" data-link-animate="primary">Компания</a>
                    </li>
                    <li class="footer__nav-item">
                        <a href="/parts/qr" class="footer__nav-item-link" data-link-animate="primary">Заявка на
                            ремонт</a>
                    </li>
                    <li class="footer__nav-item">
                        <a href="/parts/index" class="footer__nav-item-link" data-link-animate="primary">Запчасти
                            и сервис</a>
                    </li>
                    <li class="footer__nav-item">
                        <a href="/site/contact" class="footer__nav-item-link"
                           data-link-animate="primary">Контакты</a>
                    </li>
                    <li class="footer__nav-item">
                        <a href="https://blog.rostselmash.com/" class="footer__nav-item-link"
                           data-link-animate="primary">Блог Ростсельмаш</a>
                    </li>
                    <li class="footer__nav-item">
                        <a href="https://agrotronic.rostselmash.com/cas/login?service=https%3A%2F%2Fagrotronic.rostselmash.com"
                           class="footer__nav-item-link"
                           data-link-animate="primary">Вход в РСМ Агротроник</a>
                    </li>
                </ul>
            </div>
            <div class="footer__address">
                <ul class="footer__address-list">
                    <?php
                    foreach (\common\models\Branch::find()->where(['type' => 1])->all() as $item) {
                        echo "
                    <li class='footer__address-item'>
                        <span class='footer__address-item-link slide-vertical'>
                            <span class='footer__address-item-title' style='opacity: 0.4'>{$item->region}</span><br>
                            {$item->address}
                        </span>
                    </li>
                        ";
                    }
                    ?>
                </ul>
            </div>

            <div class="footer__policy">
                <ul class="footer__policy-items">
                    <li class="footer__policy-item">
                        <a href="privacy-policy/index.htm" class="text-link text-default text-small" target="_blank">Политика
                            конфиденциальности</a>
                    </li>
                    <li class="footer__policy-item">
                        <a href="terms-of-use/index.htm" class="text-link text-default text-small" target="_blank">Пользовательское
                            соглашение</a>
                    </li>
                </ul>
            </div>
            <div class="footer__copyrights">
							<span class="footer__copyrights-text">
								© 2003-<?= date('Y') ?> <?= $branch->title ?>.<br/>
								Все права защищены
							</span>
            </div>
            <div class="footer__button-top">
                <button class="button-top">
                    <svg viewbox="0 0 24 24" width="24" height="24" xmlns="http://www.w3.org/2000/svg"
                         fill="currentColor">
                        <path transform="rotate(180, 12, 12)"
                              d="m18.7 9.7-6 6c-.2.2-.4.3-.7.3s-.5-.1-.7-.3l-6-6c-.4-.4-.4-1 0-1.4s1-.4 1.4 0l5.3 5.3 5.3-5.3c.4-.4 1-.4 1.4 0s.4 1 0 1.4z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</footer>
<style>
    .footer__address-list {
        display: flex;
        flex-direction: row;
    }

    @media (max-width: 989.98px) {
        .footer__address-list {
            display: flex;
            flex-direction: column;
        }
    }

    @media (min-width: 990px) {
        .footer__main-grid {
            -ms-grid-columns: 1fr 1fr 1fr 1fr;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            -ms-grid-rows: auto auto auto auto;
            grid-template-rows: auto auto auto auto;
            grid-template-areas:
        "logo logo logo logo"
        "actions nav nav nav"
        ". address address address"
        ". policy policy copyrights";
        }
    }
</style>

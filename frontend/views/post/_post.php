<?php

use \yii\web\View;
use common\models\Post;

/**
 * @var View $this
 * @var Post $model
 */

?>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        setTheme("black")
    })
</script>
<div class="card-news" data-animate="" data-year="<?= \Yii::$app->formatter->asDate($model->created_at, 'yyyy') ?>"
     data-month="<?= \Yii::$app->formatter->asDate($model->created_at, 'M') ?>" data-tags="<?= implode(", ", \yii\helpers\ArrayHelper::map($model->tags, 'title', 'title')) ?>">
    <a href="<?= \yii\helpers\Url::to(['/post/view', 'id' => $model->id]) ?>" class="card-news__link">
        <div class="card-news__inner">
            <span class="card-news__label text-label text-mute">
                <?= \Yii::$app->formatter->asDate($model->created_at, "dd.MM.yyyy") ?>
                <?php
                foreach ($model->tags as $tag) {
                    echo "<b style='margin-right: 10px;'>{$tag->title}</b>";
                }
                ?>
            </span>
            <div class="card-news__content">
                <div class="card-news__image">
                    <div class="card-news__image-wrapper">
                        <img class="image is-lazy is-cover" src="<?= $model->image ?>" data-src="<?= $model->image ?>"
                             alt="<?= $model->title ?>">
                    </div>
                </div>
                <div class="card-news__text">
                    <h4 class="card-news__title">
                        <?= $model->title ?>
                    </h4>
                    <p class="card-news__des">
                        <?= $model->summary ?>
                    </p>
                </div>
            </div>
        </div>
    </a>
</div>
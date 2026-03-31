<?php

use yii\web\View;
use common\models\Callback;
use yii\widgets\DetailView;

/**
 * @var $this View
 * @var $model Callback
 */

$this->registerCss(<<<CSS
td img {
    max-width: 700px;
}
CSS);

$this->title = \Yii::t('backend', 'Callback');
$this->params['breadcrumbs'][] = ['label' => \Yii::t('backend', 'Callbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive">
<?php
echo DetailView::widget([
    'options' => [
        'class' => 'table table-striped detail-view',
    ],
    'model' => $model,
    'attributes' => [
        'title',
        'client_name',
        'client_address',
        [
            'attribute' => 'activities',
            'format' => 'html',
            'value' => function ($model) {
                return implode(', ', \yii\helpers\ArrayHelper::map($model->activities, 'id', 'title'));
            }
        ],
        [
            'attribute' => 'problems',
            'format' => 'html',
        ], [
            'attribute' => 'tasks',
            'format' => 'html',
        ], [
            'attribute' => 'decision',
            'format' => 'html',
        ], [
            'attribute' => 'result_text',
            'format' => 'html',
        ], [
            'attribute' => 'elements',
            'format' => 'html',
            'value' => function ($model) {
                return implode(', ', \yii\helpers\ArrayHelper::map($model->elements, 'id', 'name'));
            }
        ]
    ]
]);
?>
</div>
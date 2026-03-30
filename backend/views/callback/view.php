<?php

use yii\web\View;
use common\models\Callback;
use yii\widgets\DetailView;

/**
 * @var $this View
 * @var $model Callback
 */

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
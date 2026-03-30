<?php

use yii\data\ActiveDataProvider;
use yii\web\View;
use yii\grid\GridView;
use yii\helpers\Html;

/**
 * @var $this View
 * @var $dataProvider ActiveDataProvider
 */

$this->title = \Yii::t('backend', 'Callbacks');
$this->params['breadcrumbs'][] = $this->title;

echo Html::tag('div', Html::a(\Yii::t('backend', 'Create Callback'), ['callback/create'], ['class' => 'btn btn-success']), ['class' => 'mb-3']);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'summary' => false,
    'tableOptions' => [
        'class' => 'table table-striped',
    ],
    'columns' => [
        [
            'attribute' => 'client_name',
            'headerOptions' => ['class' => 'col-2'],
        ],
        [
            'attribute' => 'type',
            'format' => 'html',
            'headerOptions' => ['class' => 'col-1'],
            'value' => function($model) {
                if ($model->type == 1) {
                    return \Yii::t('backend', 'Case');
                }
                return \Yii::t('backend', 'Callback');
            }
        ],
        [
            'attribute' => 'activity',
            'format' => 'html',
            'headerOptions' => ['class' => 'col-4'],
            'value' => function ($model) {
                return implode(', ', \yii\helpers\ArrayHelper::map($model->activities, 'id', 'title'));
            }
        ],
        [
            'attribute' => 'elements',
            'format' => 'html',
            'headerOptions' => ['class' => 'col-4'],
            'value' => function ($model) {
                return implode(', ', \yii\helpers\ArrayHelper::map($model->elements, 'id', 'name'));
            }
        ],
        [
            'class' => 'yii\grid\ActionColumn',
        ]
    ],
]);
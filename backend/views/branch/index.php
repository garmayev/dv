<?php

use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\SerialColumn;
use yii\web\View;
use yii\grid\GridView;

/**
 * @var View $this
 * @var ActiveDataProvider $dataProvider
 */

$this->title = \Yii::t('backend', 'Branches');

$this->params['breadcrumbs'][] = $this->title;
?>

    <div>
        <?= \yii\helpers\Html::a(\Yii::t('backend', 'Create Branch'), ['/branch/create'], ['class' => 'btn btn-success']) ?>
    </div>

<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'summary' => false,
    'tableOptions' => [
        'class' => 'table table-striped'
    ],
    'columns' => [
        [
            'class' => SerialColumn::class
        ],
        'title',
        'address',
        [
            'attribute' => 'phones',
            'value' => function ($model) {
                return implode(', ', \yii\helpers\ArrayHelper::map($model->phones, 'id', 'number'));
            }
        ],
        'email',
        [
            'class' => ActionColumn::class
        ]
    ]
]);
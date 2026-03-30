<?php

use yii\web\View;
use common\models\Callback;

/**
 * @var $this View
 * @var $model Callback
 */

$this->title = \Yii::t('backend', 'Update Callback');
$this->params['breadcrumbs'][] = ['label' => \Yii::t('backend', 'Callbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => \Yii::t('backend', 'Callback'), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
    'model' => $model,
]);
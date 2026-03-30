<?php

use yii\web\View;
use common\models\Callback;

/**
 * @var $this View
 * @var $model Callback
 */

$this->title = \Yii::t('backend', 'Create Callback');
$this->params['breadcrumbs'][] = ['label' => \Yii::t('backend', 'Callbacks'), 'url' => ['/callback/index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
    'model' => $model,
]);
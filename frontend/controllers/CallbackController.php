<?php

namespace frontend\controllers;

use common\models\Callback;
use frontend\models\CallbackSearch;
use yii\web\Controller;

class CallbackController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new CallbackSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->post());
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionView($id)
    {
        $model = Callback::findOne($id);

        return $this->render('view', ['model' => $model]);
    }
}
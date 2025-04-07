<?php

namespace frontend\controllers;

use yii\web\Controller;

class PartsController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionSpares()
    {
        return $this->render('spares');
    }

    public function actionQr()
    {
        if (\Yii::$app->request->isPost) {
//            \Yii::error("TEST");
            \Yii::$app->mailer
                ->compose('write-qr', [
                    'data' => \Yii::$app->request->post(),
                ])
                ->setFrom(\Yii::$app->params['adminEmail'])
                ->setTo([\Yii::$app->params['companyEmail'], \Yii::$app->params['marketEmail']])
                ->setSubject('Вопрос')
                ->send();
        }
        return $this->render('qr');
    }

    public function actionOil()
    {
        return $this->render('oil');
    }
}
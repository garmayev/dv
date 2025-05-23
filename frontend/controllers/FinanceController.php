<?php

namespace frontend\controllers;

use common\models\Event;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class FinanceController extends Controller
{

    public function beforeAction($action)
    {
        \Yii::$app->request->enableCsrfValidation = false;
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    public function actionSendLeasing()
    {
        $this->enableCsrfValidation = false;
        $data = \Yii::$app->request->post();

        $res = preg_match('/^[a-zA-Z0-9\s]*$/', $data["PROP_NAME"], $nameMatches);
        $new_array = array_filter($nameMatches);
        if ($res && count($new_array)) {
            return $this->redirect(\Yii::$app->request->referrer);
        }
        $res = preg_match('/^[\w\-\.]+@[\w-]+\.+[\w-]{2,4}$/', $data["PROP_EMAIL"], $emailMatches);
        $emailMatches = array_filter($emailMatches);
        if (!$res && !count($emailMatches)) {
            return $this->redirect(\Yii::$app->request->referrer);
        }
        $res = preg_match('/^79[\d]{9}$/', str_replace(['+', '-', ' ', '(', ')'], "", $data["PROP_PHONE"]), $phoneMatches);
        $phoneMatches = array_filter($phoneMatches);
        if (!$res && !count($phoneMatches)) {
            return $this->redirect(\Yii::$app->request->referrer);
        }
        $res = preg_match('/http/', $data["PROP_MESSAGE"], $messageMatches);
        $messageMatches = array_filter($messageMatches);
        if ($res && count($messageMatches)) {
            return $this->redirect(\Yii::$app->request->referrer);
        }

        \Yii::$app->mailer
            ->compose('leasing', [
                'data' => $data,
            ])
            ->setFrom(\Yii::$app->params['adminEmail'])
            ->setTo([\Yii::$app->params['companyEmail'], \Yii::$app->params['marketEmail']])
            ->setSubject($data['PROP_TYPE'])
            ->send();
        return $this->redirect(['/site/index']);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLeasing()
    {
        return $this->render('leasing');
    }

    public function actionInsurance()
    {
        return $this->render('insurance');
    }

    public function actionSpecials()
    {
        return $this->render('specials', [
            'dataProvider' => new ActiveDataProvider([
                'query' => Event::find()->where(['status' => Event::STATUS_ENABLED])->orderBy('id')
            ])
        ]);
    }

    public function actionRsm()
    {
        return $this->render('rsm');
    }

    public function actionViewEvent($id)
    {
        $model = Event::findOne($id);

        return $this->render('view_event', [
            'model' => $model
        ]);
    }
}

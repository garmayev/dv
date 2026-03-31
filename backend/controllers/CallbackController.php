<?php

namespace backend\controllers;

use common\models\Callback;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\UploadedFile;

class CallbackController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', [
            'dataProvider' => new ActiveDataProvider([
                'query' => Callback::find()->orderBy(['id' => SORT_DESC, 'created_at' => SORT_DESC, 'updated_at' => SORT_DESC]),
            ])
        ]);
    }

    public function actionCreate()
    {
        $model = new Callback();

        if (\Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                $model->main_file = UploadedFile::getInstance($model, 'main_file');
                $model->problem_file = UploadedFile::getInstance($model, 'problem_file');
                $model->task_file = UploadedFile::getInstance($model, 'task_file');
                $model->decision_file = UploadedFile::getInstance($model, 'decision_file');
                $model->result_file = UploadedFile::getInstance($model, 'result_file');
                if ($model->save()) {
                    \Yii::$app->session->setFlash('success', \Yii::t('backend', 'Callback created'));
                    return $this->redirect(['index']);
                }
            }
            \Yii::error($model->errors);
            \Yii::$app->session->setFlash('danger', \Yii::t('backend', 'There was an error updating the callback'));
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Callback::findOne($id);

        if (\Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->load($post)) {
                if ($model->save()) {
                    \Yii::$app->session->setFlash('success', \Yii::t('backend', 'Callback updated'));
                    return $this->redirect(['index']);
                }
            }
            \Yii::error($model->errors);
            \Yii::$app->session->setFlash('danger', \Yii::t('backend', 'There was an error updating the callback'));
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = Callback::findOne($id);
        $model->delete();
        return $this->redirect(['index']);
    }

    public function actionView($id)
    {
        $model = Callback::findOne($id);

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
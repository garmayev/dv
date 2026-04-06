<?php

use common\models\Activity;
use common\models\Element;
use kartik\select2\Select2;
use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\View;
use common\models\Callback;
use yii\widgets\ActiveForm;

/**
 * @var $this View
 * @var $model Callback
 */

$form = ActiveForm::begin([]);

echo Html::beginTag('div', ['class' => 'row']);

echo $form->field($model, 'title', [
        'options' => [
                'class' => 'col-6 mb-3',
        ]
])->textInput();

echo $form->field($model, 'activities', [
        'options' => [
                'class' => 'col-6 mb-3',
        ]
])->widget(Select2::class, [
        'data' => ArrayHelper::map(Activity::find()->all(), 'id', 'title'),
        'options' => [
                'multiple' => true,
        ],
        'pluginOptions' => [
                'tags' => true,
                'allowClear' => true,
                'tokenSeparators' => [','],
        ]
]);

echo $form->field($model, 'client_name', [
        'options' => [
                'class' => 'col-6 mb-3',
        ]
])->textInput();

echo $form->field($model, 'client_address', [
        'options' => [
                'class' => 'col-6 mb-3',
        ]
])->textInput();


echo $form->field($model, 'elements', [
        'options' => [
                'class' => 'col-12 mb-3',
        ]
])->widget(Select2::class, [
        'data' => ArrayHelper::map(Element::find()->all(), 'id', 'name'),
        'options' => [
                'multiple' => true,
        ]
]);

echo $form->field($model, 'type', [
        'options' => ['class' => 'col-12 mb-3']
])->widget(Select2::class, [
        'data' => [
                Callback::TYPE_CASE => \Yii::t('backend', 'Case'),
                Callback::TYPE_CALLBACK => \Yii::t('backend', 'Callback')
        ],
]);

echo $form->field($model, 'timestamp', [
        'options' => ['class' => 'col-12 mb-3']
])->textInput(['type' => 'date']);

echo $form->field($model, 'main_file', [
        'options' => [
                'class' => 'mb-3',
        ]
])->fileInput();
?>
    <div class="card mb-3 mx-0 px-0">
        <div class="card-header" data-bs-toggle="collapse" href="#collapseProblems" role="button" aria-expanded="false"
             aria-controls="collapseProblems">
            <?= \Yii::t('common', 'Problems') ?>
        </div>
        <div class="card-body collapse" id="collapseProblems">
            <?= $form->field($model, 'problems')->widget(vova07\imperavi\Widget::className(), [
                    'settings' => [
                            'lang' => 'ru',
                            'minHeight' => 250,
                            'maxHeight' => 300,
                            'imageUpload' => Url::to(['post/image-upload']),
                            'plugins' => [
                                    'clips',
                                    'fullscreen',
                                    'imagemanager',
                            ],
                    ]
            ])->label(\Yii::t('common', 'Text')); ?>

            <?= $form->field($model, 'problem_file')->fileInput(['class' => 'form-control mb-3'])->label(\Yii::t('common', 'Image')); ?>
        </div>
    </div>

    <div class="card mb-3 mx-0 px-0">
        <div class="card-header" data-bs-toggle="collapse" href="#collapseTasks" role="button" aria-expanded="false"
             aria-controls="collapseTasks">
            <?= \Yii::t('common', 'Tasks') ?>
        </div>
        <div class="card-body collapse" id="collapseTasks">
            <?= $form->field($model, 'tasks')->widget(vova07\imperavi\Widget::className(), [
                    'settings' => [
                            'lang' => 'ru',
                            'minHeight' => 250,
                            'maxHeight' => 300,
                            'imageUpload' => Url::to(['post/image-upload']),
                            'plugins' => [
                                    'clips',
                                    'fullscreen',
                                    'imagemanager',
                            ],
                    ]
            ])->label(\Yii::t('common', 'Text')); ?>

            <?= $form->field($model, 'task_file')->fileInput(['class' => 'form-control mb-3'])->label(\Yii::t('common', 'Image')); ?>
        </div>
    </div>

    <div class="card mb-3 mx-0 px-0">
        <div class="card-header" data-bs-toggle="collapse" href="#collapseDecision" role="button" aria-expanded="false"
             aria-controls="collapseDecision">
            <?= \Yii::t('common', 'Decision') ?>
        </div>
        <div class="card-body collapse" id="collapseDecision">
            <?= $form->field($model, 'decision')->widget(vova07\imperavi\Widget::className(), [
                    'settings' => [
                            'lang' => 'ru',
                            'minHeight' => 250,
                            'maxHeight' => 300,
                            'imageUpload' => Url::to(['post/image-upload']),
                            'plugins' => [
                                    'clips',
                                    'fullscreen',
                                    'imagemanager',
                            ],
                    ]
            ])->label(\Yii::t('common', 'Text')); ?>

            <?= $form->field($model, 'decision_file')->fileInput(['class' => 'form-control mb-3'])->label(\Yii::t('common', 'Image')); ?>
        </div>
    </div>

    <div class="card mb-3 mx-0 px-0">
        <div class="card-header" data-bs-toggle="collapse" href="#collapseResult" role="button" aria-expanded="false"
             aria-controls="collapseResult">
            <?= \Yii::t('common', 'Result') ?>
        </div>
        <div class="card-body collapse" id="collapseResult">
            <?= $form->field($model, 'result_text')->widget(vova07\imperavi\Widget::className(), [
                    'settings' => [
                            'lang' => 'ru',
                            'minHeight' => 250,
                            'maxHeight' => 300,
                            'imageUpload' => Url::to(['post/image-upload']),
                            'plugins' => [
                                    'clips',
                                    'fullscreen',
                                    'imagemanager',
                                    'image'
                            ],
                    ]
            ])->label(\Yii::t('common', 'Text')); ?>

            <?= $form->field($model, 'result_file')->fileInput(['class' => 'form-control mb-3'])->label(\Yii::t('common', 'Image')); ?>
        </div>
    </div>

<?php

echo Html::endTag('div');

echo Html::submitButton(\Yii::t('common', 'Save'), ['class' => 'btn btn-primary']);

ActiveForm::end();
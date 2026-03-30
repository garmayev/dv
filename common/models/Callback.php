<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "callback".
 *
 * @property int $id
 * @property string $title
 * @property string|null $activity
 * @property string|null $client_name
 * @property string|null $client_address
 * @property string|null $main_image
 * @property string|null $problems
 * @property string|null $problem_img
 * @property string|null $tasks
 * @property string|null $task_img
 * @property string|null $decision
 * @property string|null $decision_img
 * @property string|null $result_img
 * @property string|null $result_text
 * @property string|null $result_addon
 * @property int $type
 *
 * @property Activity[] $activities
 * @property Element[] $elements
 * @property CallbackFactor[] $callbackFactors
 * @property Factor[] $factors
 */
class Callback extends \yii\db\ActiveRecord
{
    public $problem_file;
    public $task_file;
    public $decision_file;
    public $result_file;
    public $main_file;
    private $_activities;
    private $_elements;

    const TYPE_CALLBACK = 0;
    const TYPE_CASE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'callback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['activity', 'client_name', 'client_address', 'problems', 'problem_img', 'tasks', 'task_img', 'decision', 'decision_img', 'result_img', 'result_text', 'result_addon', 'main_image'], 'default', 'value' => null],
            [['title'], 'required'],
            [['title', 'activity', 'client_name', 'client_address', 'problems', 'problem_img', 'tasks', 'task_img', 'decision', 'decision_img', 'result_img', 'result_text', 'result_addon', 'main_image'], 'string'],
            [['problem_file', 'task_file', 'decision_file', 'result_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, jpeg, png, gif, webp'],
            [['type'], 'integer'],
            [['type'], 'in', 'range' => [self::TYPE_CALLBACK,self::TYPE_CASE]],
            [['activities', 'elements'], 'safe'],
        ];
    }

    public function beforeSave($insert)
    {
        $this->upload('main_image', UploadedFile::getInstance($this, 'main_file'));
        $this->upload('problem_img', UploadedFile::getInstance($this, 'problem_file'));
        $this->upload('task_img', UploadedFile::getInstance($this, 'task_file'));
        $this->upload('decision_img', UploadedFile::getInstance($this, 'decision_file'));
        $this->upload('result_img', UploadedFile::getInstance($this, 'result_file'));
        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'title' => Yii::t('common', 'Title'),
            'activity' => Yii::t('common', 'Activity'),
            'client_name' => Yii::t('common', 'Client Name'),
            'client_address' => Yii::t('common', 'Client Address'),
            'problems' => Yii::t('common', 'Problems'),
            'problem_img' => Yii::t('common', 'Problem Img'),
            'tasks' => Yii::t('common', 'Tasks'),
            'task_img' => Yii::t('common', 'Task Img'),
            'decision' => Yii::t('common', 'Decision'),
            'decision_img' => Yii::t('common', 'Decision Img'),
            'result_img' => Yii::t('common', 'Result Img'),
            'result_text' => Yii::t('common', 'Result Text'),
            'result_addon' => Yii::t('common', 'Result Addon'),
            'main_image' => Yii::t('common', 'Main Image'),
            'elements' => Yii::t('common', 'Elements'),
            'type' => Yii::t('common', 'Type'),
            'activities' => Yii::t('common', 'Activities'),
            'main_file' => Yii::t('common', 'Main Image'),
        ];
    }

    public function getCallbackActivities()
    {
        return $this->hasMany(CallbackActivity::className(), ['callback_id' => 'id']);
    }

    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['id' => 'activity_id'])->via('callbackActivities');
    }

    public function setActivities($value)
    {
        $this->unlinkAll('activities', true);
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            if ($this->save(false)) {
                \Yii::error('saved');
                foreach ($value as $item) {
                    if (intval($item)) {
                        $activity = Activity::findOne($item);
                        $this->link('activities', $activity);
                    } else {
                        $activity = new Activity([
                            'title' => $item,
                        ]);
                        if ($activity->save()) {
                            $this->link('activities', $activity);
                        } else {
                            \Yii::error($activity->errors);
                        }
                    }
                }
                $transaction->commit();
            } else {
                \Yii::error($this->getErrors());
            }
        } catch (\Exception $e) {
            \Yii::error($e);
            $transaction->rollBack();
        }
    }

    public function getCallbackElements()
    {
        return $this->hasMany(CallbackElement::className(), ['callback_id' => 'id']);
    }

    public function getElements()
    {
        return $this->hasMany(Element::className(), ['id' => 'element_id'])->via('callbackElements');
    }

    public function setElements($value)
    {
        $this->unlinkAll('elements', true);
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            foreach ($value as $item) {
                $callbackElement = new CallbackElement([
                    'callback_id' => $this->id,
                    'element_id' => $item,
                ]);
                $callbackElement->save();
            }
            $transaction->commit();
        } catch (\Exception $e) {
            \Yii::error($e);
            $transaction->rollBack();
        }
    }

    /**
     * Gets query for [[CallbackFactors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCallbackFactors()
    {
        return $this->hasMany(CallbackFactor::class, ['callback_id' => 'id']);
    }

    /**
     * Gets query for [[Factors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFactors()
    {
        return $this->hasMany(Factor::class, ['id' => 'factor_id'])->viaTable('callback_factor', ['callback_id' => 'id']);
    }

    private function upload($attribute, ?UploadedFile $field)
    {
        // Удаляем старый файл, если он есть
        if (!empty($field)) {
            $oldFilePath = \Yii::getAlias('@frontend/web') . $this->$attribute;
            $oldFilePath = str_replace('/', DIRECTORY_SEPARATOR, $oldFilePath);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        // Сохраняем новый файл, если он загружен
        if ($field) {
            $filename = '/images/' . md5($field->baseName . time()) . '.' . $field->extension;
            $fullPath = \Yii::getAlias('@frontend/web') . $filename;
            $fullPath = str_replace('/', DIRECTORY_SEPARATOR, $fullPath);

            // Создаем директорию
            $directory = dirname($fullPath);
            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            if ($field->saveAs($fullPath)) {
                $this->$attribute = $filename;
                return true;
            } else {
                \Yii::error("Failed to save file: {$fullPath}");
                return false;
            }
        }

        return true;
    }
}

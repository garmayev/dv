<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property string|null $title
 *
 * @property CallbackActivity[] $callbackActivities
 * @property Callback[] $callbacks
 */
class Activity extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'default', 'value' => null],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'title' => Yii::t('common', 'Title'),
        ];
    }

    /**
     * Gets query for [[CallbackActivities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCallbackActivities()
    {
        return $this->hasMany(CallbackActivity::class, ['activity_id' => 'id']);
    }

    /**
     * Gets query for [[Callbacks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCallbacks()
    {
        return $this->hasMany(Callback::class, ['id' => 'callback_id'])->viaTable('callback_activity', ['activity_id' => 'id']);
    }

}

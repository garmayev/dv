<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "callback_activity".
 *
 * @property int $callback_id
 * @property int $activity_id
 *
 * @property Activity $activity
 * @property Callback $callback
 */
class CallbackActivity extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'callback_activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['callback_id', 'activity_id'], 'required'],
            [['callback_id', 'activity_id'], 'integer'],
            [['callback_id', 'activity_id'], 'unique', 'targetAttribute' => ['callback_id', 'activity_id']],
            [['activity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Activity::class, 'targetAttribute' => ['activity_id' => 'id']],
            [['callback_id'], 'exist', 'skipOnError' => true, 'targetClass' => Callback::class, 'targetAttribute' => ['callback_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'callback_id' => Yii::t('common', 'Callback ID'),
            'activity_id' => Yii::t('common', 'Activity ID'),
        ];
    }

    /**
     * Gets query for [[Activity]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasOne(Activity::class, ['id' => 'activity_id']);
    }

    /**
     * Gets query for [[Callback]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCallback()
    {
        return $this->hasOne(Callback::class, ['id' => 'callback_id']);
    }

}

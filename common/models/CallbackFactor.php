<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "callback_factor".
 *
 * @property int $callback_id
 * @property int $factor_id
 * @property int|null $position
 *
 * @property Callback $callback
 * @property Factor $factor
 */
class CallbackFactor extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'callback_factor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position'], 'default', 'value' => null],
            [['callback_id', 'factor_id'], 'required'],
            [['callback_id', 'factor_id', 'position'], 'integer'],
            [['callback_id', 'factor_id'], 'unique', 'targetAttribute' => ['callback_id', 'factor_id']],
            [['callback_id'], 'exist', 'skipOnError' => true, 'targetClass' => Callback::class, 'targetAttribute' => ['callback_id' => 'id']],
            [['factor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Factor::class, 'targetAttribute' => ['factor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'callback_id' => Yii::t('common', 'Callback ID'),
            'factor_id' => Yii::t('common', 'Factor ID'),
            'position' => Yii::t('common', 'Position'),
        ];
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

    /**
     * Gets query for [[Factor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFactor()
    {
        return $this->hasOne(Factor::class, ['id' => 'factor_id']);
    }

}

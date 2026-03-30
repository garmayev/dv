<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "callback_element".
 *
 * @property int $callback_id
 * @property int $element_id
 *
 * @property Callback $callback
 * @property Element $element
 */
class CallbackElement extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'callback_element';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['callback_id', 'element_id'], 'required'],
            [['callback_id', 'element_id'], 'integer'],
            [['callback_id', 'element_id'], 'unique', 'targetAttribute' => ['callback_id', 'element_id']],
            [['callback_id'], 'exist', 'skipOnError' => true, 'targetClass' => Callback::class, 'targetAttribute' => ['callback_id' => 'id']],
            [['element_id'], 'exist', 'skipOnError' => true, 'targetClass' => Element::class, 'targetAttribute' => ['element_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'callback_id' => Yii::t('common', 'Callback ID'),
            'element_id' => Yii::t('common', 'Element ID'),
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
     * Gets query for [[Element]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getElement()
    {
        return $this->hasOne(Element::class, ['id' => 'element_id']);
    }

}

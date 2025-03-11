<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * @property string $number
 * @property int $branch_id
 *
 * @property Branch $branch
 */
class Phone extends ActiveRecord
{
    public static function tableName()
    {
        return "{{%phone}}";
    }

    public function rules()
    {
        return [
            ['number', 'required'],
            ['number', 'string', 'min' => 6],
            ['branch_id', 'exist', 'targetClass' => Branch::className(), 'targetAttribute' => 'id'],
        ];
    }

    public function getBranch()
    {
        return $this->hasOne(Branch::className(), ['id' => 'branch_id']);
    }
}
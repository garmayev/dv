<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * @property string $title
 * @property Post[] $posts
 */
class Tag extends ActiveRecord
{
    public static function tableName()
    {
        return "{{%tag}}";
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['tag_id' => 'id'])->viaTable('{{%post_tag}}', ['tag_id' => 'id']);
    }
}
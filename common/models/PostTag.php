<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * @property int $post_id
 * @property int $tag_id
 *
 * @property Post $post
 * @property Tag $tag
 */
class PostTag extends ActiveRecord
{
    public static function tableName()
    {
        return "{{%post_tag}}";
    }

    public function rules()
    {
        return [
            [['post_id', 'tag_id'], 'required'],
            [['post_id', 'tag_id'], 'integer'],
            [['post_id', 'tag_id'], 'unique', 'targetAttribute' => ['post_id', 'tag_id']],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::className(), 'targetAttribute' => ['tag_id' => 'id']],
        ];
    }

    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }

    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['id' => 'tag_id']);
    }
}
<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%phone}}`.
 */
class m250308_034018_create_phone_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%phone}}', [
            'id' => $this->primaryKey(),
            'number' => $this->string(),
            'branch_id' => $this->integer()
        ]);

        $this->createIndex(
            '{{%idx-phone-branch_id}}',
            '{{%phone}}',
            'branch_id'
        );

        $this->addForeignKey(
            '{{%fk-phone-branch_id}}',
            '{{%phone}}',
            'branch_id',
            '{{%branch}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('{{%fk-phone-branch_id}}', '{{%phone}}');
        $this->dropIndex('{{%idx-phone-branch_id}}', '{{%phone}}');
        $this->dropTable('{{%phone}}');
    }
}

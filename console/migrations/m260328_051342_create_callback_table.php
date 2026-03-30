<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%callback}}`.
 */
class m260328_051342_create_callback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%callback}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'activity' => $this->string()->null(),
            'client_name' => $this->string()->null(),
            'client_address' => $this->string()->null(),
            'problems' => $this->text()->null(),
            'problem_img' => $this->string()->null(),
            'tasks' => $this->text()->null(),
            'task_img' => $this->string()->null(),
            'decision' => $this->text()->null(),
            'decision_img' => $this->string()->null(),
            'result_img' => $this->string()->null(),
            'result_text' => $this->text()->null(),
            'result_addon' => $this->text()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%callback}}');
    }
}

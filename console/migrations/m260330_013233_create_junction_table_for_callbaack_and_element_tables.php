<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%callbaack_element}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%callbaack}}`
 * - `{{%element}}`
 */
class m260330_013233_create_junction_table_for_callbaack_and_element_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%callback_element}}', [
            'callback_id' => $this->integer(),
            'element_id' => $this->integer(),
            'PRIMARY KEY(callback_id, element_id)',
        ]);

        // creates index for column `callbaack_id`
        $this->createIndex(
            '{{%idx-callback_element-callback_id}}',
            '{{%callback_element}}',
            'callback_id'
        );

        // add foreign key for table `{{%callbaack}}`
        $this->addForeignKey(
            '{{%fk-callback_element-callback_id}}',
            '{{%callback_element}}',
            'callback_id',
            '{{%callback}}',
            'id',
            'CASCADE'
        );

        // creates index for column `element_id`
        $this->createIndex(
            '{{%idx-callback_element-element_id}}',
            '{{%callback_element}}',
            'element_id'
        );

        // add foreign key for table `{{%element}}`
        $this->addForeignKey(
            '{{%fk-callback_element-element_id}}',
            '{{%callback_element}}',
            'element_id',
            '{{%element}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%callbaack}}`
        $this->dropForeignKey(
            '{{%fk-callback_element-callback_id}}',
            '{{%callback_element}}'
        );

        // drops index for column `callbaack_id`
        $this->dropIndex(
            '{{%idx-callback_element-callback_id}}',
            '{{%callback_element}}'
        );

        // drops foreign key for table `{{%element}}`
        $this->dropForeignKey(
            '{{%fk-callback_element-element_id}}',
            '{{%callback_element}}'
        );

        // drops index for column `element_id`
        $this->dropIndex(
            '{{%idx-callback_element-element_id}}',
            '{{%callback_element}}'
        );

        $this->dropTable('{{%callback_element}}');
    }
}

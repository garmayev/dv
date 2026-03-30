<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%callback_factor}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%callback}}`
 * - `{{%factor}}`
 */
class m260328_052958_create_junction_table_for_callback_and_factor_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%callback_factor}}', [
            'callback_id' => $this->integer(),
            'factor_id' => $this->integer(),
            'position' => $this->integer(),
            'PRIMARY KEY(callback_id, factor_id)',
        ]);

        // creates index for column `callback_id`
        $this->createIndex(
            '{{%idx-callback_factor-callback_id}}',
            '{{%callback_factor}}',
            'callback_id'
        );

        // add foreign key for table `{{%callback}}`
        $this->addForeignKey(
            '{{%fk-callback_factor-callback_id}}',
            '{{%callback_factor}}',
            'callback_id',
            '{{%callback}}',
            'id',
            'CASCADE'
        );

        // creates index for column `factor_id`
        $this->createIndex(
            '{{%idx-callback_factor-factor_id}}',
            '{{%callback_factor}}',
            'factor_id'
        );

        // add foreign key for table `{{%factor}}`
        $this->addForeignKey(
            '{{%fk-callback_factor-factor_id}}',
            '{{%callback_factor}}',
            'factor_id',
            '{{%factor}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%callback}}`
        $this->dropForeignKey(
            '{{%fk-callback_factor-callback_id}}',
            '{{%callback_factor}}'
        );

        // drops index for column `callback_id`
        $this->dropIndex(
            '{{%idx-callback_factor-callback_id}}',
            '{{%callback_factor}}'
        );

        // drops foreign key for table `{{%factor}}`
        $this->dropForeignKey(
            '{{%fk-callback_factor-factor_id}}',
            '{{%callback_factor}}'
        );

        // drops index for column `factor_id`
        $this->dropIndex(
            '{{%idx-callback_factor-factor_id}}',
            '{{%callback_factor}}'
        );

        $this->dropTable('{{%callback_factor}}');
    }
}

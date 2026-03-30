<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%callback_activity}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%callback}}`
 * - `{{%activity}}`
 */
class m260330_015032_create_junction_table_for_callback_and_activity_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%callback_activity}}', [
            'callback_id' => $this->integer(),
            'activity_id' => $this->integer(),
            'PRIMARY KEY(callback_id, activity_id)',
        ]);

        // creates index for column `callback_id`
        $this->createIndex(
            '{{%idx-callback_activity-callback_id}}',
            '{{%callback_activity}}',
            'callback_id'
        );

        // add foreign key for table `{{%callback}}`
        $this->addForeignKey(
            '{{%fk-callback_activity-callback_id}}',
            '{{%callback_activity}}',
            'callback_id',
            '{{%callback}}',
            'id',
            'CASCADE'
        );

        // creates index for column `activity_id`
        $this->createIndex(
            '{{%idx-callback_activity-activity_id}}',
            '{{%callback_activity}}',
            'activity_id'
        );

        // add foreign key for table `{{%activity}}`
        $this->addForeignKey(
            '{{%fk-callback_activity-activity_id}}',
            '{{%callback_activity}}',
            'activity_id',
            '{{%activity}}',
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
            '{{%fk-callback_activity-callback_id}}',
            '{{%callback_activity}}'
        );

        // drops index for column `callback_id`
        $this->dropIndex(
            '{{%idx-callback_activity-callback_id}}',
            '{{%callback_activity}}'
        );

        // drops foreign key for table `{{%activity}}`
        $this->dropForeignKey(
            '{{%fk-callback_activity-activity_id}}',
            '{{%callback_activity}}'
        );

        // drops index for column `activity_id`
        $this->dropIndex(
            '{{%idx-callback_activity-activity_id}}',
            '{{%callback_activity}}'
        );

        $this->dropTable('{{%callback_activity}}');
    }
}

<?php

use yii\db\Migration;

class m260330_031451_add_column_type_to_callback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%callback}}', 'type', $this->integer()->notNull()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%callback}}', 'type');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260330_031451_add_column_type_to_callback_table cannot be reverted.\n";

        return false;
    }
    */
}

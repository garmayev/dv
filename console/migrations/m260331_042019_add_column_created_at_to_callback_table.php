<?php

use yii\db\Migration;

class m260331_042019_add_column_created_at_to_callback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("callback", "created_at", $this->integer());
        $this->addColumn("callback", "updated_at", $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("callback", "created_at");
        $this->dropColumn("callback", "updated_at");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260331_042019_add_column_created_at_to_callback_table cannot be reverted.\n";

        return false;
    }
    */
}

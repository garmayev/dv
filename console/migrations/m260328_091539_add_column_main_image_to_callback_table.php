<?php

use yii\db\Migration;

class m260328_091539_add_column_main_image_to_callback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
//        $this->addColumn('callback', 'main_image', $this->string()->null());
        $this->addColumn('callback', 'type', $this->string()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('callback', 'main_image');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260328_091539_add_column_main_image_to_callback_table cannot be reverted.\n";

        return false;
    }
    */
}

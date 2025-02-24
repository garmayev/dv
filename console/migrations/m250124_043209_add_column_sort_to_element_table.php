<?php

use yii\db\Migration;

/**
 * Class m250124_043209_add_column_sort_to_element_table
 */
class m250124_043209_add_column_sort_to_element_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('element', 'sort', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('element', 'sort');
    }
}

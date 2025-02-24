<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%config}}`.
 */
class m241216_064515_create_config_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%config}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'value' => $this->text(),
            'description' => $this->string(),
            'type' => $this->string()
        ]);

        $this->insert('{{%config}}', ['title' => 'year', 'value' => '2004', 'description' => 'Год основания', 'type' => 'int']);
        $this->insert('{{%config}}', ['title' => 'title', 'value' => 'АО Октябрьское', 'description' => 'Название', 'type' => 'text']);
        $this->insert('{{%config}}', ['title' => 'logo_red', 'value' => '/images/logo.png', 'description' => 'Логотип #1', 'type' => 'text']);
        $this->insert('{{%config}}', ['title' => 'logo_white', 'value' => '/images/logo.png', 'description' => 'Логотип #2', 'type' => 'text']);
        $this->insert('{{%config}}', ['title' => 'main_page_text', 'value' => '<p>С 2004 года АО «Октябрьское» является официальным дилером Ростсельмаш в Тамбовской и Липецкой областях по поставкам и послепродажному обслуживанию крупногабаритной сельскохозяйственной техники, прицепному и самоходному оборудованию для всех видов полевых работ.</p>
<p>&nbsp;</p>
<p>Сейчас это комплексное обслуживание аграриев, так называемый принцип одного окна - «ВСЕ ДЛЯ РАБОТЫ В ПОЛЕ»!</p>', 'description' => 'Описание для главной страницы', 'type' => 'longtext']);
        $this->insert('{{%config}}', ['title' => 'main_page_image', 'value' => '/images/336.jpg', 'description' => 'Фотография для главной страницы', 'type' => 'text']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%config}}');
    }
}

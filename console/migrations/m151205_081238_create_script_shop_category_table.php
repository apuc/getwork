<?php

use yii\db\Schema;
use yii\db\Migration;

class m151205_081238_create_script_shop_category_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('script_shop_category', [
            'id'                 => Schema::TYPE_PK,
            'script_shop_id'     => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'category_script_id' => Schema::TYPE_INTEGER. '(10) NOT NULL',

        ], $tableOptions);

        $this->addForeignKey('script_shop_category_script_shop_id_fk', 'script_shop_category', 'script_shop_id', 'script_shop', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('script_shop_category_category_script_id_fk', 'script_shop_category', 'category_script_id', 'category_script', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('script_shop_category_script_shop_id_fk', 'script_shop_category');
        $this->dropForeignKey('script_shop_category_category_script_id_fk', 'script_shop_category');

        $this->dropTable('script_shop_category');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}

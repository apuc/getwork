<?php

use yii\db\Schema;
use yii\db\Migration;

class m151205_080253_create_script_shop_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('script_shop', [
            'id'                => Schema::TYPE_PK,
            'user_id'           => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'title'             => Schema::TYPE_STRING. '(255) NOT NULL',
            'description'       => Schema::TYPE_TEXT. ' NOT NULL',
            'price'             => Schema::TYPE_STRING. '(255) NOT NULL',
            'views'             => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'dt_add'            => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'demo_link'         => Schema::TYPE_STRING. '(255) NOT NULL',

        ], $tableOptions);

        $this->addForeignKey('script_shop_user_id_fk', 'script_shop', 'user_id', 'user', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('script_shop_user_id_fk', 'script_shop');

        $this->dropTable('script_shop');
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

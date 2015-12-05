<?php

use yii\db\Schema;
use yii\db\Migration;

class m151205_084925_create_img_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('img', [
            'id'              => Schema::TYPE_PK,
            'link'            => Schema::TYPE_STRING. '(255) NOT NULL',
            'dt_add'          => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'description'     => Schema::TYPE_TEXT. ' NOT NULL',

        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('img');
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

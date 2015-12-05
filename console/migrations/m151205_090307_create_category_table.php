<?php

use yii\db\Schema;
use yii\db\Migration;

class m151205_090307_create_category_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('category', [
            'id'               => Schema::TYPE_PK,
            'parent_id '       => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'name'             => Schema::TYPE_STRING. '(255) NOT NULL',
            'description'      => Schema::TYPE_TEXT. ' NOT NULL',
            'dt_add'           => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'label'            => Schema::TYPE_STRING. '(255) NOT NULL',
            'icon'             => Schema::TYPE_STRING. '(255) NOT NULL',


        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('category');
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

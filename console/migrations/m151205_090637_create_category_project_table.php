<?php

use yii\db\Schema;
use yii\db\Migration;

class m151205_090637_create_category_project_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('category_project', [
            'id'               => Schema::TYPE_PK,
            'project_id'       => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'category'           => Schema::TYPE_INTEGER. '(10) NOT NULL',


        ], $tableOptions);

        $this->addForeignKey('category_project_project_id_fk', 'category_project', 'project_id', 'projects', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('category_project_category_id_fk', 'category_project', 'category', 'category', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('category_project_project_id_fk', 'category_project');
        $this->dropForeignKey('category_project_category_id_fk', 'category_project');

        $this->dropTable('category_project');
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

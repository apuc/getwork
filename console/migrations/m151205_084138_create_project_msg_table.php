<?php

use yii\db\Schema;
use yii\db\Migration;

class m151205_084138_create_project_msg_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('project_msg', [
            'id'               => Schema::TYPE_PK,
            'project_id'       => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'subject'          => Schema::TYPE_STRING. '(255) NOT NULL',
            'dt_add'           => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'to'               => Schema::TYPE_INTEGER. '(255) NOT NULL',
            'from'             => Schema::TYPE_INTEGER. '(255) NOT NULL',
            'read'             => Schema::TYPE_INTEGER. '(255) NOT NULL',
            'text'             => Schema::TYPE_TEXT. ' NOT NULL',

        ], $tableOptions);

        $this->addForeignKey('project_msg_project_id_fk', 'project_msg', 'project_id', 'projects', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('project_msg_to_user_id_fk', 'project_msg', 'to', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('project_msg_from_user_id_fk', 'project_msg', 'from', 'user', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('project_msg_project_id_fk', 'project_msg');
        $this->dropForeignKey('project_msg_to_user_id_fk', 'project_msg');
        $this->dropForeignKey('project_msg_from_user_id_fk', 'project_msg');

        $this->dropTable('project_msg');
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

<?php

use yii\db\Schema;
use yii\db\Migration;

class m151130_092510_create_projects_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('projects', [
            'id'                => Schema::TYPE_PK,
            'user_id'           => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'project_type_id'   => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'title'             => Schema::TYPE_STRING. '(255) NOT NULL',
            'description'       => Schema::TYPE_TEXT. ' NOT NULL',
            'dt_add'            => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'dt_update'         => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'dt_activate'       => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'active'            => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'activate_token'    => Schema::TYPE_STRING. ' NOT NULL',
            'close'             => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'views'             => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'executor'          => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'budget'            => Schema::TYPE_INTEGER. '(10) NOT NULL'
        ], $tableOptions);

        $this->addForeignKey('projects_type_project_id_fk', 'projects', 'project_type_id', 'project_type', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('projects_user_id_fk', 'projects', 'user_id', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('projects_executor_user_id_fk', 'projects', 'executor', 'user', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('projects_type_project_id_fk', 'projects');
        $this->dropForeignKey('projects_user_id_fk', 'projects');
        $this->dropForeignKey('projects_executor_user_id_fk', 'projects');

        $this->dropTable('projects');
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

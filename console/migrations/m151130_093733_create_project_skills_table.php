<?php

use yii\db\Schema;
use yii\db\Migration;

class m151130_093733_create_project_skills_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('project_skills', [
            'id'                => Schema::TYPE_PK,
            'skills_id'         => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'project_id'        => Schema::TYPE_INTEGER. '(10) NOT NULL',

        ], $tableOptions);

        $this->addForeignKey('project_skills_skills_id_fk', 'project_skills', 'skills_id', 'skills', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('project_skills_projects_id_fk', 'project_skills', 'project_id', 'projects', 'id', 'RESTRICT', 'CASCADE');

    }

    public function down()
    {
        $this->dropForeignKey('project_skills_skills_id_fk', 'project_skills');
        $this->dropForeignKey('project_skills_projects_id_fk', 'project_skills');

        $this->dropTable('project_skills');
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

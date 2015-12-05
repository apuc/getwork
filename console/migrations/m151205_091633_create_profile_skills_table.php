<?php

use yii\db\Schema;
use yii\db\Migration;

class m151205_091633_create_profile_skills_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('profile_skills', [
            'id'               => Schema::TYPE_PK,
            'profile_id'       => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'skills_id'          => Schema::TYPE_INTEGER. '(10) NOT NULL',


        ], $tableOptions);

        $this->addForeignKey('profile_skills_profile_id_fk', 'profile_skills', 'profile_id', 'profile', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('profile_skills_skills_id_fk', 'profile_skills', 'skills_id', 'skills', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('profile_skills_profile_id_fk', 'profile_skills');
        $this->dropForeignKey('profile_skills_skills_id_fk', 'profile_skills');

        $this->dropTable('profile_skills');
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

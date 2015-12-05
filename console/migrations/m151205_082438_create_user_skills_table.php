<?php

use yii\db\Schema;
use yii\db\Migration;

class m151205_082438_create_user_skills_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('user_skills', [
            'id'                 => Schema::TYPE_PK,
            'user_id'            => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'skills_id'          => Schema::TYPE_INTEGER. '(10) NOT NULL',

        ], $tableOptions);

        $this->addForeignKey('user_skills_user_id_fk', 'user_skills', 'user_id', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('user_skills_skills_id_fk', 'user_skills', 'skills_id', 'skills', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('user_skills_user_id_fk', 'user_skills');
        $this->dropForeignKey('user_skills_skills_id_fk', 'user_skills');

        $this->dropTable('user_skills');
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

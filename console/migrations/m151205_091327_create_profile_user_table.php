<?php

use yii\db\Schema;
use yii\db\Migration;

class m151205_091327_create_profile_user_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('profile_user', [
            'id'               => Schema::TYPE_PK,
            'profile_id'       => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'user_id'          => Schema::TYPE_INTEGER. '(10) NOT NULL',


        ], $tableOptions);

        $this->addForeignKey('profile_user_profile_id_fk', 'profile_user', 'profile_id', 'profile', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('profile_user_user_id_fk', 'profile_user', 'user_id', 'user', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('profile_user_profile_id_fk', 'profile_user');
        $this->dropForeignKey('profile_user_user_id_fk', 'profile_user');

        $this->dropTable('profile_user');
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

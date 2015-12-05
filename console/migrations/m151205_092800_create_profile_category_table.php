<?php

use yii\db\Schema;
use yii\db\Migration;

class m151205_092800_create_profile_category_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('profile_category', [
            'id'               => Schema::TYPE_PK,
            'category_id'       => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'profile_id'          => Schema::TYPE_INTEGER. '(10) NOT NULL',


        ], $tableOptions);

        $this->addForeignKey('profile_category_profile_id_fk', 'profile_category', 'profile_id', 'profile', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('profile_category_category_id_fk', 'profile_category', 'category_id', 'category', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('profile_category_profile_id_fk', 'profile_category');
        $this->dropForeignKey('profile_category_category_id_fk', 'profile_category');

        $this->dropTable('profile_category');
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

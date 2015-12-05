<?php

use yii\db\Schema;
use yii\db\Migration;

class m151205_083509_create_rating_user_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('rating_user', [
            'id'                 => Schema::TYPE_PK,
            'user_id'            => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'rating_id'          => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'value'              => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'profile_link'       => Schema::TYPE_STRING. '(255) NOT NULL',

        ], $tableOptions);

        $this->addForeignKey('rating_user_user_id_fk', 'create_rating', 'user_id', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('rating_user_rating_id_fk', 'create_rating', 'rating_id', 'rating', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('rating_user_user_id_fk', 'rating_user');
        $this->dropForeignKey('rating_user_rating_id_fk', 'rating_user');

        $this->dropTable('rating_user');
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

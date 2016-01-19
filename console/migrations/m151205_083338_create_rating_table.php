<?php

use yii\db\Schema;
use yii\db\Migration;

class m151205_083338_create_rating_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('rating', [
            'id'                 => Schema::TYPE_PK,
            'name'               => Schema::TYPE_STRING. '(255) NOT NULL',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('rating');
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

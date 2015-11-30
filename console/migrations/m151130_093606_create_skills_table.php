<?php

use yii\db\Schema;
use yii\db\Migration;

class m151130_093606_create_skills_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('skills', [
            'id'                => Schema::TYPE_PK,
            'name'             => Schema::TYPE_STRING. '(255) NOT NULL',

        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('skills');
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

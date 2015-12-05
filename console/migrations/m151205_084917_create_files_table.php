<?php

use yii\db\Schema;
use yii\db\Migration;

class m151205_084917_create_files_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('files', [
            'id'              => Schema::TYPE_PK,
            'link'            => Schema::TYPE_STRING. '(255) NOT NULL',
            'dt_add'          => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'type'            => Schema::TYPE_STRING. '(255) NOT NULL',

        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('files');
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

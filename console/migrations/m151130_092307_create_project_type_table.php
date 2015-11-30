<?php

use yii\db\Schema;
use yii\db\Migration;

class m151130_092307_create_project_type_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('project_type', [
            'id'                => Schema::TYPE_PK,
            'type'           => Schema::TYPE_STRING. ' NOT NULL',
            'label'           => Schema::TYPE_STRING. ' NOT NULL'

        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('project_type');
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

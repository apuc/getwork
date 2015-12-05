<?php

use yii\db\Schema;
use yii\db\Migration;

class m151205_081844_create_script_shop_skills_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('script_shop_skills', [
            'id'                 => Schema::TYPE_PK,
            'script_shop_id'     => Schema::TYPE_INTEGER. '(10) NOT NULL',
            'skills_id'          => Schema::TYPE_INTEGER. '(10) NOT NULL',

        ], $tableOptions);

        $this->addForeignKey('script_shop_skills_script_shop_id_fk', 'script_shop_skills', 'script_shop_id', 'script_shop', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('script_shop_skills_skills_id_fk', 'script_shop_skills', 'skills_id', 'skills', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('script_shop_skills_script_shop_id_fk', 'script_shop_skills');
        $this->dropForeignKey('script_shop_skills_skills_id_fk', 'script_shop_skills');

        $this->dropTable('script_shop_skills');
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

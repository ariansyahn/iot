<?php

use yii\db\Schema;

class m180807_180101_create_lamp_table extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('lamp', [
            'id_lamp' => $this->primaryKey(),
            'status' => $this->string(10)->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('lamp');
    }
}

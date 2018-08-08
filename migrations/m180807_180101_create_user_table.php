<?php

use yii\db\Schema;

class m180807_180101_create_user_table extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('user', [
            'id_user' => $this->primaryKey(),
            'fullname' => $this->string(255)->notNull(),
            'username' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
            'password' => $this->string(255)->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'status' => $this->string(255)->notNull(),
            'gender' => $this->string(255)->notNull(),
            'address' => $this->string(255)->notNull(),
            'phone_number' => $this->string(255)->notNull(),
            'created_at' => $this->datetime()->notNull()->defaultValue(CURRENT_TIMESTAMP),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('user');
    }
}

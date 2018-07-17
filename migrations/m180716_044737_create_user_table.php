<?php

use yii\db\Schema;
use yii\db\Migration;
/**
 * Handles the creation of table `user`.
 */
class m180716_044737_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'fullname' => $this->string(12)->notNull()->unique(),
            // 'fullname' => $this->string(12)->notNull()->unique(),
            // 'fullname' => $this->string(12)->notNull()->unique(),
            // 'fullname' => $this->string(12)->notNull()->unique(),
            // 'fullname' => $this->string(12)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}

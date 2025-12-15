<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%students}}`.
 */
class m240101_000001_create_students_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%students}}', [
            'id' => $this->primaryKey(),
            'fullname' => $this->string()->notNull(),
            'group' => $this->string()->notNull(),
            'age' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%students}}');
    }
}

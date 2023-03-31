<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%transaction_file}}`.
 */
class m230331_152634_create_transaction_file_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%transaction_file}}', [
            'id' => $this->primaryKey(),
            'id_transaction' => $this->integer()->notNull(),
            'id_file' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%transaction_file}}');
    }
}

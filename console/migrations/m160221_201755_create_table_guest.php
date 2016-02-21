<?php

use yii\db\Migration;

class m160221_201755_create_table_guest extends Migration
{
    public function up()
    {
        $this->createTable('{{%guest}}', [
            'id' => $this->primaryKey(),
            'ticket' => $this->integer()->notNull(),
            'user' => $this->integer()->notNull(),
            'firstName' => $this->string()->notNull(),
            'lastName' => $this->string()->notNull(),
            'redeemedAt' => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%guest}}');
    }
}

<?php

use yii\db\Migration;

class m160218_193106_create_table_ticket extends Migration
{
    public function up()
    {
        $this->createTable('{{%ticket}}', [
            'id' => $this->primaryKey(),
            'owner' => $this->integer()->notNull(),
            'status' => $this->string()->notNull()->defaultValue("active"),
            'issuedAt' => $this->integer()->notNull(),
            'redeemedAt' => $this->integer()->notNull(),
            'package' => $this->integer()->notNull(),
            'firstName' => $this->string()->notNull(),
            'lastName' => $this->string()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%ticket}}');
    }
}

<?php

use yii\db\Migration;

class m160221_201823_create_table_log extends Migration
{
    public function up()
    {
        $this->createTable('{{%log}}', [
            'id' => $this->primaryKey(),
            'ticket' => $this->integer()->notNull(),
            'guest' => $this->integer()->notNull(),
            'action' => $this->string()->notNull(),
            'location' => $this->string()->notNull(),
            'timestamp' => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%log}}');
    }
}

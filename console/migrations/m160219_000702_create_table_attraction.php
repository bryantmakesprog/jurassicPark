<?php

use yii\db\Migration;

class m160219_000702_create_table_attraction extends Migration
{
    public function up()
    {
        $this->createTable('{{%attraction}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text()->notNull()->defaultValue(""),
            'type' => $this->integer()->notNull(),
            'duration' => $this->float()->notNull(),
            'maxOccupancy' => $this->integer()->notNull(),
            'queueSize' => $this->integer()->notNull()->defaultValue(0),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%attraction}}');
    }
}

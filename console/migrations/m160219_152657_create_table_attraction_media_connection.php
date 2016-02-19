<?php

use yii\db\Migration;

class m160219_152657_create_table_attraction_media_connection extends Migration
{
    public function up()
    {
        $this->createTable('{{%attractionMedia}}', [
            'id' => $this->primaryKey(),
            'attraction' => $this->integer()->notNull(),
            'url' => $this->string()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%attractionMedia}}');
    }
}

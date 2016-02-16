<?php

use yii\db\Migration;

class m160215_232647_create_table_product extends Migration
{
    public function up()
    {
        $this->createTable('{{%package}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()->notNull(),
            'description' => $this->text()->notNull()->defaultValue(""),
            'adultPrice' => $this->money()->notNull()->defaultValue(0.00),
            'childPrice' => $this->money()->notNull()->defaultValue(0.00),
            'includesGeneticsTour' => $this->boolean()->notNull()->defaultValue(0),
            'includesSafariTour' => $this->boolean()->notNull()->defaultValue(0),
            'includesFood' => $this->boolean()->notNull()->defaultValue(0),
            'includesHotel' => $this->boolean()->notNull()->defaultValue(0),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%package}}');
    }
}

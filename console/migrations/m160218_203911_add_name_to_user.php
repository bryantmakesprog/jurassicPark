<?php

use yii\db\Migration;

class m160218_203911_add_name_to_user extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'firstName', $this->string()->notNull());
        $this->addColumn('user', 'lastName', $this->string()->notNull());
    }

    public function down()
    {
        $this->dropColumn('user', 'lastName');
        $this->dropColumn('user', 'firstName');
    }
}

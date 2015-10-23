<?php

use yii\db\Schema;
use yii\db\Migration;

class m151005_062649_add_role_to_user extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'role', 'integer default 10');
    }

    public function down()
    {
        $this->dropColumn('user', 'role');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}

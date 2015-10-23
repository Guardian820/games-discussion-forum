<?php

use yii\db\Schema;
use yii\db\Migration;

class m151009_070823_add_role_to_user extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'role', 'string default "user"');
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

<?php

use yii\db\Schema;
use yii\db\Migration;

class m151009_072143_add_avatar_to_user extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'avatar', 'string');
        $this->alterColumn('user', 'created_at', 'datetime not null');
    }

    public function down()
    {
        $this->dropColumn('user', 'avatar');
        $this->alterColumn('user', 'created_at', 'int(11) not null');
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

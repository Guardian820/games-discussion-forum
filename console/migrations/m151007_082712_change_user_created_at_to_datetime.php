<?php

use yii\db\Schema;
use yii\db\Migration;

class m151007_082712_change_user_created_at_to_datetime extends Migration
{
    public function up()
    {
        $this->alterColumn('user', 'created_at', 'datetime not null');
    }

    public function down()
    {
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

<?php

use yii\db\Schema;
use yii\db\Migration;

class m151007_102043_add_avatar_to_user extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'avatar', 'string');
    }

    public function down()
    {
        $this->dropColumn('user', 'avatar');
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

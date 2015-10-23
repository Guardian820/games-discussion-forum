<?php

use yii\db\Schema;
use yii\db\Migration;

class m151006_045600_add_description_to_thread extends Migration
{
    public function up()
    {
        $this->addColumn('thread', 'description', 'text');
    }

    public function down()
    {
        $this->dropColumn('thread', 'description');
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

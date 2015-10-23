<?php

use yii\db\Schema;
use yii\db\Migration;

class m151005_165933_add_content_to_thread extends Migration
{
    public function up()
    {
        $this->addColumn('thread', 'content', 'text');
    }

    public function down()
    {
        $this->dropColumn('thread', 'content');
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

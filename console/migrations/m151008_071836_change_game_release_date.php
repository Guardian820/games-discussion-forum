<?php

use yii\db\Schema;
use yii\db\Migration;

class m151008_071836_change_game_release_date extends Migration
{
    public function up()
    {
        $this->alterColumn('thread', 'release_date', 'date not null');
    }

    public function down()
    {
        $this->alterColumn('thread', 'release_date', 'datetime not null');
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

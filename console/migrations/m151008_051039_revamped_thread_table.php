<?php

use yii\db\Schema;
use yii\db\Migration;

class m151008_051039_revamped_thread_table extends Migration
{
    public function up()
    {
        $this->addColumn('thread', 'release_date', 'datetime');
        $this->addColumn('thread', 'genre', 'string');
        $this->addColumn('thread', 'producers', 'string');
        $this->addColumn('thread', 'developers', 'string');
        $this->addColumn('thread', 'composers', 'string');
        $this->addColumn('thread', 'designers', 'string');

    }

    public function down()
    {
        $this->dropColumn('thread', 'release_date');
        $this->dropColumn('thread', 'genre');
        $this->dropColumn('thread', 'producers');
        $this->dropColumn('thread', 'developers');
        $this->dropColumn('thread', 'composers');
        $this->dropColumn('thread', 'designers');
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

<?php

use yii\db\Schema;
use yii\db\Migration;

class m151012_022651_add_index_to_thread_id extends Migration
{
    public function up()
    {
        $this->createIndex ( 'thread_id', 'post', 'thread_id', $unique = false );
    }

    public function down()
    {
        $this->dropIndex ( 'thread_id', 'post' );
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

<?php

use yii\db\Schema;
use yii\db\Migration;

class m151012_031818_truncate_all_data extends Migration
{
    public function up()
    {
        $this->delete ('user', $condition = '' );
        $this->delete ('thread', $condition = '' );
        $this->delete ('post', $condition = '' );
        $this->delete ('profile', $condition = '' );
        $this->delete ('social_account', $condition = '' );
        $this->delete ('token', $condition = '' );

    }

    public function down()
    {
        echo "m151012_031818_truncate_all_data cannot be reverted.\n";

        return false;
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

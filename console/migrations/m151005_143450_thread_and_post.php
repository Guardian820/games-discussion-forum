<?php

use yii\db\Schema;
use yii\db\Migration;

class m151005_143450_thread_and_post extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('thread', [
            'thread_id'         => $this->primaryKey(),
            'title'             => $this->string()->notNull(),
            'thread_starter'    => $this->integer()->notNull(),
            'created_at'        => $this->datetime()->notNull(),
            'updated_at'        => $this->datetime()->notNull(),
            'replies'           => $this->integer()->notNull(),
            'views'             => $this->integer()->notNull(),
            'locked'            => $this->integer()->notNull(),
            'picture'           => $this->string(),
        ], $tableOptions);

        $this->createTable('post', [
            'post_id'           => $this->primaryKey(),
            'thread_id'         => $this->integer()->notNull(),
            'post_creator'      => $this->integer()->notNull(),
            'created_at'        => $this->datetime()->notNull(),
            'updated_at'        => $this->datetime()->notNull(),
            'content'           => $this->text()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('thread');
        $this->dropTable('post');
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

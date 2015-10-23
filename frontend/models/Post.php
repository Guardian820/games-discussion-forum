<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $post_id
 * @property integer $thread_id
 * @property integer $post_creator
 * @property string $created_at
 * @property string $updated_at
 * @property string $content
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' 		=> 'Post ID',
            'thread_id' 	=> 'Thread ID',
            'post_creator' 	=> 'Post Creator',
            'created_at' 	=> 'Created At',
            'updated_at' 	=> 'Updated At',
            'content' 		=> 'Content',
        ];
    }

    public function getUser() # Define the table relationship between User and Post
    {
        return $this->hasOne(User::className(), ['id' => 'post_creator']);
    }

    public function getThread() # Define the table relationship between Thread and Post
    {
        return $this->hasOne(Thread::className(), ['thread_id' => 'thread_id']);
    }
}


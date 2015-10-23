<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "thread".
 *
 * @property integer $thread_id
 * @property string $title
 * @property integer $thread_starter
 * @property string $created_at
 * @property string $updated_at
 * @property integer $replies
 * @property integer $views
 * @property integer $locked
 * @property string $picture
 * @property string $content
 * @property string $description
 */
class Thread extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'thread';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return 
        [
            [['title','release_date'], 'required'],
            [['title', 'content', 'description', 'release_date', 'genre', 'producers', 'developers', 'composers', 'designers'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return 
        [
            'thread_id'     => 'Thread ID',
            'title'         => 'Title',
            'username'      => 'Thread Starter',
            //'created_at'  => 'Created At',
            //'updated_at'  => 'Updated At',
            //'replies'     => 'Replies',
            //'views'       => 'Views',
            //'locked'      => 'Locked',
            'genre'         => 'Genre',
            //'content'     => 'Content',
            'description'   => 'Description',
        ];
    }

    public function getUser() # Define the table relatoon ship between User and thread
    {
        return $this->hasOne(User::className(), ['id' => 'thread_starter']);
    }

    public function getPost() # Define the table relatoon ship between Thread and Post
    {
        return $this->hasMany(Post::className(), ['thread_id' => 'thread_id']);
    }


}

class User extends \yii\db\ActiveRecord
{
    
}

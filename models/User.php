<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $fullname
 * @property string $login
 * @property string $password
 * @property string $email
 * @property string $avatar
 * @property string $created_at
 * @property string $updated_at
 * @property int $user_stats
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'user_stats'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_stats'], 'integer'],
            [['fullname', 'login', 'password', 'email', 'avatar'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Fullname',
            'login' => 'Login',
            'password' => 'Password',
            'email' => 'Email',
            'avatar' => 'Avatar',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_stats' => 'User Stats',
        ];
    }
}

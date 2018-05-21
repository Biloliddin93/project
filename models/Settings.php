<?php
namespace app\models;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Settings extends ActiveRecord
{
    public static function tableName()
    {
        return 'settings';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    public function rules()
    {
        return [
            // атрибут required указывает, что name, email, subject, body обязательны для заполнения
            [['admin_language_id', 'site_language_id', 'empty_stats'], 'required'],

            // атрибут email указывает, что в переменной email должен быть корректный адрес электронной почты
            ['adminemail', 'email'],

        ];
    }
}



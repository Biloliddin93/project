<?php
namespace app\models;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class BannerCategory extends ActiveRecord
{
    public static function tableName()
    {
        return 'banner_category';
    }


    public function rules()
    {
        return [
            // атрибут required указывает, что name, email, subject, body обязательны для заполнения
            [['position_name'], 'required'],

        ];
    }
}



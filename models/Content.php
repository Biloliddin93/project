<?php
namespace app\models;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Content extends ActiveRecord
{
    public static function tableName()
    {
        return 'content';
    }
    public function rules()
    {
        return [
            // атрибут required указывает, 888 обязательны для заполнения
            [['name','url_alias','summary','body','language_id','menu_id'], 'required'],


        ];
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
}



<?php
namespace app\models;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class ContentSeo extends ActiveRecord
{
    public static function tableName()
    {
        return 'content_seo';
    }

    public function rules()
    {
        return [
            // атрибут required указывает, 888 обязательны для заполнения
            [['page_title','page_deck','keyswords','content_group_id'], 'required'],


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



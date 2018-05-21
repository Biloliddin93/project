<?php

use yii\db\Migration;

/**
 * Class m180518_052154_manu
 */
class m180518_052154_manu extends Migration
{


    public function up()
    {
        $this->createTable('menu', [
            'id' => $this->primaryKey(),
            'levl'=>$this->tinyInteger(),
            'txt_ru'=>$this->string(),
            'txt_en'=>$this->string(),
            'txt_az'=>$this->string(),
            'type'=>$this->tinyInteger(),
            'atter_id'=>$this->integer(),

            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),


        ]);
    }

    public function down()
    {
        echo "m180518_052154_manu cannot be reverted.\n";

        return false;
    }

}

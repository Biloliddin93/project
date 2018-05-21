<?php

use yii\db\Migration;

/**
 * Class m180514_044815_translation
 */
class m180514_044815_translation_grp extends Migration
{



    public function up()
    {
        $this->createTable('translation_grp', [
            'id' => $this->primaryKey(),
            'keyword'=>$this->string(),
            'default_message'=>$this->string(),


            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),




        ]);
    }

    public function down()
    {
        echo "m180514_044815_translation cannot be reverted.\n";

        return false;
    }

}

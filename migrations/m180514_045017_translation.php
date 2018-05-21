<?php

use yii\db\Migration;

/**
 * Class m180514_045017_translation
 */
class m180514_045017_translation extends Migration
{

    public function up()
    {
        $this->createTable('translation', [
            'id' => $this->primaryKey(),
            'translation_grp_id'=>$this->integer(),
            'language_id'=>$this->integer(),
            'message'=>$this->string(),



            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),




        ]);

    }

    public function down()
    {
        echo "m180514_045017_translation cannot be reverted.\n";

        return false;
    }

}

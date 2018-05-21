<?php

use yii\db\Migration;

/**
 * Class m180510_054456_language
 */
class m180510_054456_language extends Migration
{

    public function up()
    {
        $this->createTable('language', [
            'id' => $this->primaryKey(),
            'language_prefix' => $this->string(). ' NOT NULL',
            'language_name' => $this->string(),


            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),



        ]);
    }

    public function down()
    {
        echo "m180510_054456_language cannot be reverted.\n";

        return false;
    }

}

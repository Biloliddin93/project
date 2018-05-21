<?php

use yii\db\Migration;

/**
 * Class m180509_171543_img_group
 */
class m180509_171543_img_group extends Migration
{

    public function up()
    {
        $this->createTable('img_group', [
            'id' => $this->primaryKey(),
            'img_url' => $this->string() . ' NOT NULL',
            'size' => $this->integer(),

            'inserted_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),



        ]);
    }

    public function down()
    {
        echo "m180509_171543_img_group cannot be reverted.\n";

        return false;
    }

}

<?php

use yii\db\Migration;

/**
 * Class m180510_054456_language
 */
class m180510_054456_settings extends Migration
{

    public function up()
    {
        $this->createTable('settings', [
            'id' => $this->primaryKey(),
            'admin_language_id' => $this->integer(). ' NOT NULL',
            'site_language_id' => $this->integer(),
            'empty_stats' => $this->tinyInteger(),
            'adminemail' => $this->string(),
            'favicon' => $this->string(),
            'site_title' => $this->string(),


            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),




        ]);
    }

    public function down()
    {
        echo "m180510_054456_settings cannot be reverted.\n";

        return false;
    }

}

<?php

use yii\db\Migration;

/**
 * Class m180509_171624_banner_category
 */
class m180509_171624_banner_category extends Migration
{

    public function up()
    {
        $this->createTable('banner_category', [
            'id' => $this->primaryKey(),
            'position_name' => $this->string() . ' NOT NULL',
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),


        ]);
    }

    public function down()
    {
        echo "m180509_171624_banner_category cannot be reverted.\n";

        return false;
    }

}

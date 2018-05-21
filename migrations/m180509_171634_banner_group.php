<?php

use yii\db\Migration;

/**
 * Class m180509_171634_banner_group
 */
class m180509_171634_banner_group extends Migration
{



    public function up()
    {
        $this->createTable('banner_group', [
            'id' => $this->primaryKey(),
            'img_group' => $this->string() . ' NOT NULL',
            'status_id' => $this->integer(). ' NOT NULL',
            'banner_category_id' => $this->integer(). ' NOT NULL',
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),

        ]);
    }

    public function down()
    {
        echo "m180509_171634_banner_group cannot be reverted.\n";

        return false;
    }

}

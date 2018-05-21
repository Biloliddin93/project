<?php

use yii\db\Migration;

/**
 * Class m180509_171526_content_group
 */
class m180509_171526_content_group extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('content_group', [
            'id' => $this->primaryKey(),
            'img_gallery_id' => $this->integer() . ' NOT NULL',
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),



        ]);
    }

    public function down()
    {
        echo "m180509_171526_content_group cannot be reverted.\n";

        return false;
    }

}

<?php

use yii\db\Migration;

/**
 * Class m180509_171555_img_gallery
 */
class m180509_171555_img_gallery extends Migration
{


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('img_gallery', [
            'id' => $this->primaryKey(),
            'image_title' => $this->string() . ' NOT NULL',
            'alt' => $this->string(),
            'summary' => $this->string(),
            'language_id' => $this->integer(). ' NOT NULL',
            'img_grp_id' => $this->integer(). ' NOT NULL',
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),


        ]);
    }

    public function down()
    {
        echo "m180509_171555_img_gallery cannot be reverted.\n";

        return false;
    }

}

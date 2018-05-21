<?php

use yii\db\Migration;

/**
 * Class m180509_171452_content_seo
 */
class m180509_171452_content_seo extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('content_seo', [
            'id' => $this->primaryKey(),
            'page_title' => $this->string() . ' NOT NULL',
            'page_deck' => $this->text() . ' NOT NULL',
            'keyswords' => $this->string(),
            'content_group_id' => $this->integer(),
            'language_id' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),



        ]);
    }

    public function down()
    {
        echo "m180509_171452_content_seo cannot be reverted.\n";

        return false;
    }

}

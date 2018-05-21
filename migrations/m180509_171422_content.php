<?php

use yii\db\Migration;

/**
 * Class m180509_171422_content
 */
class m180509_171422_content extends Migration
{


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('content', [
            'id' => $this->primaryKey(),
            'name' => $this->string() . ' NOT NULL',
            'url_alias' => $this->string() . ' NOT NULL',
            'summary' => $this->string(),
            'body' => $this->text(),
            'content_group_id' => $this->integer(),
            'language_id' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),



        ]);
    }

    public function down()
    {
        echo "m180509_171422_content cannot be reverted.\n";

        return false;
    }

}

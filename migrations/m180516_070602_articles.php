<?php

use yii\db\Migration;

/**
 * Class m180516_070602_articles
 */
class m180516_070602_articles extends Migration
{

    public function up()
    {
        $this->createTable('articles', [
            'id' => $this->primaryKey(),
            'language_id'=>$this->integer(),
            'articles_grp_id'=>$this->integer(),
            'name'=>$this->string(),
            'url_alias'=>$this->string()->null(),
            'summary'=>$this->string(),
            'body'=>$this->text()->null(),
            'page_title'=>$this->string()->null(),
            'keywords'=>$this->string()->null(),
            'description'=>$this->string()->null(),
            'url_img'=>$this->string()->null(),

            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),




        ]);
    }

    public function down()
    {
        echo "m180516_070602_articles cannot be reverted.\n";

        return false;
    }

}

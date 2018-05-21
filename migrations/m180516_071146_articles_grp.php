<?php

use yii\db\Migration;

/**
 * Class m180516_071146_articles_grp
 */
class m180516_071146_articles_grp extends Migration
{

    public function up()
    {
        $this->createTable('articles_grp', [
            'id' => $this->primaryKey(),
            'status'=>$this->tinyInteger(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),




        ]);
    }

    public function down()
    {
        echo "m180516_071146_articles_grp cannot be reverted.\n";

        return false;
    }

}

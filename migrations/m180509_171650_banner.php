<?php

use yii\db\Migration;


/**
 * Class m180509_171650_banner
 */
class m180509_171650_banner extends Migration
{
    /**
     * {@inheritdoc}
     */

    public function up(){
        $this->createTable('banner', [
            'id' => $this->primaryKey(),
            'banner_group_id' => $this->integer() . ' NOT NULL',
            'language_id' => $this->integer() . ' NOT NULL',
            'banner_title' => $this->string(),
            'banner_alt' => $this->string(),
            'banner_deck' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),

        ]);
    }
    public function down(){

        echo "m180509_171650_banner cannot be reverted.\n";

        return false;
    }
  /*  public function safeUp()
    {


    }


    public function safeDown()
    {
        echo "m180509_171650_banner cannot be reverted.\n";

        return false;
    }*/

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180509_171650_banner cannot be reverted.\n";

        return false;
    }
    */
}

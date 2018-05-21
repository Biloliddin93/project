<?php

use yii\db\Migration;

/**
 * Class m180509_171659_users
 */
class m180509_171659_users extends Migration
{

    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'user_stats' => $this->integer(). ' NOT NULL',
            'fullname' => $this->string(),
            'login' => $this->string() . ' NOT NULL',
            'password' => $this->string() . ' NOT NULL',
            'email' => $this->string(),
            'avatar' => $this->string(),

            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),



        ]);
    }

    public function down()
    {
        echo "m180509_171659_users cannot be reverted.\n";

        return false;
    }

}

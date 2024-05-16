<?php

use yii\db\Migration;

/**
 * Class m240423_191235_initDB
 */
class m240423_191235_initDB extends Migration
{

    public function safeUp()
    {
        $this->createTable("users", [
            "id" => $this->primaryKey(),
            "login" => $this->string(50)->notNull(),
            "password" => $this->string()->notNull(),
            "photo" => $this->string(),
        ]);
        $this->createTable("comments", [
            "id" => $this->primaryKey(),
            "contracts" => $this->text()->notNull(),
            "reports" => $this->text()->notNull(),
            "user_id" => $this->integer()->notNull(),
            "date" => $this->timestamp()->defaultExpression("NOW()"),
        ]);


        $this->insert("users", [
            "login" => "admin",
            "password" => password_hash("admin", PASSWORD_DEFAULT)
        ]);
        $this->addForeignKey(
            'comments_to_user_fk',
            'comments',
            'user_id',
            'users',
            'id',
            'CASCADE',
            'CASCADE'
        );


    }


    public function safeDown()
    {
        $this->dropTable("users");
        $this->dropTable("comments");

//        echo "m240423_191235_initDB cannot be reverted.\n";
//
//        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240423_191235_initDB cannot be reverted.\n";

        return false;
    }
    */
}

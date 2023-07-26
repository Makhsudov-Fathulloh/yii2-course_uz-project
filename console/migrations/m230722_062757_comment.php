<?php

use yii\db\Migration;

/**
 * Class m230722_062757_comment
 */
class m230722_062757_comment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(512),
            'body' => 'LONGTEXT',
            'post_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
        ]);

        $this->addForeignKey('FK_comment_user_created_by', '{{%comment}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('FK_comment_post_post_id', '{{%comment}}', 'post_id', '{{%post}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_comment_user_created_by', '{{%comment}}');
        $this->dropForeignKey('FK_comment_post_post_id', '{{%comment}');
        $this->dropTable('{{%comment}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230722_062757_comment cannot be reverted.\n";

        return false;
    }
    */
}

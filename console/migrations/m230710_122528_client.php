<?php

use yii\db\Migration;

/**
 * Class m230710_122528_client
 */
class m230710_122528_client extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string()->notNull()->unique(),
            'last_name' => $this->string()->unique(),
            
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%client}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230710_122528_client cannot be reverted.\n";

        return false;
    }
    */
}

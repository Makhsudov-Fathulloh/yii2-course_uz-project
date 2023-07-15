<?php

use yii\db\Migration;

/**
 * Class m230715_065634_employees
 */
class m230715_065634_employees extends Migration
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

        $this->createTable('{{%employees}}', [
            'id' => $this->primaryKey(),
            'employeeNumber' => $this->integer()->notNull()->unique(),
            'firstName' => $this->string()->notNull(),
            'lastName' => $this->string(),
            'extension' => $this->string(),
            'email' => $this->string()->notNull()->unique(),
            'officeCode' => $this->integer()->notNull()->defaultValue(1),
            
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employees}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230715_065634_employees cannot be reverted.\n";

        return false;
    }
    */
}

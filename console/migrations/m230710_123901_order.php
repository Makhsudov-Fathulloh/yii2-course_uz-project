<?php

use yii\db\Migration;

/**
 * Class m230710_123901_order
 */
class m230710_123901_order extends Migration
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

        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer()->notNull()->unique(),
            'ordered_at' => $this->timestamp(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230710_123901_order cannot be reverted.\n";

        return false;
    }
    */
}

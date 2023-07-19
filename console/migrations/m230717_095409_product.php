<?php

use yii\db\Migration;

/**
 * Class m230717_095409_products
 */
class m230717_095409_product extends Migration
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

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'productCode' => $this->integer()->notNull()->unique(),
            'productName' => $this->string()->notNull(),
            'size' => $this->string(),
            'category' => $this->string(),
        
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230717_095409_products cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

class m130524_201442_user extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // https://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'username' => $this->string()->notNull(),
            'role' => $this->string()->defaultValue('client'),
            'auth_key' => $this->string(32)->notNull(),
            'access_token' => $this->string(512),
            'email' => $this->string()->notNull()->unique(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(9),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->insert('{{%user}}', [
            'first_name' => "System",
            'last_name' => "Admin",
            'username' => "admin",
            'role' => 'admin',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'access_token' => Yii::$app->security->generateRandomString(),
            'email' => 'admin@mail.com',
            'password_hash' => Yii::$app->security->generatePasswordHash('admin12345'),
            'password_reset_token' => Yii::$app->security->generateRandomString(64),

            'status' => \common\models\User::STATUS_ACTIVE,
            'created_at' => date('U'),
            'updated_at' => date('U'),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}

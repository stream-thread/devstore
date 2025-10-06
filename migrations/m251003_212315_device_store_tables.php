<?php

use yii\db\Migration;

class m251003_212315_device_store_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('device', [
            'id' => $this->primaryKey(),
            'serial' => $this->string(9)->notNull()->unique(),
            'name' => $this->string(32),
            'stored_in' => $this->string(16),
            'created_at' => $this->dateTime()->defaultValue(new \yii\db\Expression('CURRENT_TIMESTAMP')),
            'updated_at' => $this->dateTime(),
        ]);

        $this->createTable('store', [
            'id' => $this->primaryKey(),
            'name' => $this->string(16)->notNull()->unique(),
            'created_at' => $this->dateTime()->defaultValue(new \yii\db\Expression('CURRENT_TIMESTAMP')),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTabe('device');
        $this->dropTabe('store');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m251003_212315_device_store_tables cannot be reverted.\n";

        return false;
    }
    */
}

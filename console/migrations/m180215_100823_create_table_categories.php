<?php

use yii\db\Migration;

/**
 * Class m180215_100823_create_table_categories
 */
class m180215_100823_create_table_categories extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('categories', [
            'category_id' => $this->primaryKey(5)->unsigned(),
            'category_title' => $this->string(256)->notNull(),
            'category_description' => $this->text()->notNull(),
            'category_status' => "ENUM('active', 'inactive')",
            'category_entered_data' => $this->datetime(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('categories');   
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180215_100823_create_table_categories cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m180215_100851_create_table_products
 */
class m180215_100851_create_table_products extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('products', [
        'product_id' => $this->primaryKey(5)->unsigned(),
        'product_title' => $this->string(256)->notNull(),
        'product_description' => $this->text(),
        'product_price' => $this->decimal()->notNull(),
        'product_image' => $this->string(256)->notNull(),
        'product_status' => "ENUM('in stock', 'out of stock')",
        'product_entered_data' => $this->datetime(),
        'category_id' =>$this->integer(5)->unsigned()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-products-category_id', 
            'products',
            'category_id',
            'categories',
            'category_id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-products-category_id', 
            'categories'
        );

         $this->dropTable('products');   
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180215_100851_create_table_products cannot be reverted.\n";

        return false;
    }
    */
}

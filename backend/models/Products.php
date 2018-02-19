<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property string $product_id
 * @property string $product_title
 * @property string $product_description
 * @property string $product_price
 * @property string $product_image
 * @property string $product_status
 * @property string $product_entered_data
 * @property string $category_id
 *
 * @property Categories $category
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_title', 'product_price', 'category_id'], 'required'],
            [['product_description', 'product_status'], 'string'],
            [['product_price'], 'number'],
            [['product_entered_data'], 'safe'],
            [['category_id'], 'integer'],
            [['product_title'], 'string', 'max' => 256],
            [['product_image'], 'file', 'extensions' => 'jpg,png,gif,jpeg'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'category_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_title' => 'Product Title',
            'product_description' => 'Product Description',
            'product_price' => 'Product Price',
            'product_image' => 'Upload Product Image',
            'product_status' => 'Product Status',
            'product_entered_data' => 'Product Entered Data',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['category_id' => 'category_id']);
    }
}

<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property string $category_id
 * @property string $category_title
 * @property string $category_description
 * @property string $category_status
 * @property string $category_entered_data
 *
 * @property Products[] $products
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_title', 'category_description'], 'required'],
            [['category_description', 'category_status'], 'string'],
            [['category_entered_data'], 'safe'],
            [['category_title'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'category_title' => 'Category Title',
            'category_description' => 'Category Description',
            'category_status' => 'Category Status',
            'category_entered_data' => 'Category Entered Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['category_id' => 'category_id']);
    }
}

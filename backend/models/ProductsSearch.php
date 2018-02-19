<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Products;

/**
 * ProductsSearch represents the model behind the search form about `backend\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'category_id'], 'integer'],
            [['product_title', 'product_description', 'product_image', 'product_status', 'product_entered_data'], 'safe'],
            [['product_price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Products::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'product_id' => $this->product_id,
            'product_price' => $this->product_price,
            'product_entered_data' => $this->product_entered_data,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'product_title', $this->product_title])
            ->andFilterWhere(['like', 'product_description', $this->product_description])
            ->andFilterWhere(['like', 'product_image', $this->product_image])
            ->andFilterWhere(['like', 'product_status', $this->product_status]);

        return $dataProvider;
    }
}

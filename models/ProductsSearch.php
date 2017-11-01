<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Products;

/**
 * ProductsSearch represents the model behind the search form of `app\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'product_api_id'], 'integer'],
            [['product_title', 'chpu', 'content', 'content_activation', 'seo_title', 'seo_description', 'seo_keywords', 'product_thumbnail_path', 'product_thumbnail_name', 'date_create', 'date_create_gmt', 'date_modified', 'date_modified_gmt'], 'safe'],
            [['product_price', 'product_discount'], 'number'],
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
            'product_api_id' => $this->product_api_id,
            'product_price' => $this->product_price,
            'product_discount' => $this->product_discount,
            'date_create' => $this->date_create,
            'date_create_gmt' => $this->date_create_gmt,
            'date_modified' => $this->date_modified,
            'date_modified_gmt' => $this->date_modified_gmt,
        ]);

        $query->andFilterWhere(['like', 'product_title', $this->product_title])
            ->andFilterWhere(['like', 'chpu', $this->chpu])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'content_activation', $this->content_activation])
            ->andFilterWhere(['like', 'seo_title', $this->seo_title])
            ->andFilterWhere(['like', 'seo_description', $this->seo_description])
            ->andFilterWhere(['like', 'seo_keywords', $this->seo_keywords])
            ->andFilterWhere(['like', 'product_thumbnail_path', $this->product_thumbnail_path])
            ->andFilterWhere(['like', 'product_thumbnail_name', $this->product_thumbnail_name]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Properties;

/**
 * PropertiesSearch represents the model behind the search form of `app\models\Properties`.
 */
class PropertiesSearch extends Properties
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['property_id'], 'integer'],
            [['property_title', 'property_name', 'type', 'filter', 'sort', 'active', 'show_index', 'show_view', 'technical_requirements', 'single_value', 'use_value_ext_html'], 'safe'],
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
        $query = Properties::find();

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
            'property_id' => $this->property_id,
        ]);

        $query->andFilterWhere(['like', 'property_title', $this->property_title])
            ->andFilterWhere(['like', 'property_name', $this->property_name])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'filter', $this->filter])
            ->andFilterWhere(['like', 'sort', $this->sort])
            ->andFilterWhere(['like', 'active', $this->active])
            ->andFilterWhere(['like', 'show_index', $this->show_index])
            ->andFilterWhere(['like', 'show_view', $this->show_view])
            ->andFilterWhere(['like', 'technical_requirements', $this->technical_requirements])
            ->andFilterWhere(['like', 'single_value', $this->single_value])
            ->andFilterWhere(['like', 'use_value_ext_html', $this->use_value_ext_html]);

        return $dataProvider;
    }
}

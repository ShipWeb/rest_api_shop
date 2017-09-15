<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Currencies;

/**
 * CurrenciesSearch represents the model behind the search form of `app\models\Currencies`.
 */
class CurrenciesSearch extends Currencies
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['currency_id'], 'integer'],
            [['currency_title', 'currency_name', 'currency_active', 'currency_main'], 'safe'],
            [['currency_course'], 'number'],
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
        $query = Currencies::find();

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
            'currency_id' => $this->currency_id,
            'currency_course' => $this->currency_course,
        ]);

        $query->andFilterWhere(['like', 'currency_title', $this->currency_title])
            ->andFilterWhere(['like', 'currency_name', $this->currency_name])
            ->andFilterWhere(['like', 'currency_active', $this->currency_active])
            ->andFilterWhere(['like', 'currency_main', $this->currency_main]);

        return $dataProvider;
    }
}

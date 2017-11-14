<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lock;

/**
 * LockSearch represents the model behind the search form of `app\models\Lock`.
 */
class LockSearch extends Lock
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ip', 'permanent', 'hits'], 'integer'],
            [['useragent', 'user_login', 'user_pass', 'unblock_date'], 'safe'],
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
        $query = Lock::find();

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
            'id' => $this->id,
            'ip' => $this->ip,
            'unblock_date' => $this->unblock_date,
            'permanent' => $this->permanent,
            'hits' => $this->hits,
        ]);

        $query->andFilterWhere(['like', 'useragent', $this->useragent])
            ->andFilterWhere(['like', 'user_login', $this->user_login])
            ->andFilterWhere(['like', 'user_pass', $this->user_pass]);

        return $dataProvider;
    }
}

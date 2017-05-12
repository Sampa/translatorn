<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Company;

/**
 * CompanySearch represents the model behind the search form of `app\models\Company`.
 */
class CompanySearch extends Company
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'zip', 'phone'], 'integer'],
            [['client_ref', 'name', 'org_nr', 'street', 'country', 'email', 'city', 'extra_1', 'extra_2', 'extra_3'], 'safe'],
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
        $query = Company::find();

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
            'zip' => $this->zip,
            'phone' => $this->phone,
        ]);

        $query->andFilterWhere(['like', 'client_ref', $this->client_ref])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'org_nr', $this->org_nr])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'extra_1', $this->extra_1])
            ->andFilterWhere(['like', 'extra_2', $this->extra_2])
            ->andFilterWhere(['like', 'extra_3', $this->extra_3]);

        return $dataProvider;
    }
}

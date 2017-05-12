<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Orders;

/**
 * OrdersSearch represents the model behind the search form of `app\models\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'bill_sent', 'bill_paid', 'bill_sent_date', 'bill_paid_date', 'created_date', 'user_id', 'type'], 'integer'],
            [['reference', 'language', 'location', 'date', 'made_by', 'bill_ref', 'other_type', 'phone', 'org_nr', 'message', 'made_by_email', 'bill_location', 'email', 'company_name', 'time_end'], 'safe'],
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

    public function getOrdersByUserId($user_id){
        $query = Orders::find()->where(['user_id' => $user_id]);
        $dataProvider = $this->getDataProvider($query);
        return $dataProvider;
    }
    private function getDataProvider($query){
        return new ActiveDataProvider([
            'query' => $query,
        ]);
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
        $query = Orders::find();

        // add conditions that should always apply here

        $dataProvider = $this->getDataProvider($query);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'bill_sent' => $this->bill_sent,
            'bill_paid' => $this->bill_paid,
            'bill_sent_date' => $this->bill_sent_date,
            'bill_paid_date' => $this->bill_paid_date,
            'created_date' => $this->created_date,
            'user_id' => $this->user_id,
            'type' => $this->type,
            'date' => $this->date,
            'time_end' => $this->time_end,
        ]);

        $query->andFilterWhere(['like', 'reference', $this->reference])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'made_by', $this->made_by])
            ->andFilterWhere(['like', 'bill_ref', $this->bill_ref])
            ->andFilterWhere(['like', 'other_type', $this->other_type])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'org_nr', $this->org_nr])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'made_by_email', $this->made_by_email])
            ->andFilterWhere(['like', 'bill_location', $this->bill_location])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'company_name', $this->company_name]);

        return $dataProvider;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: Happyjuiced
 * Date: 2017-05-11
 * Time: 01:16
 */



namespace app\models;

use dektrium\user\models\UserSearch as BaseUserSearch;
use yii\data\ActiveDataProvider;
class UserSearch extends BaseUserSearch
{
    /**
     * @param $params
     *
     * @return ActiveDataProvider
     */
    public $company_id;
    public function search($params)
    {
        $query = $this->finder->getUserQuery();
        $query->andFilterWhere(['not', ['username' => 'root']] );
        if($this->company_id != null){
            $query->andFilterWhere(['company_id' => $this->company_id]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        if ($this->created_at !== null) {
            $date = strtotime($this->created_at);
            $query->andFilterWhere(['between', 'created_at', $date, $date + 3600 * 24]);
        }

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['registration_ip' => $this->registration_ip]);

        return $dataProvider;
    }
}
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
use Yii;
use yii\helpers\ArrayHelper;
class UserSearch extends BaseUserSearch
{
    /**
     * @param $params
     *
     * @return ActiveDataProvider
     */
    public $company_id;
    public $is_boss;
    public function rules()
    {
        $rules = parent::rules();
        // add some rules
        $rules['company_idRequired'] = ['company_id', 'safe'];
        $rules['company_idLength']   = ['company_id', 'safe'];
        $rules['is_bossRequiered'] = ['is_boss', 'safe'];

        return $rules;
    }

    public function search($params)
    {
        $query = $this->finder->getUserQuery();
        $query->andFilterWhere(['not', ['username' => 'root']] );

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        if($this->company_id != null){
            $query->andFilterWhere(['company_id' => $this->company_id]);
        }
        if ($this->created_at !== null) {
            $date = strtotime($this->created_at);
            $query->andFilterWhere(['between', 'created_at', $date, $date + 3600 * 24]);
        }

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'is_boss', $this->is_boss])
            ->andFilterWhere(['registration_ip' => $this->registration_ip]);

        return $dataProvider;
    }

    public function getIsBossList(){
        $statusArray = [
            0 => Yii::t('app', 'No'),
            1 => Yii::t('app', 'Yes'),
        ];

        return $statusArray;
    }

    public function getCompanyList(){
            $models = Company::find()->all();
            return ArrayHelper::map($models, 'id', 'name');
    }
}
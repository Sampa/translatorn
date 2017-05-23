<?php
namespace app\models;

use developeruz\easyii_user\models\User as BaseUser;
use Yii;
class User extends BaseUser
{

//    public function register()
//    {
//
//    }
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        // add field to scenarios
        $scenarios['create'][]   = 'company_id';
        $scenarios['update'][]   = 'company_id';
        $scenarios['register'][] = 'company_id';

        $scenarios['create'][]   = 'is_boss';
        $scenarios['update'][]   = 'is_boss';
        $scenarios['register'][] = 'is_boss';

        return $scenarios;
    }

    public function rules()
    {
        $rules = parent::rules();
        // add some rules
        $rules['company_idRequired'] = ['company_id', 'required'];
        $rules['is_bossSafe'] = ['is_boss', 'safe'];
        $rules['company_idLength']   = ['company_id', 'string', 'max' => 10];
        $rules['passwordRequiced'] = ['password', 'required'];


        return $rules;
    }

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['company_id'] = Yii::t('company', 'Company');
        $labels['is_boss'] = Yii::t('app', 'Is boss');

        return $labels;
    }

    public function getCompany(){
      return self::hasOne(Company::className(),['id' => 'company_id']);
    }

    public function getIsBossAsText(){
        if($this->is_boss == 1)
            return Yii::t('app',"Yes");

        return Yii::t('app',"No");
    }

    public function getIsBossList(){
        $statusArray = [
            0 => Yii::t('app', 'No'),
            1 => Yii::t('app', 'Yes'),
        ];

        return $statusArray;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {
            $r=new yii\rbac\DbManager;
            $r->init();
            $role = $r->getRole("customer");
            $r->assign($role,$this->id);
        }
    }

}


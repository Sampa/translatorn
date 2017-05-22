<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\User;
/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $client_ref
 * @property string $name
 * @property string $org_nr
 * @property string $street
 * @property int $zip
 * @property string $country
 * @property string $email
 * @property int $phone
 * @property string $city
 * @property string $extra_1
 * @property string $extra_2
 * @property string $extra_3
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [[ 'org_nr', 'street', 'email', 'city'], 'safe'],
            [['zip'], 'integer'],
            [['extra_1', 'extra_2', 'extra_3','client_ref','phone'], 'string'],
            [['client_ref', 'name', 'org_nr', 'street', 'country', 'email', 'city'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('company', 'ID'),
            'client_ref' => Yii::t('company', 'Client Ref'),
            'name' => Yii::t('company', 'Name'),
            'org_nr' => Yii::t('company', 'Org Nr'),
            'street' => Yii::t('company', 'Street'),
            'zip' => Yii::t('company', 'Zip'),
            'country' => Yii::t('company', 'Country'),
            'email' => Yii::t('company', 'Email'),
            'phone' => Yii::t('company', 'Phone'),
            'city' => Yii::t('company', 'City'),
            'extra_1' => Yii::t('company', 'Extra 1'),
            'extra_2' => Yii::t('company', 'Extra 2'),
            'extra_3' => Yii::t('company', 'Extra 3'),
        ];
    }

    /**
     * @inheritdoc
     * @return CompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompanyQuery(get_called_class());
    }

    public static function companyList()
    {
        $models = Company::find()->all();
        return ArrayHelper::map($models, 'id', 'name');
    }
    public function getUsers(){
        return self::hasMany(User::className(),['id' => 'company_id']);
    }
}

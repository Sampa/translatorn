<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
use DateTime;
/**
 * This is the model class for table "invoice".
 *
 * @property int $id
 * @property int $file Invoice
 * @property string $date Applies to
 * @property int $company_id Company
 * @property int $status Status
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'invoice';
    }

    public function getFormatDate($format){
        $date = new DateTime($this->date, timezone_open('Europe/Stockholm'));
        return $date->format($format);
    }

    public function getStatusAsText(){
        if($this->status == 1)
            return Yii::t('app',"Yes");

        return Yii::t('app',"No");
    }

    public function getStatusList(){
        $statusArray = [
            0 => Yii::t('app', 'No'),
            1 => Yii::t('app', 'Yes'),
        ];

        return $statusArray;
    }

    public function getFileLink(){
        if(isset($this->files[0]))
            return Html::a('Ladda ner',$this->files[0]['url'],['class' =>'green']);
        else
            return Html::tag('span','Ingen fil hittades');
    }

    public function getCompany(){
        return self::hasOne(Company::className(),['id' => 'company_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'company_id'], 'required'],
            [['company_id', 'status'], 'integer'],
            [['file','date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'file' => Yii::t('app', 'Invoice'),
            'date' => Yii::t('app', 'Applies to'),
            'company_id' => Yii::t('app', 'Company'),
            'status' => Yii::t('app', 'Paid'),
        ];
    }

    /**
     * @inheritdoc
     * @return InvoiceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InvoiceQuery(get_called_class());
    }

    public function behaviors()
    {
        return [
            // Other behaviors
            'fileBehavior' => [
                'class' => \nemmo\attachments\behaviors\FileBehavior::className()
                ]
            ];
    }

}

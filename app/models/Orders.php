<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\Html;
use dektrium\user\models\User;
use yii\data\ActiveDataProvider;
use yii\db\Query;
/**
 * This is the model class for table "orders".
 *
 * @property int $id id
 * @property string $reference Contact person
 * @property string $language Language
 * @property string $location Location
 * @property int $bill_sent Bill sent
 * @property int $bill_paid Bill paid
 * @property int $bill_sent_date Bill was sent
 * @property int $bill_paid_date Bill was paid
 * @property int $created_date Order created
 * @property int $user_id Order belongs too
 * @property int $type
 * @property string $made_by
 * @property string $bill_ref
 * @property string $other_type
 * @property string $phone
 * @property string $org_nr
 * @property string $message
 * @property string $made_by_email
 * @property string $bill_location
 * @property string $email
 * @property string $company_name
 * @property string $time_end
 */
class Orders extends \yii\db\ActiveRecord
{
    const OVER_PHONE = 2;
    const ON_SITE = 1;
    const OTHER = 3;
    public $datetime = '1351351'; //remove when possible
    public $creator;

    public function init(){
        parent::init();
        $this->on(self::EVENT_AFTER_FIND,[$this,'setCustomProps']);
    }

    public function setCustomProps()
    {
        $this->creator = $this->getCreatorName();
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }
    public function behaviors()
    {
        return [
            // Other behaviors
            'fileBehavior' => [
                'class' => \nemmo\attachments\behaviors\FileBehavior::className()
            ],
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_date',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (isset($this->files[0])) {
                $this->bill_sent = 1;
                $this->bill_sent_date = new Expression('NOW()');
            }else{
                $this->bill_sent = 0;
            }
            return true;
        } else {
            return false;
        }
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['org_nr', 'email', 'time_end', 'phone', 'made_by_email','made_by', 'language', 'type', 'date','time_start'], 'required'],
            [['language', 'location'], 'string', 'max' => 55],
            [['bill_sent', 'bill_paid', 'bill_sent_date', 'bill_paid_date', 'user_id', 'type'], 'integer'],
            [['time_end','created_date'], 'safe'],
            [['message'], 'string'],
            [['reference', 'made_by', 'bill_ref', 'other_type', 'phone', 'org_nr', 'made_by_email',
                'bill_location', 'email', 'company_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('orders', 'id'),
            'reference' => Yii::t('orders', 'Reference'),
            'language' => Yii::t('orders', 'Language'),
            'location' => Yii::t('orders', 'Address for this task'),
            'bill_sent' => Yii::t('orders', 'Ladda hem'),
            'bill_paid' => Yii::t('orders', 'Bill paid'),
            'bill_sent_date' => Yii::t('orders', 'Bill was sent'),
            'bill_paid_date' => Yii::t('orders', 'Bill was paid'),
            'created_date' => Yii::t('orders', 'Order created'),
            'user_id' => Yii::t('orders', 'Customer'),
            'type' => Yii::t('orders', 'Translation should be made:'),
            'date' => Yii::t('orders', 'Date'),
            'made_by' => Yii::t('orders', 'Booked by'),
            'bill_ref' => Yii::t('orders', 'Bill number'),
            'other_type' => Yii::t('orders', 'Other Type'),
            'phone' => Yii::t('orders', 'Phone'),
            'org_nr' => Yii::t('orders', 'Org Nr'),
            'message' => Yii::t('orders', 'Message'),
            'made_by_email' => Yii::t('orders', 'Made By Email'),
            'bill_location' => Yii::t('orders', 'Bill Location'),
            'email' => Yii::t('orders', 'Email'),
            'company_name' => Yii::t('orders', 'Company Name'),
            'time_end' => Yii::t('orders', 'Time End'),
            'time_start' => Yii::t('orders', 'Time Start'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getFilterUserList(){
            $userArray = [
                $this->user_id => $this->creator
            ];
            return $userArray;
    }

    public function getCreatorName(){
        return $this->user->username;
    }

    public function getTypeAsText(){
        if($this->type == self::ON_SITE)
            return Yii::t('orders','On site');
        elseif ($this->type == self::OVER_PHONE)
            return Yii::t('orders','On phone');
        else
            return Yii::t('orders', 'Other');

    }

    public function getTypeList(){
        $statusArray = [
            self::OVER_PHONE     => Yii::t('orders', 'Phone'),
            self::ON_SITE => Yii::t('orders', 'Plats'),
        ];

        return $statusArray;
    }

    public function getBillSentList(){
        $statusArray = [
            0 => Yii::t('orders', 'Not sent'),
            1 => Yii::t('orders', 'Sent'),
        ];

        return $statusArray;
    }

    public function getBillLink(){
        if(isset($this->files[0]))
            return Html::a('Ladda ner',$this->files[0]['url'],['class' =>'green']);
        else
            return Html::tag('span','EJ KLAR');
    }

    public function getLatest($userid,$limit){
        $query = new Query;
        $dataProvider = new ActiveDataProvider([
            'query' => Orders::find()->users()->orderBy(['date' => SORT_DESC])->limit(10),
            'pagination' => false,
        ]);
        return $dataProvider->getModels();
    }

    public function getBillSent(){
        if($this->bill_sent){
            $date = date('j/n', $this->bill_sent_date);
            return $date;
        }else{
            return Yii::t('orders', 'Not sent');
        }
    }

    public function getBillPaid(){
        if($this->bill_paid){
            return $this->bill_paid_date;
        }else{
            return Yii::t('orders', 'No');
        }
    }

    public function getTimeStart()
    {
        return substr($this->time_start,0,5);
    }

    public function getTimeEnd()
    {
        return substr($this->time_end,0,5);
    }
    public function getDayMonth()
    {
        return substr($this->date,0,5);
    }

    /**
     * @inheritdoc
     * @return OrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdersQuery(get_called_class());
    }
}

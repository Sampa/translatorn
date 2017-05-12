<?php

namespace app\models;

use Yii;

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
 * @property string $datetime
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
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reference', 'language', 'location', 'created_date', 'user_id', 'type', 'datetime', 'made_by', 'bill_ref', 'other_type', 'phone', 'org_nr', 'message', 'made_by_email', 'bill_location', 'email', 'company_name', 'time_end'], 'required'],
            [['bill_sent', 'bill_paid', 'bill_sent_date', 'bill_paid_date', 'created_date', 'user_id', 'type'], 'integer'],
            [['datetime', 'time_end'], 'safe'],
            [['message'], 'string'],
            [['reference', 'made_by', 'bill_ref', 'other_type', 'phone', 'org_nr', 'made_by_email', 'bill_location', 'email', 'company_name'], 'string', 'max' => 255],
            [['language', 'location'], 'string', 'max' => 55],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('orders', 'id'),
            'reference' => Yii::t('orders', 'Contact person'),
            'language' => Yii::t('orders', 'Language'),
            'location' => Yii::t('orders', 'Location'),
            'bill_sent' => Yii::t('orders', 'Bill sent'),
            'bill_paid' => Yii::t('orders', 'Bill paid'),
            'bill_sent_date' => Yii::t('orders', 'Bill was sent'),
            'bill_paid_date' => Yii::t('orders', 'Bill was paid'),
            'created_date' => Yii::t('orders', 'Order created'),
            'user_id' => Yii::t('orders', 'Order belongs too'),
            'type' => Yii::t('orders', 'Type'),
            'datetime' => Yii::t('orders', 'Datetime'),
            'made_by' => Yii::t('orders', 'Made By'),
            'bill_ref' => Yii::t('orders', 'Bill Ref'),
            'other_type' => Yii::t('orders', 'Other Type'),
            'phone' => Yii::t('orders', 'Phone'),
            'org_nr' => Yii::t('orders', 'Org Nr'),
            'message' => Yii::t('orders', 'Message'),
            'made_by_email' => Yii::t('orders', 'Made By Email'),
            'bill_location' => Yii::t('orders', 'Bill Location'),
            'email' => Yii::t('orders', 'Email'),
            'company_name' => Yii::t('orders', 'Company Name'),
            'time_end' => Yii::t('orders', 'Time End'),
        ];
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

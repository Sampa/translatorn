<?php
namespace app\modules\akut\models;

use Yii;
use yii\easyii\behaviors\CalculateNotice;
use yii\easyii\helpers\Mail;
use app\models\Mailer;
use yii\easyii\models\Setting;
use yii\easyii\validators\ReCaptchaValidator;
use yii\easyii\validators\EscapeValidator;
use yii\helpers\Url;

class Akut extends \yii\easyii\components\ActiveRecord
{
    const STATUS_NEW = 0;
    const STATUS_VIEW = 1;
    const STATUS_ANSWERED = 2;

    const FLASH_KEY = 'eaysiicms_feedback_send_result';

    public $reCaptcha;
    public static function tableName()
    {
        return 'app_akut';
    }

    public function rules()
    {
        return [
            [['name', 'language', 'email', 'title'], 'required'],
            [['name', 'email', 'phone', 'title', 'text'], 'trim'],
            [['name','title', 'text'], EscapeValidator::className()],
            ['title', 'string', 'max' => 128],
            ['email', 'email'],
            [['date', 'time_start','time_end','text'], 'safe'],
            ['phone', 'match', 'pattern' => '/^[\d\s-\+\(\)]+$/'],
            ['reCaptcha', ReCaptchaValidator::className(), 'when' => function($model){
                return $model->isNewRecord && Yii::$app->getModule('admin')->activeModules['akut']->settings['enableCaptcha'];
            }],
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($insert){
                $this->ip = Yii::$app->request->userIP;
                $this->time = time();
                $this->status = self::STATUS_NEW;
            }
            return true;
        } else {
            return false;
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if($insert){
            $this->mailAdmin();
        }
    }

    public function attributeLabels()
    {
        return [
            'email' => 'E-mail',
            'name' => Yii::t('app', 'Name'),
            'language' => Yii::t('app', 'Language'),
            'title' => Yii::t('akut', 'Company'),
            'text' => Yii::t('app', 'Text'),
            'answer_subject' => Yii::t('akut', 'Subject'),
            'answer_text' => Yii::t('akut', 'Text'),
            'phone' => Yii::t('app', 'Phone'),
            'reCaptcha' => Yii::t('akut', 'Anti-spam check')
        ];
    }

    public function behaviors()
    {
        return [
            'cn' => [
                'class' => CalculateNotice::className(),
                'callback' => function(){
                    return self::find()->status(self::STATUS_NEW)->count();
                }
            ]
        ];
    }

    public function mailAdmin()
    {
        $settings = Yii::$app->getModule('admin')->activeModules['akut']->settings;

        if(!$settings['mailAdminOnNewFeedback']){
            return false;
        }
        return Mailer::send(
            'akutbokning@translatorn.se',
            Setting::get('admin_email'),
            $settings['subjectOnNewFeedback'],
            $settings['templateOnNewFeedback'],
            ['akut' => $this, 'link' => Url::to(['/akut/a/view', 'id' => $this->primaryKey], true)]
        );
    }

    public function sendAnswer()
    {
        $settings = Yii::$app->getModule('admin')->activeModules['akut']->settings;

        return Mailer::send(
            'boka@translatorn.se',
            $this->email,
            $this->answer_subject,
            $settings['answerTemplate'],
            ['akut' => $this],
            ['replyTo' => Setting::get('admin_email')]
        );
    }
}
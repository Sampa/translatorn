<?php
namespace app\modules\job\models;

use Yii;
use yii\easyii\behaviors\CalculateNotice;
use yii\easyii\helpers\Mail;
use yii\easyii\models\Setting;
use yii\easyii\validators\ReCaptchaValidator;
use yii\easyii\validators\EscapeValidator;
use yii\helpers\Url;

class Feedback extends \yii\easyii\components\ActiveRecord
{
    const STATUS_NEW = 0;
    const STATUS_VIEW = 1;
    const STATUS_ANSWERED = 2;

    const FLASH_KEY = 'eaysiicms_feedback_send_result';

    public $reCaptcha;

    public static function tableName()
    {
        return 'app_job';
    }

    public function rules()
    {
        return [
            [['name', 'email', 'text','phone','title','education','language'], 'required'],
            [['name', 'email', 'phone', 'title', 'text','education','language','language2','language3'], 'trim'],
            [['name','title', 'text','education','language','language2','language3'], EscapeValidator::className()],
            ['title', 'string', 'max' => 128],
            ['email', 'email'],
            ['phone', 'match', 'pattern' => '/^[\d\s-\+\(\)]+$/'],
            ['reCaptcha', ReCaptchaValidator::className(), 'when' => function($model){
                return $model->isNewRecord && Yii::$app->getModule('admin')->activeModules['job']->settings['enableCaptcha'];
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
            'email' => 'E-post',
            'name' => Yii::t('app', 'Name'),
            'title' => Yii::t('app', 'Erfarenhet som tolk (antal år)'),
            'language' => Yii::t('app', 'A- Språk (modersmål)'),
            'language2' => Yii::t('app', 'B- Språk '),
            'language3' => Yii::t('app', 'C- Språk '),
            'education' => Yii::t('app', 'Genomgått tolkutbildning?'),
            'text' => Yii::t('app', 'Text'),
            'answer_subject' => Yii::t('akut', 'Subject'),
            'answer_text' => Yii::t('akut', 'Text'),
            'phone' => Yii::t('akut', 'Phone'),
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
        $settings = Yii::$app->getModule('admin')->activeModules['job']->settings;

        if(!$settings['mailAdminOnNewFeedback']){
            return false;
        }
        return Mail::send(
            Setting::get('admin_email'),
            $settings['subjectOnNewFeedback'],
            $settings['templateOnNewFeedback'],
            ['job' => $this, 'link' => Url::to(['/admin/job/a/view', 'id' => $this->primaryKey], true)]
        );
    }

    public function sendAnswer()
    {
        $settings = Yii::$app->getModule('admin')->activeModules['job']->settings;

        return Mail::send(
            $this->email,
            $this->answer_subject,
            $settings['answerTemplate'],
            ['job' => $this],
            ['replyTo' => Setting::get('admin_email')]
        );
    }
}
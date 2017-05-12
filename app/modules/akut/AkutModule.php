<?php
namespace app\modules\akut;

class AkutModule extends \yii\easyii\components\Module
{
    public $settings = [
        'mailAdminOnNewFeedback' => true,
        'subjectOnNewFeedback' => 'New feedback',
        'templateOnNewFeedback' => '@app/modules/akut/mail/en/new_feedback',

        'answerTemplate' => '@app/modules/akut/mail/en/answer',
        'answerSubject' => 'Answer on your feedback message',
        'answerHeader' => 'Hello,',
        'answerFooter' => 'Best regards.',

        'enableTitle' => false,
        'enablePhone' => true,
        'enableCaptcha' => false,
    ];

    public static $installConfig = [
        'title' => [
            'en' => 'Feedback',
            'ru' => 'Обратная связь',
        ],
        'icon' => 'earphone',
        'order_num' => 60,
    ];
}
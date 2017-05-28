<?php
/**
 * Created by PhpStorm.
 * User: Happyjuiced
 * Date: 2017-05-26
 * Time: 23:39
 */

namespace app\models;
use dektrium\user\Mailer as BaseMailer;
use app\models\User;
use app\models\Token;
use yii\easyii\models\Setting;
use Yii;

class Mailer extends BaseMailer
{
    protected $noticeSubject = 'Det har gjorts en ny bokning';
    public $viewPath = '@app/views/user/mail';

    /**
     * Sends an email to the admin with alert about new Order
     *
     *
     * @param Token $token
     *
     * @return bool
     */
    public function sendNoticeMessage(User $user)
    {
        $token = \Yii::createObject([
            'class' => Token::className(),
            'user_id' => $user->id,
            'type' => Token::TYPE_NEW_ORDER,
        ]);

        if (!$token->save(false)) {
            return false;
        }
        return $this->sendMessage(
            Setting::get('booking_notice'),
            $this->getNoticeSubject(),
            'new_order',
            ['user' => $user, 'token' => $token]
        );
    }

    private function getNoticeSubject(){
        return $this->noticeSubject;
    }

    public static function send($from,$toEmail, $subject, $template, $data = [], $options = [])
    {
        if(!filter_var($toEmail, FILTER_VALIDATE_EMAIL) || !$subject || !$template){
            return false;
        }
        $data['subject'] = trim($subject);

        $message = Yii::$app->mailer->compose($template, $data)
            ->setTo($toEmail)
            ->setSubject($data['subject'])
            ->setFrom($from);

        if(!empty($options['replyTo']) && filter_var($options['replyTo'], FILTER_VALIDATE_EMAIL)){
            $message->setReplyTo($options['replyTo']);
        }

        return $message->send();
    }
}
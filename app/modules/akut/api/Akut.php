<?php
namespace app\modules\akut\api;

use Yii;
use app\modules\akut\models\Akut as AkutModel;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\easyii\widgets\ReCaptcha;


/**
 * Feedback module API
 * @package app\modules\akut\api
 *
 * @method static string form(array $options = []) Returns fully worked standalone html form.
 * @method static array save(array $attributes) If you using your own form, this function will be useful for manual saving feedback's.
 */

class Akut extends \yii\easyii\components\API
{
    const SENT_VAR = 'akut_sent';

    private $_defaultFormOptions = [
        'errorUrl' => '',
        'successUrl' => ''
    ];

    public function api_form($options = [])
    {
        $model = new AkutModel;
        $settings = Yii::$app->getModule('admin')->activeModules['akut']->settings;
        $options = array_merge($this->_defaultFormOptions, $options);

        ob_start();
        $form = ActiveForm::begin([
            'enableClientValidation' => true,
            'action' => Url::to(['/akut/send'])
        ]);

        echo Html::hiddenInput('errorUrl', $options['errorUrl'] ? $options['errorUrl'] : Url::current([self::SENT_VAR => 0]));
        echo Html::hiddenInput('successUrl', $options['successUrl'] ? $options['successUrl'] : Url::current([self::SENT_VAR => 1]));

        if($settings['enableTitle']) echo $form->field($model, 'title')->textInput(['placeholder' => 'Företag *'])->label(false);

        echo $form->field($model, 'language')->textInput(['placeholder' => 'Språk *'])->label(false);

        echo $form->field($model, 'date')->textInput(['placeholder' => 'Datum *'])->label(false);

        echo $form->field($model, 'time_start')->textInput(['placeholder' => 'Start tid *'])->label(false);

        echo $form->field($model, 'email')->input('email', ['placeholder' => 'E-post *'])->label(false);

        echo $form->field($model, 'name')->textInput(['placeholder' => 'Kontaktperson *'])->label(false);

        if($settings['enablePhone']) echo $form->field($model, 'phone')->textInput(['placeholder' => 'Telefon'])->label(false);

        echo $form->field($model, 'text')->textarea(['placeholder' => 'Meddelande'])->label(false);


        if($settings['enableCaptcha']) echo $form->field($model, 'reCaptcha')->widget(ReCaptcha::className())->label(false);

        echo Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn btn-primary']);
        ActiveForm::end();

        return ob_get_clean();
    }

    public function api_save($data)
    {
        $model = new AkutModel($data);
        if($model->save()){
            return ['result' => 'success'];
        } else {
            return ['result' => 'error', 'error' => $model->getErrors()];
        }
    }
}
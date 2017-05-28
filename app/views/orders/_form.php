<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use yii\widgets\Pjax;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
$user = Yii::$app->user->identity;
$company = $user->company;
?>

<div class="orders-form col-md-12">
    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => '1']]); ?>
    <div class="col-md-6">
<!--        Företagsnamn -->
        <?= $form->field($model, 'company_name')->textInput([
            'maxlength' => true,
            'placeholder' => 'Företagsnamn *',
            'readonly' => true,
            'value' => (isset($company->name)) ? $company->name : '',
        ])->label(false) ?>

<!--Företags email -->
        <?= $form->field($model, 'email')->textInput([
            'maxlength' => true,
            'placeholder' => 'Email *',
            'value' => (isset($company->email)) ? $company->email : '',
        ])->label(false) ?>

<!--       Företags telefon-->
        <?= $form->field($model, 'phone')->textInput([
            'maxlength' => true,
            'placeholder' => 'Telefon *',
            'value' => (isset($company->phone)) ? $company->phone : '',
        ])->label(false) ?>
<!--Språk-->
        <?= $form->field($model, 'language')->textInput([
            'maxlength' => true,
            'placeholder' => 'Språk *',
        ])->label(false) ?>

        <?= $form->field($model, 'date')->widget(
            DatePicker::classname(), [
            'options' => ['placeholder' => 'Välj datum *'], //html options
            'type' => DatePicker::TYPE_COMPONENT_APPEND,
            'size' => 'sm',
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd/mm',
            ],
        ])->label(false) ?>

        <div class="row" id="orders-time-pickers">
            <div class="col-md-6" class="orders-time-start-picker">

                <?= $form->field($model, 'time_start')->widget(TimePicker::classname(), [
                    'options' => ['placeholder' => 'Tid start *'], //html options,
                    'addonOptions' => [
                        'asButton' => true,
                        'buttonOptions' => ['class' => 'btn btn-sm']
                    ],
                    'pluginOptions' => [
                        'showMeridian' => false,
                        'minuteStep' => 5,
                    ]
                ])->label(false); ?>

            </div>

            <div class="col-md-6" class="orders-time-end-picker">

                <?= $form->field($model, 'time_end')->widget(TimePicker::classname(), [
                    'options' => ['placeholder' => 'Tid till *'], //html options,
                    'addonOptions' => [
                        'asButton' => true,
                        'buttonOptions' => ['class' => 'btn btn-sm']
                    ],
                    'pluginOptions' => [
                        'showMeridian' => false,
                        'minuteStep' => 5,
                    ]
                ])->label(false); ?>

            </div>

        </div>
        <?= $form->field($model, 'type')->radioList([
            '1' => Yii::t('orders', 'On site'),
            '2' => Yii::t('orders', 'On phone'),
            '3' => Yii::t('orders', 'Other')
        ], ['class' => 'radio'])->label(false) ?>


    </div>
<!---- HÖGRA KOLUMNEN -->
    <div class="col-md-6">

<!--        Företagets org nummer-->
        <?= $form->field($model, 'org_nr')->textInput([
            'maxlength' => true,
            'placeholder' => 'Organisationsnummer *',
            'readonly' => true,
            'value' => (isset($company->org_nr)) ? $company->org_nr : '',
        ])->label(false) ?>

<!--Användarens användarnamn-->
        <?= $form->field($model, 'made_by')->textInput([
            'maxlength' => true,
            'placeholder' => 'Beställare *',
            'readonly' => true,
            'value' => $user->username,
            ])->label(false) ?>

        <?= $form->field($model, 'made_by_email')->textInput([
            'maxlength' => true,
            'placeholder' => 'Kontaktuppgift  *',
            'value' => $user->email,
        ])->label(false) ?>

        <?= $form->field($model, 'reference')->textInput(['maxlength' => true, 'placeholder' => 'Er referens'])->label(false) ?>
        <?= $form->field($model, 'message')->textarea(['placeholder' => 'Meddelande/Önskemål'])->label(false) ?>

        <?= $form->field($model, 'other_type')->textInput(['style' => 'display:none', 'maxlength' => true, 'placeholder' => 'Annan tolkplats'])->label(false) ?>



        <?= $form->field($model, 'bill_location')->hiddenInput(['maxlength' => true, 'placeholder' => 'Kostnadsställe'])->label(false) ?>
        <?= $form->field($model, 'location')->hiddenInput(['maxlength' => true, 'placeholder' => 'Plats för tolkuppdraget'])->label(false) ?>
        <?= $form->field($model, 'bill_paid')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'bill_sent_date')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'bill_paid_date')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'created_date')->hiddenInput()->label(false) ?>
    </div>
    <br>
    <div class="col-md-12 form-group">
        <?= Html::submitButton(Yii::t('app', 'Book'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php
    ActiveForm::end();
    ?>

</div>
<?php $this->registerJs(' 
    console.log();
    $(\'form\').on("submit",function()
    {
            $(\'button[type="submit"]\').prop("disabled", true);
    });
    $(\'input[type="radio"]\').click(function()
    {
        if($(this).attr("value")=="3")
        {
            $(\'#orders-other_type\').fadeIn();
        }else{
            $(\'#orders-other_type\').fadeOut();
        }
    });
');
?>
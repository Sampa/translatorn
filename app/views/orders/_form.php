<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form col-md-12">
    <?php $form = ActiveForm::begin([]); ?>
    <div class="col-md-6">
        <?= $form->field($model, 'company_name')->textInput(['maxlength' => true, 'placeholder' => 'Företagsnamn *'])->label(false) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email *'])->label(false) ?>
        <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'placeholder' => 'Telefon *'])->label(false) ?>


        <?= $form->field($model, 'language')->textInput(['maxlength' => true, 'placeholder' => 'Språk *'])->label(false) ?>

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
        <div class="col-md-12" class="orders-time-pickers">
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
            <?= $form->field($model, 'type')->radioList([
                '1' => Yii::t('orders', 'On phone'),
                '2' => Yii::t('orders', 'On site'),
                '3' => Yii::t('orders', 'Other')
            ], ['class' => 'radio'])->label(false) ?>
        </div>


    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'org_nr')->textInput(['maxlength' => true, 'placeholder' => 'Organisationsnummer *'])->label(false) ?>


        <?= $form->field($model, 'made_by')->textInput(['maxlength' => true, 'placeholder' => 'Beställare *'])->label(false) ?>

        <?= $form->field($model, 'made_by_email')->textInput(['maxlength' => true, 'placeholder' => 'Kontaktuppgift  *'])->label(false) ?>

        <?= $form->field($model, 'bill_location')->textInput(['maxlength' => true, 'placeholder' => 'Kostnadsställe'])->label(false) ?>

        <?= $form->field($model, 'message')->textarea(['placeholder' => 'Meddelande/Önskemål'])->label(false) ?>


        <?= $form->field($model, 'other_type')->textInput(['style' => 'display:none', 'maxlength' => true, 'placeholder' => 'Annan tolkplats'])->label(false) ?>

        <?= $form->field($model, 'location')->hiddenInput(['maxlength' => true, 'placeholder' => 'Plats för tolkuppdraget'])->label(false) ?>
        <?= $form->field($model, 'reference')->hiddenInput(['maxlength' => true, 'placeholder' => 'Ärendenummer'])->label(false) ?>
        <?= $form->field($model, 'bill_sent')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'bill_paid')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'bill_sent_date')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'bill_paid_date')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'created_date')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false) ?>
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
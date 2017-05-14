<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form update-order col-md-12">

    <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
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
    <div class="col-md-12" id="orders-time-pickers" style="padding: 0;">
        <div class="col-md-6" id="" style="padding-left: 0; padding-right;">

            <?= $form->field($model, 'time_start')->widget(TimePicker::classname(), [
                'options' => ['placeholder' => 'Tid start *'], //html options,
                'addonOptions' => [
                    'asButton' => true,
                ],
                'pluginOptions' => [
                    'showMeridian' => false,
                    'minuteStep' => 5,
                ]
            ])->label(false); ?>

        </div>

        <div class="col-md-6" id="" style="padding: 0;">

            <?= $form->field($model, 'time_end')->widget(TimePicker::classname(), [
                'options' => ['placeholder' => 'Tid till *'], //html options,
                'addonOptions' => [
                    'asButton' => true,
                    'buttonOptions' => ['class' => 'btn-default btn']
                ],
                'pluginOptions' => [
                    'showMeridian' => false,
                    'minuteStep' => 5,
                ]
            ])->label(false); ?>

        </div>
        <div id="update-order-type">
        <?= $form->field($model, 'type')->radioList([
            '1' => Yii::t('orders', 'On phone'),
            '2' => Yii::t('orders', 'On site'),
            '3' => Yii::t('orders', 'Other')
        ], ['class' => 'radio','style'=>''])->label(false) ?>
        </div>
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

    <?= \nemmo\attachments\components\AttachmentsInput::widget([
        'id' => 'file-input', // Optional
        'model' => $model,
        'options' => [ // Options of the Kartik's FileInput widget
            'multiple' => false, // If you want to allow multiple upload, default to false
        ],
        'pluginOptions' => [ // Plugin options of the Kartik's FileInput widget
            'maxFileCount' => 10 // Client max files
        ]
    ]) ?>



    <?= $form->field($model, 'user_id')->hiddenInput(['value' => $model->user_id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

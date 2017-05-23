<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Invoice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invoice-form col-md-8">

    <?php $form = ActiveForm::begin(); ?>

    <?= \nemmo\attachments\components\AttachmentsInput::widget([
        'id' => 'file-input', // Optional
        'model' => $model,
        'options' => [ // Options of the Kartik's FileInput widget
            'multiple' => false, // If you want to allow multiple upload, default to false
        ],
        'pluginOptions' => [ // Plugin options of the Kartik's FileInput widget
            'maxFileCount' => 1, // Client max files
            'language' => 'sv'
        ]
    ]) ?>

    <?= $form->field($model, 'date')->widget( DatePicker::classname(), [
        'options' => ['placeholder' => 'Välj datum *'], //html options
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'size' => 'sm',
        'pluginOptions' => [
            'autoclose' => true,
//            'format' => 'mm-dd-yyyy',
        ]
    ])->label(false) ?>

    <?= $form->field($model, 'company_id')->hiddenInput(['value' => $_GET['company_id']])->label(false)?>

    <?= $form->field($model, 'status')->dropDownList(['0'=>'Ej betald','1' => 'Betald']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

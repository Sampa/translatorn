<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'type')->radioList([
        '1' => Yii::t('orders', 'On phone'),
        '2' => Yii::t('orders', 'On site'),
    ],['class'=>'radio' ]) ?>

    <?= $form->field($model, 'language')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datetime')->textInput() ?>

    <?= $form->field($model, 'reference')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'made_by')->textInput(['maxlength' => true]) ?>


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

    <?= $form->field($model, 'bill_sent')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'bill_paid')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'bill_sent_date')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'bill_paid_date')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'created_date')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value' => $model->user_id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Book'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

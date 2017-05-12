<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrdersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'reference') ?>

    <?= $form->field($model, 'language') ?>

    <?= $form->field($model, 'location') ?>

    <?= $form->field($model, 'bill_sent') ?>

    <?php // echo $form->field($model, 'bill_paid') ?>

    <?php // echo $form->field($model, 'bill_sent_date') ?>

    <?php // echo $form->field($model, 'bill_paid_date') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'datetime') ?>

    <?php // echo $form->field($model, 'made_by') ?>

    <?php // echo $form->field($model, 'bill_ref') ?>

    <?php // echo $form->field($model, 'other_type') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'org_nr') ?>

    <?php // echo $form->field($model, 'message') ?>

    <?php // echo $form->field($model, 'made_by_email') ?>

    <?php // echo $form->field($model, 'bill_location') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'company_name') ?>

    <?php // echo $form->field($model, 'time_end') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('orders', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('orders', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

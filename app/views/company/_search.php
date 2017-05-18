<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CompanySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?php //echo $form->field($model, 'id') ?>

    <?= $form->field($model, 'client_ref') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'org_nr') ?>

    <?= $form->field($model, 'street') ?>

    <?php  echo $form->field($model, 'zip') ?>

    <?php  echo $form->field($model, 'country') ?>

    <?php  echo $form->field($model, 'email') ?>

    <?php  echo $form->field($model, 'phone') ?>

    <?php  echo $form->field($model, 'city') ?>

    <?php  echo $form->field($model, 'extra_1') ?>

    <?php  echo $form->field($model, 'extra_2') ?>

    <?php  echo $form->field($model, 'extra_3') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('company', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('company', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

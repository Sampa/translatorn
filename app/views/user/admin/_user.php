<?php

/**
 * @var yii\widgets\ActiveForm    $form
 * @var dektrium\user\models\User $user
 */
use app\models\Company;
?>

<?= $form->field($user, 'username')->textInput(['maxlength' => 25])->label('Användarnamn') ?>
<?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>
<?= $form->field($user, 'password')->passwordInput()->label('Lösenord') ?>
<?= $form->field($user, 'company_id')->dropDownList(Company::companyList(),[]) ?>
<?= $form->field($user, 'is_boss')->checkbox(['1' => Yii::t('app','Yes')])->label( Yii::t('app','Is boss') )?>



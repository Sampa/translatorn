<?php
use yii\helpers\Html;
use app\modules\akut\models\Akut;
use yii\widgets\ActiveForm;

$this->title = Yii::t('akut', 'View feedback');
$this->registerCss('.feedback-view dt{margin-bottom: 10px;}');

if($model->status == Akut::STATUS_ANSWERED) {
    $this->registerJs('$(".send-answer").click(function(){return confirm("'.Yii::t('easyii/akut', 'Are you sure you want to resend the answer?').'");})');
}
?>
<?= $this->render('_menu', ['noanswer' => $model->status == Akut::STATUS_ANSWERED]) ?>

<dl class="dl-horizontal feedback-view">
    <dt>Gjord av:</dt>
    <dd><?= $model->name ?></dd>

    <dt>E-post</dt>
    <dd><?= $model->email ?></dd>

    <?php if($this->context->module->settings['enablePhone']) : ?>
    <dt><?= Yii::t('akut', 'Phone') ?></dt>
    <dd><?= $model->phone ?></dd>
    <?php endif; ?>

    <?php if($this->context->module->settings['enableTitle']) : ?>
    <dt><?= Yii::t('akut', 'Company') ?></dt>
    <dd><?= $model->title ?></dd>
    <?php endif; ?>

    <dt>IP</dt>
    <dd><?= $model->ip ?> <a href="//freegeoip.net/?q=<?= $model->ip ?>" class="label label-info" target="_blank">info</a></dd>

    <dt><?= Yii::t('akut', 'Sent') ?></dt>
    <dd><?= Yii::$app->formatter->asDatetime($model->time, 'medium') ?></dd>

    <dt><?= Yii::t('akut', 'Translation should be made') ?></dt>
    <dd><?= $model->date ?></dd>

    <dt><?= Yii::t('akut', 'Start time') ?></dt>
    <dd><?= $model->time_start ?></dd>

    <dt><?= Yii::t('akut', 'Language') ?></dt>
    <dd><?= $model->language ?></dd>


    <dt><?= Yii::t('easyii', 'Text') ?></dt>
    <dd><?= nl2br($model->text) ?></dd>
</dl>

<hr>
<h2><small><?= Yii::t('akut', 'Answer') ?></small></h2>
<?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'answer_subject') ?>
    <?= $form->field($model, 'answer_text')->textarea(['style' => 'height: 250px']) ?>
    <?= Html::submitButton(Yii::t('easyii', 'Skicka'), ['class' => 'btn btn-success send-answer']) ?>
<?php ActiveForm::end() ?>
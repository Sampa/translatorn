<?php
use yii\helpers\Html;
use app\modules\job\models\Feedback;
use yii\widgets\ActiveForm;

$this->title = Yii::t('easyii/job', 'Se jobb inlägg');
$this->registerCss('.feedback-view dt{margin-bottom: 10px;}');

if($model->status == Feedback::STATUS_ANSWERED) {
    $this->registerJs('$(".send-answer").click(function(){return confirm("'.Yii::t('easyii/job', 'Are you sure you want to resend the answer?').'");})');
}
?>
<?= $this->render('_menu', ['noanswer' => $model->status == Feedback::STATUS_ANSWERED]) ?>

<dl class="dl-horizontal feedback-view">
    <dt><?= Yii::t('easyii', 'Name') ?></dt>
    <dd><?= $model->name ?></dd>

    <dt>E-post</dt>
    <dd><?= $model->email ?></dd>

    <dt>A- Modersmål</dt>
    <dd><?= $model->language ?></dd>

    <dt>B- Språk</dt>
    <dd><?= $model->language2 ?></dd>

    <dt>C- Språk </dt>
    <dd><?= $model->language3 ?></dd>

    <dt>Tolkutbildning</dt>
    <dd><?= $model->education ?></dd>

    <?php if($this->context->module->settings['enablePhone']) : ?>
    <dt><?= Yii::t('easyii/job', 'Phone') ?></dt>
    <dd><?= $model->phone ?></dd>
    <?php endif; ?>

    <?php if($this->context->module->settings['enableTitle']) : ?>
    <dt><?= Yii::t('easyii', 'Erfarenhet som tolk (antal år) *') ?></dt>
    <dd><?= $model->title ?></dd>
    <?php endif; ?>

    <dt><?= Yii::t('easyii', 'Meddelande') ?></dt>
    <dd><?= nl2br($model->text) ?></dd>

    <dt>IP</dt>
    <dd><?= $model->ip ?> <a href="//freegeoip.net/?q=<?= $model->ip ?>" class="label label-info" target="_blank">info</a></dd>

    <dt><?= Yii::t('easyii', 'Date') ?></dt>
    <dd><?= Yii::$app->formatter->asDatetime($model->time, 'medium') ?></dd>


</dl>

<hr>
<h2><small><?= Yii::t('easyii/job', 'Answer') ?></small></h2>
<?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'answer_subject') ?>
    <?= $form->field($model, 'answer_text')->textarea(['style' => 'height: 250px']) ?>
    <?= Html::submitButton(Yii::t('easyii', 'Skicka'), ['class' => 'btn btn-success send-answer']) ?>
<?php ActiveForm::end() ?>
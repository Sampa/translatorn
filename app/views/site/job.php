<?php
use yii\easyii\modules\page\api\Page;
use yii\easyii\modules\text\api\Text;
use yii\helpers\Html;
use app\modules\job\api\Feedback;

$page = Page::get('page-akut');

$this->title = $page->seo('title', 'Söker du jobb?');
?>

<div class="greenbg translatorn-job-page">
    <div class="container">
        <div class="col-xs-5 col-xs-push-1 white">
            <h3><?= Text::get('job-form-title') ?></h3>
            <?php if(Yii::$app->request->get(Feedback::SENT_VAR)) : ?>
                <h4 class="text-success"><i class="glyphicon glyphicon-ok"></i> Meddelandet skickat.</h4>
            <?php else : ?>
                <?= Feedback::form() ?>
            <?php endif; ?>
        </div>
        <div class="col-xs-2 col-xs-push-3 col-md-push-1  translatorn-page-summary translatorn-page-job-summary">
            <h1><?= Text::get('job-welcome-title') ?></h1>
            <p><?= Text::get('job-welcome-desc') ?></p>
        </div>
    </div>
</div>

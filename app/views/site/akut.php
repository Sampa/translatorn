<?php
use yii\easyii\modules\page\api\Page;
use yii\easyii\modules\text\api\Text;
use yii\helpers\Html;
use app\modules\akut\api\Akut;


$page = Page::get('page-akut');

$this->title = $page->seo('title', $page->model->title);
?>
<div class="greenbg">

    <div class="col-md-2 col-md-push-3 translatorn-page-summary translatorn-page-akut-summary">
        <h1><?= Text::get('akut-welcome-title') ?></h1>
        <p><?= Text::get('akut-welcome-desc') ?></p>
    </div>
    <div class="container">
        <div class="col-md-4 col-md-push-3">
            <h3 class="white"><?= Text::get('akut-form-title') ?></h3>
            <?php if(Yii::$app->request->get(Akut::SENT_VAR)) : ?>
                <h4 class="text-success"><i class="glyphicon glyphicon-ok"></i> Meddelandet skickat.</h4>
            <?php else : ?>
                <?= Akut::form() ?>
            <?php endif; ?>
        </div>
    </div>
</div>




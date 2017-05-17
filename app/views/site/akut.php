<?php
use yii\easyii\modules\page\api\Page;
use yii\easyii\modules\text\api\Text;
use yii\helpers\Html;
use app\modules\akut\api\Akut;


//$page = Page::get('page-akut');

$this->title = "Akut förfrågan"; //$page->seo('title', $page->model->title);
?>
<div class="greenbg">
    <div class="row">
        <div class="container translatorn-page-akut-summary">
            <div class="col-xs-2 col-xs-push-0 translatorn-page-summary " style="">
                <h1><?= Text::get('akut-welcome-title') ?></h1>
                <p><?= Text::get('akut-welcome-desc') ?></p>
            </div>
            <div class="col-xs-4 col-md-4">
                <h3 class="white"><?= Text::get('akut-form-title') ?></h3>
                <?php if(Yii::$app->request->get(Akut::SENT_VAR)) : ?>
                    <h4 class="text-success"><i class="glyphicon glyphicon-ok"></i> Meddelandet skickat.</h4>
                <?php else : ?>
                    <?= Akut::form() ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>



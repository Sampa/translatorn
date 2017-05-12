<?php
use yii\easyii\modules\page\api\Page;
use yii\easyii\modules\text\api\Text;
use yii\helpers\Html;

$page = Page::get('page-index');

$this->title = $page->seo('title', $page->model->title);
?>
<div class="greenbg">

    <div class="col-md-2 col-md-push-3 translatorn-page-summary translatorn-page-akut-summary">
        <h1><?= Text::get('akut-welcome-title') ?></h1>
        <p><?= Text::get('akut-welcome-desc') ?></p>
    </div>
    <div class="container">
        <div class="col-md-4 col-md-push-3" style="border: 1px solid green;">
            form
        </div>
    </div>
</div>




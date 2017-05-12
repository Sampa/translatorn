<?php
use yii\easyii\modules\page\api\Page;
use yii\easyii\modules\text\api\Text;
use yii\helpers\Html;
use yii\easyii\modules\feedback\api\Feedback;

$page = Page::get('page-index');

$this->title = $page->seo('title', $page->model->title);
?>
<div class="container row translatorn-content-wrapper" >
        <div class="col-md-2  translatorn-page-summary">
            <h1><?= Text::get('index-welcome-title') ?></h1>
        </div>
            <div class="container" id="translatorn-index-content">

                <div class="col-md-4" >
                    <p><?= $page->text ?></p>
                </div>
                <!-- form side info -->
                <div class="col-md-3 translatorn-index-side">
                    <h1><?= Text::get('index-side-title') ?></h1>
                    <p><?= Text::get('index-side-desc') ?></p>
                </div>
            </div>
        <!-- page footer -->
        <?= $this->render('/site/_index',[]);?>
</div>




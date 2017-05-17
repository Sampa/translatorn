<?php
use yii\easyii\modules\page\api\Page;
use yii\easyii\modules\text\api\Text;
use yii\helpers\Html;
use yii\easyii\modules\feedback\api\Feedback;

$page = Page::get('page-index');

$this->title = $page->seo('title', $page->model->title);
?>
<div  id="translatorn-index-content"  >
        <div class="col-xs-2 col-xs-push-0 col-md-2  col-md-push-0 translatorn-page-summary">
            <h1><?= Text::get('index-welcome-title') ?></h1>
            <p><?= Text::get('index-welcome-desc') ?></p>
        </div>
        <div class="col-xs-9 row" >
            <div class="col-xs-5 col-xs-push-0 col-md-push-0 col-md-7" >
                    <p><?= $page->text ?></p>
            </div>
            <!-- form side info -->
            <div class="col-xs-5 translatorn-index-side" >
                <h1><?= Text::get('index-contact-title');?></h1>
                <p><?= Text::get('index-side-desc') ?></p>
                <p><?= Text::get('index-contact-name');?></p>
                <p><?= Text::get('index-contact-streetzip');?></p>
                <p><?= Text::get('index-contact-city');?></p>
                <p><?= Text::get('index-contact-phone');?></p>
                <p><?= Text::get('index-contact-mobile');?></p>
            </div>
        </div>
</div>
<!-- page footer -->

<?= $this->render('/site/_index',[]);?>




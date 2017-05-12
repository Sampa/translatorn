<?php
use yii\easyii\modules\text\api\Text;
use yii\easyii\modules\feedback\api\Feedback;
?>

<!-- page footer -->
<div class="translator-page-index-footer">
    <div class="col-md-12">
        <div class="col-md-8">
            <h1><?= Text::get('index-content-footer') ?></h1>
        </div>
        <div class="col-md-3 col-push-2 image247">
            <img src="/image/247.png">
        </div>
    </div>
</div>
<div class=" translatorn-page-index-contactAbout">
    <!-- ABOUT -->
    <div class="col-md-7 translator-page-index-about-us">
        <h1><?= Text::get('index-about-title');?></h1>
        <p><?= Text::get('index-about-text');?></p>
    </div>
    <!-- CONTACT INFO -->
    <div class="col-md-4 col-md-push-1 translator-page-index-contact-info">
        <h1><?= Text::get('index-contact-title');?></h1>
        <p><?= Text::get('index-contact-name');?></p>
        <p><?= Text::get('index-contact-streetzip');?></p>
        <p><?= Text::get('index-contact-city');?></p>
        <p><?= Text::get('index-contact-phone');?></p>
        <p><?= Text::get('index-contact-mobile');?></p>
        <?php if(Yii::$app->request->get(Feedback::SENT_VAR)) : ?>
            <h4 class="text-success"><i class="glyphicon glyphicon-ok"></i> Meddelandet skickat.</h4>
        <?php else : ?>
            <?= Feedback::form() ?>
        <?php endif; ?>
    </div>
</div>
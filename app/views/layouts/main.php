<?php
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use yii\helpers\Html;
use yii\easyii\modules\text\api\Text;

?>
<?php $this->beginContent('@app/views/layouts/base.php'); ?>
<div id="translatorn-head" class="row">
    <div class="col-md-4 col-md-push-2 logo">
        <img src="/image/logo_black.png" width="58" height="58">
<!--        <img src="http://translatorn.se/____impro/1/onewebmedia/LOGA3.png?etag=W%2F%22d893-590d2d5b%22&amp;sourceContentType=image%2Fpng&amp;ignoreAspectRatio&amp;resize=58%2B58">-->
        <a href="<?=Yii::$app->homeUrl?>" title="Hem">
            <h1><span class="" style="font-size:32px;"><?= Text::get('layout-top-name') ?></span></h1>
        </a>

        <p><span style="font-size:13px;">I VÄST</span></p>
    </div>
    <!-- phone number and img -->
    <div class="col-md-4 col-md-push-4 phone" style="">
        <img data-scalestrategy="crop" width="15" height="38" src="//translatorn.se/onewebstatic/3503fff449.png" srcset="//translatorn.se/onewebstatic/3503fff449.png 1x, //translatorn.se/onewebstatic/81b2a0a65a.png 2x, //translatorn.se/onewebstatic/cf204352a6.png 3x, //translatorn.se/onewebstatic/6da69c16ae.png 4x">
        <h2>
            <span style="font-weight:normal;"><?= Text::get('layout-top-phone') ?></span>
        </h2>
    </div>
    <!-- Logout -->
    <?php if( Yii::$app->user->can('customer') && !Yii::$app->user->can('manageSite')): ?>
    <div id="logout" class="pull-right">

        <?= Html::a(Html::tag('span','', ['class'=>'glyphicon glyphicon-log-out']) . ' ' .
            Yii::t('app','Sign out') , ['//user/security/logout'],['class' => 'btn btn-small','data-method'=>'post']) ?>
        <?php
//        echo Html::a(Html::tag('span','', ['class'=>'glyphicon glyphicon-user']) . ' ' .
//            Yii::t('app','Fakturor') , ['//profile?id='.Yii::$app->user->id],['class' => 'btn btn-small','data-method'=>'post']) ?>
    </div>
    <?php endif; ?>
</div>
<nav class="navbar navbar-default translatorn-menu col-md-12">
    <div class="container">
        <div class="col-md-11 col-md-push-1" id="navbar-menu">
            <?php
                $bookImg = Html::tag('div','',['class' => 'book_icon']);
//                    '<img data-scalestrategy="crop" height="144" src="//translatorn.se/____impro/1/onewebmedia/kalender%20vit%202.png"
//style="background-color: rgba(0,0,0,0)">';
                $akutImg = Html::tag('div', '', ['class' => 'akut_icon']);
                $loginImg = '<img data-scalestrategy="crop" height="144" src="//translatorn.se/onewebstatic/aab87fd3f0.png" srcset="//translatorn.se/onewebstatic/aab87fd3f0.png 1x, //translatorn.se/onewebstatic/01c1532617.png 2x, //translatorn.se/onewebstatic/01c1532617.png 3x, //translatorn.se/onewebstatic/01c1532617.png 4x" style="display:block;">';
                $jobImg = '<img data-scalestrategy="crop"  height="144" src="//translatorn.se/onewebstatic/f984bb86a1.png" srcset="//translatorn.se/onewebstatic/f984bb86a1.png 1x, //translatorn.se/onewebstatic/cb8db6ac75.png 2x, //translatorn.se/onewebstatic/cb8db6ac75.png 3x, //translatorn.se/onewebstatic/cb8db6ac75.png 4x" style="display:block;">';

                $labelBook = $bookImg.
                    Html::tag('h4', yii::t('app','Book translator'), ['class' => 'menu-text']) .
                    Html::tag('span', yii::t('app','For customers'), ['class' => 'menu-sub-text']);
                $labelAkut = $akutImg.
                    Html::tag('h4', yii::t('app','Acute translator'), ['class' => 'menu-text']);
                $labelLogin = $loginImg.
                    Html::tag('h4', yii::t('app','Login'), ['class' => 'menu-text']);
                $labelJob = $jobImg.
                    Html::tag('h4', yii::t('app','Looking for a job?'), ['class' => 'menu-text']);
                $labelLogout = $loginImg;
                Yii::$app->user->isGuest ? '' :
                $labelLogout .= Html::tag('h4', 'Sign out' , ['class'=> 'menu-text'] );

                $labelBill = $loginImg. Html::tag('h4', 'Konto' , ['class'=> 'menu-text'] );

                $labelCompany = $loginImg. Html::tag('h4', 'Företag' , ['class'=> 'menu-text'] );
            //hem
            $labelHome = $bookImg.
                    Html::tag('h4', yii::t('app','Information'),['class' => 'menu-text']);

            $items = [
                [
                    'label' => $labelHome,
                    'url' => ['/site/index'],
                    'visible' => Yii::$app->user->isGuest || Yii::$app->user->can('manager'),
                    'options' => ['class' => 'book']
                ],
                [
                    'label' => $labelBook,
                    'url' => ['/orders/create'],
                    'visible' => Yii::$app->user->can('customer'),
                    'options' =>['class' => 'book']
                ],
                [
                    'label' => $labelAkut,
                    'url' => ['/site/akut'],
                    'options' =>['class' => 'akut']
                ],
                ['label' => $labelLogin, 'url' => ['/user/security/login'], 'visible' => Yii::$app->user->isGuest],

                ['label' =>$labelBill, 'url' => ['/user/'.Yii::$app->user->id],
                        'visible' =>Yii::$app->user->can('customer')],

                ['label' =>$labelCompany, 'url' => ['/company/'],
                        'visible' =>Yii::$app->user->can('manager')],

                ['label' => $labelJob, 'url' => ['/job/search']],
            ];
//                ['label' => $labelBook, 'url' => ['/order/create']]
            echo Menu::widget([
                'options' => ['class' => 'nav navbar-nav'],
                'encodeLabels' => false,
                'items' => $items,
            ]); ?>
        </div>
    </div>
</nav>
<div id="wrapper" class="container">
    <main>
        <div class="container row">
            <div class="col-md-10 col-md-push-1 translatorn-page">
                <?= $content ?>
            </div>
        </div>
        <div class="push"></div>
    </main>
</div>
<?php $this->endContent(); ?>

<?php
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use yii\helpers\Html;
use yii\easyii\modules\text\api\Text;

?>
<?php $this->beginContent('@app/views/layouts/base.php'); ?>

<div id="wrapper">
        <main class="center">
            <div id="translatorn-head" class="">
                <div class="col-xs-8 col-xs-push-0 logo" >
                    <img src="/image/logo_black.png" width="58" height="58">
                    <!--        <img src="http://translatorn.se/____impro/1/onewebmedia/LOGA3.png?etag=W%2F%22d893-590d2d5b%22&amp;sourceContentType=image%2Fpng&amp;ignoreAspectRatio&amp;resize=58%2B58">-->
                    <a href="<?=Yii::$app->homeUrl?>" title="Hem">
                        <h1><span class="" style="font-size:32px;"><?= Text::get('layout-top-name') ?></span></h1>
                    </a>

                    <p><span style="font-size:13px;">I VÄST</span></p>
                </div>
                <!-- phone number and img -->

                <div class="phone">
                    <img data-scalestrategy="crop" width="15" height="38" src="//translatorn.se/onewebstatic/3503fff449.png" srcset="//translatorn.se/onewebstatic/3503fff449.png 1x, //translatorn.se/onewebstatic/81b2a0a65a.png 2x, //translatorn.se/onewebstatic/cf204352a6.png 3x, //translatorn.se/onewebstatic/6da69c16ae.png 4x">
                    <h2>
                        <span style="font-weight:normal;"><?= Text::get('layout-top-phone') ?></span>
                    </h2>
                </div>
            </div>
        </main>

        <nav class="navbar navbar-default translatorn-menu" style="">
                <div id="navbar-menu" class="center">
                    <?php
                    $homeImg = Html::tag('div', '', ['class' => 'home_icon']);
                    $bookImg = Html::tag('div','',['class' => 'book_icon']);
                    $akutImg = Html::tag('div', '', ['class' => 'akut_icon']);
                    $loginImg = Html::tag('div', '', ['class' => 'login_icon']);
                    $jobImg = Html::tag('div', '', ['class' => 'job_icon']);

                    $labelBook = $bookImg.
                        Html::tag('h4', yii::t('app','Book translator'), ['class' => 'menu-text']) .
                        Html::tag('span', yii::t('app',''), ['class' => 'menu-sub-text']);

                    $labelAkut = $akutImg. Html::tag('h4', yii::t('app','Acute translator'), ['class' => 'menu-text']);

                    $labelLogin = $loginImg.
                        Html::tag('h4', yii::t('app','Login'), ['class' => 'menu-text']);

                    $labelJob = $jobImg.
                        Html::tag('h4', yii::t('app','Work with us'), ['class' => 'menu-text']);

                    $labelEditBook = $bookImg.
                        Html::tag('h4', yii::t('app','Edit book page'), ['class' => 'menu-text']);

                    $labelLogout = $loginImg;
                    Yii::$app->user->isGuest ? '' : $labelLogout .= Html::tag('h4', 'Sign out' , ['class'=> 'menu-text'] );

                    $labelBill = $loginImg.
                        Html::tag('h4', 'Konto' , ['class'=> 'menu-text'] );

                    $labelCompany = $loginImg.
                        Html::tag('h4', 'Företag' , ['class'=> 'menu-text'] );
                    //hem

                    $labelHome = $homeImg.
                        Html::tag('h4', yii::t('app','Om oss'),['class' => 'menu-text']);

                    $items = [
                        [
                            'label' => $labelHome,
                            'url' => ['/site/index'],
                            'visible' => Yii::$app->user->isGuest || Yii::$app->user->can('manager'),
                            'options' => ['class' => 'home']
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
                            'options' =>['class' => 'akut'],
                            'visible' => Yii::$app->user->isGuest
                        ],
                        [
                            'label' => $labelLogin,
                            'url' => ['/user/security/login'],
                            'visible' => Yii::$app->user->isGuest,
                            'options' =>['class' => 'login']
                        ],

                        [
                            'label' =>$labelBill,
                            'url' => ['/user/'.Yii::$app->user->id],
                            'visible' =>Yii::$app->user->can('customer'),
                            'options' =>['class' => 'login']
                        ],

                        [
                            'label' =>$labelCompany,
                            'url' => ['/company/'],
                            'visible' =>Yii::$app->user->can('manager'),
                            'options' =>['class' => 'login']
                        ],

                        [
                            'label' => $labelEditBook,
                            'url' => ['/orders/create'],
                            'visible' => Yii::$app->user->can('manager'),
                            'options' =>['class' => 'book']
                        ],

                        [
                            'label' => $labelJob,
                            'url' => ['/site/job'],
                            'visible' => !Yii::$app->user->can('customer'),
                            'options' =>['class' => 'job']
                        ],


                    ];
                    //                ['label' => $labelBook, 'url' => ['/order/create']]
                    echo Menu::widget([
                        'options' => ['class' => 'nav navbar-nav'],
                        'encodeLabels' => false,
                        'items' => $items,
                    ]); ?>
                </div>
        </nav>
        <div class="row center">
            <div class="" style=" width: 936px; margin: 0 auto;max-width:936px;">
                <?= $content ?>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>

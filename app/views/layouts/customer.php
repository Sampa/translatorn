<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\easyii\assets\AdminAsset;

$asset = AdminAsset::register($this);
$moduleName = $this->context->module->id;
?>
<?php $this->beginPage() ?>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::t('easyii', 'Control Panel') ?> - <?= Html::encode($this->title) ?></title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="<?= $asset->baseUrl ?>/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?= $asset->baseUrl ?>/favicon.ico" type="image/x-icon">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<h1>HEJ</h1>

<div id="admin-body">
    <div class="container">
        <div class="wrapper">
            <div class="header">
                <div class="logo">
                    <img src="<?= $asset->baseUrl ?>/img/logo_20.png">
                    <?= Yii::$app->user->identity->username;?>
                </div>
                <div class="nav col-md-3 col-md-push-5">
                    <a href="<?= Url::to(['/']) ?>">
                        <i class="glyphicon glyphicon-home"></i>
                        <?= Yii::t('easyii', 'Tillbaka') ?></a>
                    <a href="<?= Url::to(['/admin/sign/out']) ?>">
                        <i class="glyphicon glyphicon-log-out"></i>
                        <?= Yii::t('easyii', 'Logout') ?></a>
                </div>
            </div>
            <div class="main">
                 <div class="box sidebar" style="min-width: 200px;">
                     <a href="<?= Url::to(['/admin/default/profile?id='.Yii::$app->user->id]) ?>" class="menu-item">
                         <i class="glyphicon glyphicon-list-alt"></i>
                         <?= Yii::t('easyii', 'Bills') ?>
                     </a>
                    <!-- <a href="<?/*= Url::to(['/admin/default/create']) */?>" class="menu-item">
                         <i class="glyphicon glyphicon-plus"></i>
                         <?/*= Yii::t('easyii', 'Book') */?>
                     </a>-->
                </div>
                <div class="box content">
                    <div class="page-title">
                        <?= $this->title ?>
                    </div>
                    <div class="container-fluid">
                        <?php foreach(Yii::$app->session->getAllFlashes() as $key => $message) : ?>
                            <div class="alert alert-<?= $key ?>"><?= $message ?></div>
                        <?php endforeach; ?>
                        <?= $content ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\easyii\modules\page\api\Page;
use yii\easyii\modules\text\api\Text;
use yii\widgets\Pjax;
use yii\widgets\DetailView;

/**
 * @var \yii\web\View $this
 * @var \dektrium\user\models\Profile $profile
 */

$this->title = empty($profile->name) ? Html::encode($profile->user->username) : Html::encode($profile->name);
$this->params['breadcrumbs'][] = $this->title;
 if (!empty($profile->user->company->name))
     $company = $profile->user->company;
?>

<div class="greenbg row">
    <div class="col-xs-2 col-md-2 translatorn-page-summary translatorn-page-akut-summary" style="margin-left: 1px;">
        <h1><?= Text::get('profile-welcome-title') ?></h1>

        <p><?= Text::get('profile-welcome-desc') ?></p>

        <ul style="padding: 0; list-style: none outside none;">

            <?php if (!empty($profile->user->company->name)): ?>
            <li>
                <i class="glyphicon glyphicon-font text-muted"></i>
                <?php echo $company->name; ?>
            </li>
            <?php endif; ?>

            <?php if (!empty($profile->user->username)): ?>
                <li>
                    <?php
                        if(Yii::$app->user->id == $profile->user->id){
                            echo '<i class="glyphicon glyphicon-log-out text-muted"></i> ';
                            echo Html::a(Yii::t('app','Sign out') , ['//user/security/logout'],['class' => '','data-method'=>'post']);
                        }else {
                            echo '<i class="glyphicon glyphicon-user text-muted"></i>';
                            echo ' '. $profile->name;
                        }
                    ?>
                </li>
            <?php endif; ?>

            <?php if (!empty($profile->location)): ?>
                <li>
                    <i class="glyphicon glyphicon-map-marker text-muted"></i> <?= Html::encode($profile->location) ?>
                </li>
            <?php endif; ?>

            <?php if (!empty($profile->website)): ?>
                <li>
                    <i class="glyphicon glyphicon-globe text-muted"></i> <?= Html::a(Html::encode($profile->website), Html::encode($profile->website)) ?>
                </li>
            <?php endif; ?>

            <?php if (!empty($profile->public_email)): ?>
                <li>
                    <i class="glyphicon glyphicon-envelope text-muted"></i>
                    <?= Html::a(Html::encode($profile->public_email), 'mailto:' . Html::encode($profile->public_email)) ?>
                </li>
            <?php endif; ?>

            <li>
                <i class="glyphicon glyphicon-time text-muted"></i>
                <?= Yii::t('user', 'Skapad {0, date}', $profile->user->created_at) ?>
            </li>

        </ul>

        <?php if (!empty($profile->bio)): ?>
            <p><?= Html::encode($profile->bio) ?></p>
        <?php endif; ?>

        <!-- fakturor -->
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><?=Yii::t('app','Invoices') ?></div>

            <!-- Table -->
            <table class="table">
                <?php foreach ($invoiceDataProvider->getModels() as $model): ?>
                    <tr class="green"><td ><?=$model->fileLink?></td><td><?=$model->getFormatDate("j M");?></td></tr>
                <?php endforeach;?>
            </table>
        </div>

    </div>
    <div class="container">
        <div class="col-xs-9 col-md-7" style="color:#fff; min-height: 400px; height: 100%; margin-left:10px;">
            <h2><?= Text::get('profile-content-title') ?></h2>
            <p><?= Text::get('profile-content-desc') ?></p>
            <div id="user-translatorn-bills" class="container well green col-xs-12 col-md-12" style="background-color: rgba(255,255,2550,1)">

                <?php if(isset($companyInfo)){
                    echo $companyInfo;
                }?>
                <?php Pjax::begin(); ?>
                <?= \yii\grid\GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        [
                            'attribute' => 'bill_sent',
                            'value' => function ($model) {
                                if ($model->bill_sent) {
                                    return $model->billLink;
                                } else {
                                    return 'Ej klar';
                                }
                            },
                            'format' => 'html',
                            'options' => ['class' => 'col-md-3'],
                        ],
                        [
                            'attribute' => 'bill_ref',
                            'options' => ['class' => 'col-md-3'],
                        ],
//                       [
//                            'attribute' => 'time_start',
//                            'value' => function($model){
//                                return $model->timeStart;
//                            }
//                       ],
//                        'bill_location',
                        'company_name',
                         [
                             'attribute' => 'user_id',
                             'filter' => function($model) {
                                 return $model->getUserList();
                             },
                             'value' => function($model){
                                 return $model->user->username;
                             },
                             'options' => ['class' => 'col-md-1'],
//                             'visible' => !$profile->user->is_boss == null,
                         ],
                         [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Hantera',
//                             'linkOptions' => ['hej'],
                             'options' => ['class' => 'col-md-1'],
                            'template' => '{view} ',
                            'urlCreator' => function ($action,$model, $key, $index, $column) {
                                return  \yii\helpers\Url::to(['/orders/view/','id'=>$model->id, 'konto'=>1]);
                            },
//                            'format' => 'html'
                        ],
                    ],
                ]); ?>
                <?php Pjax::end(); ?>

            </div>
        </div>
    </div>
</div>
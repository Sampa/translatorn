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


/**
 * @var \yii\web\View $this
 * @var \yii\data\ActiveDataProvider $dataProvider
 * @var \dektrium\user\models\UserSearch $searchModel
 */

$this->title = Yii::t('app', 'Manage users');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<?= $this->render('/admin/_menu'); ?>

<?= $this->render('/admin/_gridview',['searchModel' => $searchModel, 'dataProvider' => $dataProvider]); ?>



<?php /** ADDITIONAL COLUMNS OPTIONAL **/
/* [
          'attribute' => 'registration_ip',
          'value' => function ($model) {
              return $model->registration_ip == null
                  ? '<span class="not-set">' . Yii::t('app', '(not set)') . '</span>'
                  : $model->registration_ip;
          },
          'format' => 'html',
      ],*/
/*[
    'attribute' => 'created_at',
    'value' => function ($model) {
        if (extension_loaded('intl')) {
            return Yii::t('app', '{0, date, MMMM dd, YYYY HH:mm}', [$model->created_at]);
        } else {
            return date('Y-m-d G:i:s', $model->created_at);
        }
    },
],*/

/*[
    'header' => Yii::t('app', 'Confirmation'),
    'value' => function ($model) {
        if ($model->isConfirmed) {
            return '<div class="text-center">
                        <span class="text-success">' . Yii::t('app', 'Confirmed') . '</span>
                    </div>';
        } else {
            return Html::a(Yii::t('app', 'Confirm'), ['confirm', 'id' => $model->id], [
                'class' => 'btn btn-xs btn-success btn-block',
                'data-method' => 'post',
                'data-confirm' => Yii::t('app', 'Are you sure you want to confirm this user?'),
            ]);
        }
    },
    'format' => 'raw',
    'visible' => Yii::$app->getModule('user')->enableConfirmation,
],*/
/*  [
      'header' => Yii::t('app', 'Block status'),
      'value' => function ($model) {
          if ($model->isBlocked) {
              return Html::a(Yii::t('app', 'Unblock'), ['block', 'id' => $model->id], [
                  'class' => 'btn btn-xs btn-success btn-block',
                  'data-method' => 'post',
                  'data-confirm' => Yii::t('app', 'Are you sure you want to unblock this user?'),
              ]);
          } else {
              return Html::a(Yii::t('app', 'Block'), ['block', 'id' => $model->id], [
                  'class' => 'btn btn-xs btn-danger btn-block',
                  'data-method' => 'post',
                  'data-confirm' => Yii::t('app', 'Are you sure you want to block this user?'),
              ]);
          }
      },
      'format' => 'raw',
  ],*/
?>
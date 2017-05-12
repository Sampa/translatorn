<?php
/**
 * Created by PhpStorm.
 * User: Happyjuiced
 * Date: 2017-05-11
 * Time: 15:01
 */
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php Pjax::begin() ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'layout' => "{items}\n{pager}",
    'columns' => [
        [
            'attribute' => 'username',
            'format' => 'Html',
            'value' => function ($model) {
                if ($model->username === 'root' && !Yii::$app->user->can('root'))
                    return $model->username;
                return Html::a($model->username, Url::to(['/user/profile/show', 'id' => $model->id]), []);
            }
        ],
        'email:email',
        [
            'attribute' => 'last_login_at',
            'value' => function ($model) {
                if (!$model->last_login_at || $model->last_login_at == 0) {
                    return Yii::t('user', 'Never');
                } else if (extension_loaded('intl')) {
                    return Yii::t('app', '{0, date, MMMM dd, YYYY HH:mm}', [$model->last_login_at]);
                } else {
                    return date('Y-m-d G:i:s', $model->last_login_at);
                }
            },
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{switch} {resend_password} {update} {delete}',
            'buttons' => [
                'resend_password' => function ($url, $model, $key) {
                    if ($model->username === 'root' && !Yii::$app->user->can('root')) {
                        return '';
                    }
                    if (!$model->isAdmin) {
                        return '
                    <a data-method="POST" data-confirm="' . Yii::t('app', 'Are you sure?') . '" href="' . Url::to(['resend-password', 'id' => $model->id]) . '">
                    <span title="' . Yii::t('user', 'Generate and send new password to user') . '" class="glyphicon glyphicon-envelope">
                    </span> </a>';
                    }
                },
                'update' => function ($url, $model, $key) {
                    if ($model->username === 'root' && !Yii::$app->user->can('root')) {
                        return '';
                    } else {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            "/user/admin/update?id=1", ['title' => "Uppdatera", 'aria-label' => "Uppdatera", 'data-pjax' => "0"]);
                    }
                },
                'delete' => function ($url, $model, $key) {
                    if ($model->username === 'root' && !Yii::$app->user->can('root')) {
                        return '';
                    } else {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                            "/user/admin/delete?id=1",
                            ['title' => "Radera", 'aria-label' => "Radera", 'data-pjax' => "0", 'data-confirm' => "Är du säker på att du vill radera objektet?"]);
                    }
                },

                /*'switch' => function ($url, $model) {
                    if($model->id != Yii::$app->user->id && Yii::$app->getModule('user')->enableImpersonateUser) {
                        return Html::a('<span class="glyphicon glyphicon-user"></span>', ['/user/admin/switch', 'id' => $model->id], [
                            'title' => Yii::t('app', 'Become this user'),
                            'data-confirm' => Yii::t('app', 'Are you sure you want to switch to this user for the rest of this Session?'),
                            'data-method' => 'POST',
                        ]);
                    }
                }*/
            ]
        ],
    ],
]); ?>

<?php Pjax::end() ?>

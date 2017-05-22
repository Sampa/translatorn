<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = $model->bill_ref;
$this->params['breadcrumbs'][] = ['label' => Yii::t('orders', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <p>
        <?php if( Yii::$app->user->can('manager') ): ?>
            <?= Html::a(Yii::t('orders', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('orders', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif; ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'language',
//            'location',
            [
                'attribute'=> 'bill_sent',
                'value' => function($model){
                    if( isset($model->files[0]) ){
                        return $model->billLink;
                    } else{
                        return 'Ej klar';
                    }
                },
                'format' => 'html',
            ],
            'created_date',
            [
                'attribute' => 'type',
                'value' => function($model){
                    return $model->typeAsText;
                }
            ],
            'other_type',
            'made_by',
            'bill_ref',
            'phone',
            'org_nr',
            'message:ntext',
            'made_by_email:email',
            'bill_location',
            'email:email',
            'company_name',
            [
                'attribute' => 'time_start',
                'value' => $model->timeStart
            ],
            [
                'attribute' => 'time_end',
                'value' => $model->timeEnd
            ],
            [
                'attribute' => 'date',
                'value' => $model->dayMonth
            ],
            //            'reference',
            //            'bill_paid',
            //            'bill_sent_date',
            //            'bill_paid_date',
            //            'user_id',
        ],
    ]) ?>

</div>

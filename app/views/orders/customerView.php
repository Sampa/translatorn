<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = $model->bill_ref;
$this->params['breadcrumbs'][] = ['label' => Yii::t('orders', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="greenbg" style="padding: 20px; color:#fff;">
    <h1>Detaljer för <?=$model->bill_ref;?></h1>
    <div class="orders-view well green">
        <?= DetailView::widget([
            'model' => $model,
            'options' =>  ['class' =>'table table-striped table-bordered detail-view'] ,
            'attributes' => [
                'language',
    //            'location',
                [
                    'attribute'=> 'bill_sent',
                    'value' => function($model){
                        if( $model->bill_sent ){
                            return $model->billLink;
                        } else{
                            return 'Ej klar';
                        }
                    },
                    'format' => 'html',
                ],
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
                'message:text',
                'made_by_email',
//                'bill_location',
                'email',
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
</div>
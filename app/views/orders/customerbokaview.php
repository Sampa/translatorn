<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = $model->bill_ref;
$this->params['breadcrumbs'][] = ['label' => Yii::t('orders', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="" style="padding: 20px; color:##fff;">
    <div class="orders-view">
            <h1>Tack för din bokning!</h1>
        <p>

        </p>
        <?= DetailView::widget([
            'model' => $model,
            'options' =>  ['class' =>'table  table-bordered detail-view'] ,
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
                'message:ntext',
                'made_by_email',
                'bill_location',
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
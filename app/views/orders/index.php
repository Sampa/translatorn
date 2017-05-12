<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('orders', 'All Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?php //echo Html::a(Yii::t('orders', 'Create Orders'), ['create'], ['class' => 'btn btn-success']) ?>

    <p>
        Lägg till en kostnadsräkning eller redigera inkorrekt information om en bokning genom att klicka på uppdatera.
    </p>
    <p>
        Visa all information som finns tillgänglig om en bokning genom att klicka på visa
    </p>
    <p>
        Filtrera bokningar i sökfälten
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'language',
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
             'date',
            [
                'attribute' => 'user_id',
                'filter' => function($model) {
                    return $model->getUserList();
                },
                'value' => function($model){
                    return $model->user->username;
                }
            ],
             'phone',
             'company_name',
            ['class' => 'yii\grid\ActionColumn', 'header' => 'Hantera'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\InvoiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = Yii::t('app', 'Invoices');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoice-index">


    <p>
        <?= Html::a(Yii::t('app', 'Create Invoice'), ['/invoice/create', 'company_id' => 1], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'file',
                'value' => function($model){
                    return $model->fileLink;
                },
                'format' => 'html',
                'options' => ['class' => 'col-md-3'],
            ],
            [
                'attribute' => 'date',
                'value' => function($model){
                    return $model->getFormatDate("m-d-Y");
                },
                'options' => ['class' => 'col-md-3'],
            ],
            [
                'attribute' => 'company_id',
                'value' => function($model){
                    return $model->company->name;
                },
                'visible' => !isset($inCompanyView),
            ],
            [
                'attribute' => 'status',
                'value' => function($model){
                    return $model->statusAsText;
                },
                'filter' => $searchModel->getStatusList(),
                'options' => ['class' => 'col-md-2'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action,$model, $key, $index, $column) {
                    return  \yii\helpers\Url::to(['/invoice/' . $action,'id'=>$model->id]);
                },
                'template' => '{view}{update}{delete}',
                'options' => ['class' => 'col-md-1'],
            ],
        ],
    ]); ?>
</div>

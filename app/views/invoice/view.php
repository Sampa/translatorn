<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Invoice */
$company = $model->company;
$this->title = 'Faktura för ' . $company->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Invoices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="invoice-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php

    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            [
                'attribute' => 'file',
                'value' => $model->fileLink,
                'format' => 'html',
            ],
            [
                'attribute' => 'date',
                'value' => $model->getFormatDate('d-m-Y'),
            ],
            [
                'attribute' => 'company_id',
                'value' => $company->name,
            ],
            [
               'attribute' => 'status',
               'value' => $model->statusAsText,
            ],
        ],
    ]) ?>

</div>

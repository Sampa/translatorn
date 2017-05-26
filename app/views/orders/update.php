<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = "Lägg till pdf och justera information";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="orders-update">

    <div id="ordersForm" class="orders-create">

    <?= $this->render('_updateForm', [
        'model' => $model,
    ]) ?>
    </div>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Company */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('company', 'Companies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view"> <!-- row -->

    <h3>Fakturor</h3>
    <?php Pjax::begin(); ?>
    <?= $this->render('/invoice/index',[
        'searchModel' => $invoiceSearchModel,
        'dataProvider' => $invoiceDataProvider,
        'inCompanyView' => true,
    ] );?>
    <?php Pjax::end(); ?>


<!--    <div class="col-md-5"> <!-- DETALJER -->
        <h3>Detaljer</h3>
        <?php if(Yii::$app->user->can('manager')): ?>
        <p>
            <?= Html::a(Yii::t('company', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('company', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('company', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        <?php endif; ?>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
    //            'id',
                'client_ref',
                'name',
                'org_nr',
                'street',
                'zip',
    //            'country',
                'email:email',
                'phone',
                'city',
                'extra_1:ntext',
                'extra_2:ntext',
                'extra_3:ntext',
            ],
        ]) ?>
<!--    </div> <!-- SLUT PÅ DETALJER -->
<!--    <div class="col-md-7">-->



    <h3>Användare som är knutna till det här företaget</h3>

    <?= $this->render('/user/admin/_gridview',[
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'inCompanyView' => true,
    ]); ?>

<!--    </div>-->

</div>

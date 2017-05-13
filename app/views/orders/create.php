<?php
use yii\easyii\modules\page\api\Page;
use yii\easyii\modules\text\api\Text;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = Yii::t('app', 'Create Orders');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$page = Page::get('page-index');

$this->title = $page->seo('title', $page->model->title);
?>
<div class="translatorn-content-wrapper">
    <div class="container" id="translatorn-orders-content">
        <!-- booking form -->
        <div class="col-md-8">

            <?php Pjax::begin(); ?>
            <div id="ordersForm" class="orders-create">
               <?= $this->render('_form', ['model' => $model]) ?>
            </div>
            <?= $ordersView ?>
            <?php Pjax::end(); ?>

        </div>
        <!-- form side info -->
        <div class="col-md-3 translatorn-orders-side">
            <h3><?= Text::get('orders-side-title') ?></h3>
            <div id="upcomingKR" class="col-md-12">
                <?php foreach ($latest as $order) : ?>
                    <div class="col-md-6"><?= $order->bill_ref ?></div>
                    <div class="col-md-5"><?= $order->billLink ?></div>
                <?php endforeach; ?>
            </div>
            <!--                <p>--><? //= Text::get('orders-side-desc') ?><!--</p>-->
        </div>
    </div>

    <?= $this->render('/site/_index', []); ?>
</div>



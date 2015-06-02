<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\ShippingOrder;
use app\models\ShippingOrderSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ShippingOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shipping Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipping-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'shipping_order_code',
            [
                'attribute' => 'applyUser.username',
                'label' => 'Apply User',
            ],
            [
                'attribute' => 'product.primary_name',
                'label' => 'Product',
            ],
            'quantity',
            [
                'attribute' => 'departDepot.name',
                'label' => 'Depart Depot',
            ],
            [
                'attribute' => 'arrivalDepot.name',
                'label' => 'Arrival Depot',
            ],
            // 'shipping_date',
            // 'arrival_date',
            [
                'attribute' => 'status',
                'value' => function ($model, $key, $index, $column) {
                    return ShippingOrder::shippingStatusDescription($model->status);
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>

</div>

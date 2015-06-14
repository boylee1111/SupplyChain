<?php

use yii\helpers\Html;

use app\models\ShippingOrder;
use app\models\ShippingOrderSearch;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ShippingOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shipping Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipping-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ExportMenu::widget([
            'dataProvider' => $dataProvider,
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
                    [
                        'attribute' => 'shipping_date',
                        'format' => ['date', 'php:Y-m-d']
                    ],
                    [
                        'attribute' => 'arrival_date',
                        'format' => ['date', 'php:Y-m-d']
                    ],
                    [
                        'attribute' => 'status',
                        'value' => function ($model, $key, $index, $column) {
                            return ShippingOrder::shippingStatusDescription($model->status);
                        },
                    ],
                ],
            'fontAwesome' => true,
        ]); ?>
        <p></p>

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

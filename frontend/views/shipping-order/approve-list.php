<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\ShippingOrder;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ShippingOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Approve List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipping-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterRowOptions' => [
            'style' => 'display: none',
        ],
        
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

            // ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {approve} {reject}',
                'buttons' => [
                    'approve' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-ok"></span>', ['approve', 'id' => $model->shipping_order_id], [
                            'data' => [
                                'confirm' => 'Are you sure you want to approve this shipping order?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                    'reject' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-remove"></span>', ['reject', 'id' => $model->shipping_order_id], [
                            'data' => [
                                'confirm' => 'Are you sure you want to reject this shipping order?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>

</div>

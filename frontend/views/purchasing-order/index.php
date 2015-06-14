<?php

use yii\helpers\Html;

use app\models\PurchasingOrder;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PurchasingOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Purchasing Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchasing-order-approval-list">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => [            
                    'purchasing_order_code',
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
                        'attribute' => 'destinationDepot.name',
                        'label' => 'Destination Depot',
                    ],
                    [
                        'attribute' => 'apply_date',
                        'format' => ['date', 'php:Y-m-d']
                    ],
                    [
                        'attribute' => 'expect_arrival_date',
                        'format' => ['date', 'php:Y-m-d']
                    ],
                    [
                        'attribute' => 'arrival_date',
                        'format' => ['date', 'php:Y-m-d']
                    ],
                    [
                        'attribute' => 'status',
                        'value' => function ($model, $key, $index, $column) {
                            return PurchasingOrder::purchasingStatusDescription($model->status);
                        },
                    ],
                    'remarks',
                ],
            'fontAwesome' => true,
        ]); ?>
        <p></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'purchasing_order_code',
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
                'attribute' => 'destinationDepot.name',
                'label' => 'Destination Depot',
            ],
            // 'apply_date',
            // 'expect_arrival_date',
            // 'arrival_date',
            [
                'attribute' => 'status',
                'value' => function ($model, $key, $index, $column) {
                    return PurchasingOrder::purchasingStatusDescription($model->status);
                },
            ],
            // 'remarks',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>

</div>

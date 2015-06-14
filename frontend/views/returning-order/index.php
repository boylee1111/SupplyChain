<?php

use yii\helpers\Html;

use app\models\ReturningOrder;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReturningOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Returning Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="returning-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => [            
                    'returning_order_code',
                    [
                        'attribute' => 'applyUser.username',
                        'label' => 'Apply User',
                    ],
                    [
                        'attribute' => 'purchasingOrder.product.primary_name',
                        'label' => 'Product',
                    ],
                    'quantity',
                    [
                        'attribute' => 'apply_date',
                        'format' => ['date', 'php:Y-m-d']
                    ],
                    [
                        'attribute' => 'expect_returning_date',
                        'format' => ['date', 'php:Y-m-d']
                    ],
                    [
                        'attribute' => 'returning_date',
                        'format' => ['date', 'php:Y-m-d']
                    ],
                    [
                        'attribute' => 'status',
                        'value' => function ($model, $key, $index, $column) {
                            return ReturningOrder::returningStatusDescription($model->status);
                        },
                    ],
                    'reason',
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

            'returning_order_code',
            [
                'attribute' => 'applyUser.username',
                'label' => 'Apply User',
            ],
            [
                'attribute' => 'purchasingOrder.product.primary_name',
                'label' => 'Product',
            ],
            'quantity',
            // 'apply_date',
            // 'expect_returning_date',
            // 'returning_date',
            [
                'attribute' => 'status',
                'value' => function ($model, $key, $index, $column) {
                    return ReturningOrder::returningStatusDescription($model->status);
                },
            ],
            // 'reason',
            // 'remarks',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>

</div>

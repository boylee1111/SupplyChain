<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\PurchasingOrder;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PurchasingOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Purchasing Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchasing-order-approval-list">

    <h1><?= Html::encode($this->title) ?></h1>
    <br/>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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

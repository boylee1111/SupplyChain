<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\PurchasingOrder;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PurchasingOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Confirmation List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchasing-order-index">

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
            // 'arrival_date',
            [
                'attribute' => 'status',
                'value' => function ($model, $key, $index, $column) {
                    return PurchasingOrder::purchasingStatusDescription($model->status);
                },
            ],

            // ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-ok"></span>', ['confirm', 'id' => $model->purchasing_order_id], [
                            'data' => [
                                'confirm' => 'Are you sure you want to confirm this purchasing order in transaction?',
                                'method' => 'post',
                            ]]);
                    },
                ],
            ],
        ],
    ]); ?>

</div>

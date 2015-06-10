<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\ReturningOrder;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReturningOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Approve List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="returning-order-approval-list">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <br/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterRowOptions' => [
            'style' => 'display: none',
        ],
        
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
            // 'arrival_date',
            [
                'attribute' => 'status',
                'value' => function ($model, $key, $index, $column) {
                    return ReturningOrder::returningStatusDescription($model->status);
                },
            ],

            // ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {approve} {reject}',
                'buttons' => [
                    'approve' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-ok"></span>', ['approve', 'id' => $model->returning_order_id], [
                            'data' => [
                                'confirm' => 'Are you sure you want to approve this purchasing order?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                    'reject' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-remove"></span>', ['reject', 'id' => $model->returning_order_id], [
                            'data' => [
                                'confirm' => 'Are you sure you want to reject this purchasing order?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>

</div>

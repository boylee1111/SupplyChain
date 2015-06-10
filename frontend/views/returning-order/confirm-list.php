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
<div class="returning-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    </br>

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
                    return PurchasingOrder::purchasingStatusDescription($model->status);
                },
            ],

            // ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-ok"></span>', ['confirm', 'id' => $model->returning_order_id]);
                    },
                ],
            ],
        ],
    ]); ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReturningOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Returning Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="returning-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <br/>

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
            // 'expect_returning_date',
            // 'returning_date',
            // 'status',
            // 'reason',
            // 'remarks',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['/purchasing-order/view', 'id' => $model->purchasing_order_id]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-ok"></span>', ['apply', 'id' => $model->purchasing_order_id]);
                    },
                ],
            ],
        ],
    ]); ?>

</div>

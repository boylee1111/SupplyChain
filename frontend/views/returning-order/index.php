<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\ReturningOrder;

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

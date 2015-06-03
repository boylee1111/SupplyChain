<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PurchasingOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Purchasing Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchasing-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Purchasing Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'purchasing_order_id',
            'purchasing_order_code',
            'apply_user_id',
            'approval_user_id',
            'product_id',
            // 'quantity',
            // 'destination_depot_id',
            // 'apply_date',
            // 'expect_arrival_date',
            // 'arrival_date',
            // 'status',
            // 'remarks',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

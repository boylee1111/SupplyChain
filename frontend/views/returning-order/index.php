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

    <p>
        <?= Html::a('Create Returning Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'returning_order_id',
            'purchasing_order_id',
            'apply_user',
            'approve_user',
            'quantity',
            // 'apply_date',
            // 'expect_returning_date',
            // 'returning_date',
            // 'status',
            // 'reason',
            // 'remarks',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

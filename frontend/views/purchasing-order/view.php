<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PurchasingOrder */

$this->title = $model->purchasing_order_id;
$this->params['breadcrumbs'][] = ['label' => 'Purchasing Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchasing-order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->purchasing_order_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->purchasing_order_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'purchasing_order_id',
            'purchasing_order_code',
            'apply_user_id',
            'approval_user_id',
            'product_id',
            'quantity',
            'destination_depot_id',
            'apply_date',
            'expect_arrival_date',
            'arrival_date',
            'status',
            'remarks',
        ],
    ]) ?>

</div>

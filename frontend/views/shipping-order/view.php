<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use common\models\User;
use app\models\ShippingOrder;

/* @var $this yii\web\View */
/* @var $model app\models\ShippingOrder */

$this->title = 'Order: '.$model->shipping_order_code;
$this->params['breadcrumbs'][] = ['label' => 'Shipping Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->shipping_order_code;
?>
<div class="shipping-order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'shipping_order_code',
            [
                'attribute' => 'applyUser.username',
                'label' => 'Applied by',
            ],
            [
                'attribute' => 'approval_user_id',
                'value' => $model->approval_user_id != null ? User::findOne($model->approval_user_id)->username : 'not approve',
                'label' => 'Approved by'
            ],
            [
                'attribute' => 'product.primary_name',
                'label' => 'Product',
            ],
            'quantity',
            [
                'attribute' => 'departDepot.name',
                'label' => 'Depart Deport',
            ],
            [
                'attribute' => 'arrivalDepot.name',
                'label' => 'Arrival Deport',
            ],
            [
                'attribute' => 'apply_date',
                'format' => ['date', 'php:Y-m-d']
            ],
            [
                'attribute' => 'expect_depart_date',
                'format' => ['date', 'php:Y-m-d']
            ],
            [
                'attribute' => 'expect_arrival_date',
                'format' => ['date', 'php:Y-m-d']
            ],
            [
                'attribute' => 'shipping_date',
                'format' => ['date', 'php:Y-m-d']
            ],
            [
                'attribute' => 'arrival_date',
                'format' => ['date', 'php:Y-m-d']
            ],
            [
                'attribute' => 'status',
                'value' => ShippingOrder::shippingStatusDescription($model->status).($model->status == 8 | $model->status ? '. Applier notified already' : ''),
            ],
        ],
    ]) ?>

</div>

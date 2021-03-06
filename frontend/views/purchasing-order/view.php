<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use common\models\User;
use app\models\PurchasingOrder;

/* @var $this yii\web\View */
/* @var $model app\models\PurchasingOrder */

$this->title = $model->purchasing_order_code;
$this->params['breadcrumbs'][] = ['label' => 'Purchasing Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchasing-order-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <br/>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'purchasing_order_code',
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
                'label' => 'Product'
            ],
            'quantity',
            [
                'attribute' => 'destinationDepot.name',
                'label' => 'Destination Depot',
            ],
            [
                'attribute' => 'apply_date',
                'format' => ['date', 'php:Y-m-d']
            ],
            [
                'attribute' => 'expect_arrival_date',
                'format' => ['date', 'php:Y-m-d']
            ],
            [
                'attribute' => 'arrival_date',
                'format' => ['date', 'php:Y-m-d']
            ],
            [
                'attribute' => 'status',
                'value' => PurchasingOrder::purchasingStatusDescription($model->status).($model->status == 8 ? '. Applier notified already' : ''),
            ],
            'remarks',
        ],
    ]) ?>

</div>

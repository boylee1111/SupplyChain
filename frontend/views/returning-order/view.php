<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use common\models\User;
use app\models\ReturningOrder;

/* @var $this yii\web\View */
/* @var $model app\models\ReturningOrder */

$this->title = $model->returning_order_code;
$this->params['breadcrumbs'][] = ['label' => 'Returning Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="returning-order-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <br/>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'returning_order_code',
            // 'purchasing_order_id',
            [
                'attribute' => 'applyUser.username',
                'label' => 'Applied by',
            ],
            [
                'attribute' => 'approval_user_id',
                'value' => $model->approval_user_id != null ? User::findOne($model->approval_user_id)->username : 'not approve',
                'label' => 'Approved by'
            ],
            'purchasingOrder.quantity',
            [
                'attribute' => 'apply_date',
                'format' => ['date', 'php:Y-m-d']
            ],
            [
                'attribute' => 'expect_returning_date',
                'format' => ['date', 'php:Y-m-d']
            ],
            [
                'attribute' => 'returning_date',
                'format' => ['date', 'php:Y-m-d']
            ],
            [
                'attribute' => 'status',
                'value' => ReturningOrder::returningStatusDescription($model->status).($model->status == 8 ? '. Applier notified already' : ''),
            ],
            'reason',
            'remarks',
        ],
    ]) ?>

</div>

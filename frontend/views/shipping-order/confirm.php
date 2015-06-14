<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

use common\models\User;
use app\models\ShippingOrder;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\ShippingOrder */

$this->title = 'Confirm Shipping Order: ' . ' ' . $model->shipping_order_code;
$this->params['breadcrumbs'][] = ['label' => 'Shipping Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->shipping_order_code, 'url' => ['view', 'id' => $model->shipping_order_id]];
$this->params['breadcrumbs'][] = 'Confirm';
?>
<div class="shipping-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="shipping-order-form">

    <?php $form = ActiveForm::begin(); ?>

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
                'attribute' => 'arrival_date',
                'format' => ['date', 'php:Y-m-d']
            ],
            [
                'attribute' => 'status',
                'value' => ShippingOrder::shippingStatusDescription($model->status),
            ],
        ],
    ]) ?>

    <?= $form->field($model, 'shipping_date')->widget(DatePicker::className(), [
        'removeButton' => false,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd',
        ]
    ])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Confirm Shipping', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>

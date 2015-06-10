<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

use common\models\User;
use app\models\ReturningOrder;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\ShippingOrder */

$this->title = 'Confirm Returning Order: ' . ' ' . $model->returning_order_code;
$this->params['breadcrumbs'][] = ['label' => 'Returning Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->returning_order_code, 'url' => ['view', 'id' => $model->returning_order_id]];
$this->params['breadcrumbs'][] = 'Confirm';
?>
<div class="returning-order-confirm">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="returning-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'returning_order_code',
            [
                'attribute' => 'applyUser.username',
                'label' => 'Applied by',
            ],
            [
                'attribute' => 'approval_user_id',
                'value' => $model->approval_user_id != null ? User::findOne($model->approval_user_id)->username : 'not approve',
                'label' => 'Approved by',
            ],
            [
                'attribute' => 'purchasingOrder.product.primary_name',
                'label' => 'Product',
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
                'attribute' => 'status',
                'value' => ReturningOrder::returningStatusDescription($model->status),
            ],
        ],
    ]) ?>

    <?= $form->field($model, 'returning_date')->widget(DatePicker::className(), [
        'removeButton' => false,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd',
        ]
    ])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>

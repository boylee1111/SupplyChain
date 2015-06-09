<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

use common\models\User;
use app\models\PurchasingOrder;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\PurchasingOrder */

$this->title = 'Warehousing Purchasing Order: ' . ' ' . $model->purchasing_order_code;
$this->params['breadcrumbs'][] = ['label' => 'Purchasing Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->purchasing_order_code, 'url' => ['view', 'id' => $model->purchasing_order_id]];
$this->params['breadcrumbs'][] = 'Warehousing';
?>
<div class="purchasing-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="purchasing-order-form">

    <?php $form = ActiveForm::begin(); ?>

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
                'label' => 'Product',
            ],
            'quantity',
            [
                'attribute' => 'destinationDepot.name',
                'label' => 'Destination Deport',
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
                'value' => PurchasingOrder::purchasingStatusDescription($model->status),
            ],
        ],
    ]) ?>

    <?= $form->field($model, 'arrival_date')->widget(DatePicker::className(), [
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

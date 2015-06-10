<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

use common\models\User;
use app\models\ReturningOrder;
use app\models\PurchasingOrder;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\ReturningOrder */
/* @var $purchasingModel app\models\PurchasingOrder */

$this->title = 'Apply Returning Order: ' . ' ' . $purchasingModel->purchasing_order_code;
$this->params['breadcrumbs'][] = ['label' => 'Returning Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $purchasingModel->purchasing_order_code, 'url' => ['view', 'id' => $purchasingModel->purchasing_order_id]];
$this->params['breadcrumbs'][] = 'Confirm';
?>
<div class="returning-order-apply">

    <h1><?= Html::encode($this->title) ?></h1>
    <br/>

    <div class="returning-order-apply-form">

    <?php $form = ActiveForm::begin(); ?>

    <label class='control-label'>Discrepancy Order Information</label>
    <?= DetailView::widget([
        'model' => $purchasingModel,
        'attributes' => [
            'purchasing_order_code',
            [
                'attribute' => 'applyUser.username',
                'label' => 'Applied by',
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
                'attribute' => 'arrival_date',
                'format' => ['date', 'php:Y-m-d']
            ],
        ],
    ]) ?>

    <?= $form->field($model, 'expect_returning_date')->widget(DatePicker::className(), [
        'removeButton' => false,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd',
        ]
    ])?>

    <?= $form->field($model, 'reason')->textarea()->label('Returning Reason') ?>

    <?= $form->field($model, 'remarks')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>

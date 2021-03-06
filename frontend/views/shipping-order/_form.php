<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\models\Depot;
use app\models\Product;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\ShippingOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shipping-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'shipping_order_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_id')->dropdownList(
        ArrayHelper::map(Product::find()->all(), 'product_id', 'primary_name'), ['prompt' => 'Select shipping product'])->label('Shipping Product')
    ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'depart_depot_id')->dropdownList(
        ArrayHelper::map(Depot::find()->all(), 'depot_id', 'name'), ['prompt' => 'Select the departure depot'])->label('Depart Depot')
    ?>

    <?= $form->field($model, 'arrival_depot_id')->dropdownList(
        ArrayHelper::map(Depot::find()->all(), 'depot_id', 'name'), ['prompt' => 'Select the arrival depot'])->label('Destination')
    ?>

    <?= $form->field($model, 'expect_depart_date')->widget(DatePicker::className(), [
        'options' => [
            'placeholder' => 'Select the expect departure date ...',
        ],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd',
        ]
    ])?>

    <?= $form->field($model, 'expect_arrival_date')->widget(DatePicker::className(), [
        'options' => [
            'placeholder' => 'Select the expect arrival date ...',
        ],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd',
        ]
    ])?>

    <?= $form->field($model, 'remarks')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'name' => 'create-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

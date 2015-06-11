<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


use yii\helpers\ArrayHelper;
use app\models\Product;
use app\models\Depot;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\PurchasingOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchasing-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'purchasing_order_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_id')->dropdownList(
        ArrayHelper::map(Product::find()->all(), 'product_id', 'primary_name'))->label('Shipping Product')
    ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'destination_depot_id')->dropdownList(
        ArrayHelper::map(Depot::find()->all(), 'depot_id', 'name'), ['prompt' => 'Select the destination depot'])->label('Destination Depot')
    ?>

    <?= $form->field($model, 'expect_arrival_date')->widget(DatePicker::className(), [
        'options' => [
            'placeholder' => 'Select the expect arrival date ...',
        ],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd',
        ]
    ])?>

    <?= $form->field($model, 'remarks')->textArea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'name' => 'create-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PurchasingOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchasing-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'purchasing_order_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apply_user_id')->textInput() ?>

    <?= $form->field($model, 'approval_user_id')->textInput() ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'destination_depot_id')->textInput() ?>

    <?= $form->field($model, 'apply_date')->textInput() ?>

    <?= $form->field($model, 'expect_arrival_date')->textInput() ?>

    <?= $form->field($model, 'arrival_date')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

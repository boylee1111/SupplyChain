<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PurchasingOrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchasing-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'purchasing_order_id') ?>

    <?= $form->field($model, 'purchasing_order_code') ?>

    <?= $form->field($model, 'apply_user_id') ?>

    <?= $form->field($model, 'approval_user_id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'destination_depot_id') ?>

    <?php // echo $form->field($model, 'apply_date') ?>

    <?php // echo $form->field($model, 'expect_arrival_date') ?>

    <?php // echo $form->field($model, 'arrival_date') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

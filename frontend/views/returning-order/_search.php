<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReturningOrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="returning-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'returning_order_id') ?>

    <?= $form->field($model, 'purchasing_order_id') ?>

    <?= $form->field($model, 'apply_user') ?>

    <?= $form->field($model, 'approve_user') ?>

    <?= $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'apply_date') ?>

    <?php // echo $form->field($model, 'expect_returning_date') ?>

    <?php // echo $form->field($model, 'returning_date') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'reason') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

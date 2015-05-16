<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WarehouseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="warehouse-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'warehouse_id') ?>

    <?= $form->field($model, 'serial_number') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'short_name') ?>

    <?= $form->field($model, 'longitude') ?>

    <?= $form->field($model, 'altitude') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'warehouse_type_id') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'area') ?>

    <?php // echo $form->field($model, 'rent') ?>

    <?php // echo $form->field($model, 'summary_salary') ?>

    <?php // echo $form->field($model, 'max_quantity_limit') ?>

    <?php // echo $form->field($model, 'max_cost_limit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

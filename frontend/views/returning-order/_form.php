<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReturningOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="returning-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'purchasing_order_id')->textInput() ?>

    <?= $form->field($model, 'apply_user')->textInput() ?>

    <?= $form->field($model, 'approve_user')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'apply_date')->textInput() ?>

    <?= $form->field($model, 'expect_returning_date')->textInput() ?>

    <?= $form->field($model, 'returning_date')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

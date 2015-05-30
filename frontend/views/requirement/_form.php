<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Requirement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requirement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'requirement_time_limit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'requirement_cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_depot_id')->textInput() ?>

    <?= $form->field($model, 'end_depot_id')->textInput() ?>

    <?= $form->field($model, 'requirement_path')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

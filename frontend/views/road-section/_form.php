<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RoadSection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="road-section-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'serial_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'road_section_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time_cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'basic_cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'volume_based_cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weight_based_cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'minimum_volume_limit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maximum_volume_limit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'road_section_type_id')->textInput() ?>

    <?= $form->field($model, 'start_depot_id')->textInput() ?>

    <?= $form->field($model, 'end_depot_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransitPoint */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transit-point-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'depot_id')->textInput() ?>

    <?= $form->field($model, 'transit_point_type_id')->textInput() ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

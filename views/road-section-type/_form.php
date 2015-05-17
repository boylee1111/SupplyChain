<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RoadSectionType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="road-section-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'road_section_type_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\models\FactoryType;
use app\models\RoadSection;

/* @var $this yii\web\View */
/* @var $model app\models\Factory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'serial_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'altitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'factory_type_id')->dropDownList(
        ArrayHelper::map(FactoryType::find()->all(), 'factory_type_id', 'factory_type_name')
    )?>

    <?= $form->field($model, 'road_section_id')->dropDownList(
        ArrayHelper::map(RoadSection::find()->all(), 'road_section_id', 'name')
    )?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

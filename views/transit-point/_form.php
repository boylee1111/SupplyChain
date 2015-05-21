<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\models\TransitPointType;
use app\models\RoadSection;

/* @var $this yii\web\View */
/* @var $model app\models\TransitPoint */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transit-point-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'serial_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'altitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'transit_point_type_id')->dropDownList(
        ArrayHelper::map(TransitPointType::find()->all(), 'transit_point_type_id', 'transit_point_type_name')
    )?>

    <?= $form->field($model, 'road_section_id')->dropDownList(
        ArrayHelper::map(RoadSection::find()->all(), 'road_section_id', 'road_section_name')
    )?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

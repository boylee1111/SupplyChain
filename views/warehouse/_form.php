<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\models\WarehouseType;
use app\models\RoadSection;

/* @var $this yii\web\View */
/* @var $model app\models\Warehouse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="warehouse-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'serial_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'altitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'summary_salary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'max_quantity_limit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'max_cost_limit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'warehouse_type_id')->dropDownList(
        ArrayHelper::map(WarehouseType::find()->all(), 'warehouse_type_id', 'warehouse_type_name')
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

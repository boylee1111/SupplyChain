<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\models\RoadSectionType;
use app\models\Depot;

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

    <?= $form->field($model, 'remarks')->textArea(['maxlength' => true, 'rows' => 4]) ?>

    <?= $form->field($model, 'road_section_type_id')->dropdownList(
        ArrayHelper::map(RoadSectionType::find()->all(), 'road_section_type_id', 'road_section_type_name'))->label('Road Section Type')
    ?>

    <?= $form->field($model, 'start_depot_id')->dropdownList(
        ArrayHelper::map(Depot::find()->all(), 'depot_id', 'name'))->label('Start Depot')
    ?>

    <?= $form->field($model, 'end_depot_id')->dropdownList(
        ArrayHelper::map(Depot::find()->all(), 'depot_id', 'name'))->label('End Depot')
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

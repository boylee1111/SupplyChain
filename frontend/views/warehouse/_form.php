<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\models\WarehouseType;

/* @var $this yii\web\View */
/* @var $model app\models\Warehouse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="warehouse-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($depot, 'serial_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($depot, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($depot, 'short_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($depot, 'longitude')->textInput() ?>

    <?= $form->field($depot, 'altitude')->textInput() ?>

    <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'summary_salary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'max_quantity_limit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'max_cost_limit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'warehouse_type_id')->dropDownList(
        ArrayHelper::map(WarehouseType::find()->all(), 'warehouse_type_id', 'warehouse_type_name'))->label('Warehouse Type')
    ?>

    <?= $form->field($model, 'remarks')->textArea(['maxlength' => true, 'rows' => 4]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\models\StationType;
use app\models\Vendor;

/* @var $this yii\web\View */
/* @var $model app\models\Station */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="station-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($depot, 'serial_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($depot, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($depot, 'short_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($depot, 'longitude')->textInput() ?>

    <?= $form->field($depot, 'altitude')->textInput() ?>

    <?= $form->field($model, 'station_type_id')->dropDownList(
    	ArrayHelper::map(StationType::find()->all(), 'station_type_id', 'station_type_name'))->label("Station Type")
    ?>

    <?= $form->field($model, 'remarks')->textArea(['maxlength' => true, 'rows' => 4]) ?>

    <?= $form->field($model, 'vendor_id')->dropDownList(
    	ArrayHelper::map(Vendor::find()->all(), 'vendor_id', 'primary_name'))->label('Vendor')
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

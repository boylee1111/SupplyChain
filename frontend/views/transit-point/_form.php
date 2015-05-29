<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\models\TransitPointType;

/* @var $this yii\web\View */
/* @var $model app\models\TransitPoint */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transit-point-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($depot, 'serial_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($depot, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($depot, 'short_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($depot, 'longitude')->textInput() ?>

    <?= $form->field($depot, 'altitude')->textInput() ?>

    <?= $form->field($model, 'transit_point_type_id')->dropDownList(
    	ArrayHelper::map(TransitPointType::find()->all(), 'transit_point_type_id', 'transit_point_type_name'))->label('Transit Point Type')
    ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

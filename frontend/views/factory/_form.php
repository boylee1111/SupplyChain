<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\models\FactoryType;

/* @var $this yii\web\View */
/* @var $model app\models\Factory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($depot, 'serial_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($depot, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($depot, 'short_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($depot, 'longitude')->textInput() ?>

    <?= $form->field($depot, 'altitude')->textInput() ?>

    <?= $form->field($model, 'factory_type_id')->dropDownList(
    	ArrayHelper::map(FactoryType::find()->all(), 'factory_type_id', 'factory_type_name'))->label('Factory Type')
    ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

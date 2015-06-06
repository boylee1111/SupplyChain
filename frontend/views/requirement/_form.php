<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\models\Depot;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Requirement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requirement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'requirement_time_limit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'requirement_cost')->textInput(['maxlength' => true])->label('Requirement Cost (0 or empty if unlimited)') ?>

    <?= $form->field($model, 'start_depot_id')->dropdownList(
        ArrayHelper::map(Depot::find()->all(), 'depot_id', 'name'))->label('Start Depot')
    ?>

    <?= $form->field($model, 'end_depot_id')->dropdownList(
        ArrayHelper::map(Depot::find()->all(), 'depot_id', 'name'))->label('End Depot')
    ?>

    <?= $form->field($model, 'depots')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Depot::find()->all(), 'depot_id', 'name'),
        'options' => [
            'placeholder' => 'Select the pass depots ...',
            'multiple' => true,
        ],
        'pluginOptions' => [
            'allowClear' => true,
        ]
    ])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

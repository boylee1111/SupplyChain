<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RoadSectionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="road-section-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'road_section_id') ?>

    <?= $form->field($model, 'serial_number') ?>

    <?= $form->field($model, 'road_section_name') ?>

    <?= $form->field($model, 'time_cost') ?>

    <?= $form->field($model, 'basic_cost') ?>

    <?php // echo $form->field($model, 'volume_based_cost') ?>

    <?php // echo $form->field($model, 'weight_based_cost') ?>

    <?php // echo $form->field($model, 'minimum_volume_limit') ?>

    <?php // echo $form->field($model, 'maximum_volume_limit') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'road_section_type_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

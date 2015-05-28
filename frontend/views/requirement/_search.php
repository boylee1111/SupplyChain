<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RequirementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="requirement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'requirement_id') ?>

    <?= $form->field($model, 'requirement_time_limit') ?>

    <?= $form->field($model, 'requirement_cost') ?>

    <?= $form->field($model, 'start_depot_id') ?>

    <?= $form->field($model, 'end_depot_id') ?>

    <?php // echo $form->field($model, 'requirement_path') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Requirement */

$this->title = 'Update Requirement: ' . ' ' . $model->requirement_id;
$this->params['breadcrumbs'][] = ['label' => 'Requirements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->requirement_id, 'url' => ['view', 'id' => $model->requirement_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="requirement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="requirement-form">

	    <?php $form = ActiveForm::begin(); ?>
	
	    <?= DetailView::widget([
	        'model' => $model,
	        'attributes' => [
	            'requirement_id',
	            'requirement_time_limit',
	            'requirement_cost',
	            [
	                'attribute' => 'startDepot.name',
	                'label' => 'Start Depot',
	                'format' => 'html',
	                'value' => '<a href=../warehouse/'.$model->startDepot->depot_id.'>'.$model->startDepot->name.'</a>',
	            ],
	            [
	                'attribute' => 'endDepot.name',
	                'label' => 'End Depot',
	                'format' => 'html',
	                'value' => '<a href=../warehouse/'.$model->endDepot->depot_id.'>'.$model->endDepot->name.'</a>',
	            ],
	            [
	                'attribute' => 'depots',
	                'value' => implode(', ', ArrayHelper::getColumn($model->depots, 'name')),
	                'format' => 'html',
	                'label' => 'Pass Depots',
	            ],
	        ],
	    ]) ?>

	    <?= $form->field($model, 'result_count')->dropdownList([5 => 5, 10 => 10, 15 => 15, 20 => 20]) ?>
	
	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	
	    <?php ActiveForm::end(); ?>
	
	</div>

</div>

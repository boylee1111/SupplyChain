<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RoadSection */

$this->title = $model->road_section_name;
$this->params['breadcrumbs'][] = ['label' => 'Road Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-section-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->road_section_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->road_section_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'road_section_id',
            'serial_number',
            'road_section_name',
            'time_cost',
            'basic_cost',
            'volume_based_cost',
            'weight_based_cost',
            'minimum_volume_limit',
            'maximum_volume_limit',
            'remarks',
            [
                'attribute' => 'roadSectionType.road_section_type_name',
                'label' => 'Road Section Type',
            ],
            [
                'attribute' => 'startDepot.name',
                'label' => 'Start Depot',
            ],
            [
                'attribute' => 'endDepot.name',
                'label' => 'End Depot',
            ],
        ],
    ]) ?>

</div>

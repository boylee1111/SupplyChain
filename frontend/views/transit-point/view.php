<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TransitPoint */

$this->title = $model->depot->name;
$this->params['breadcrumbs'][] = ['label' => 'Transit Points', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transit-point-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->depot_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->depot_id], [
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
            // 'depot_id',
            'depot.serial_number',
            'depot.name',
            'depot.short_name',
            'depot.longitude',
            'depot.altitude',
            [
                'attribute' => 'transitPointType.transit_point_type_name',
                'label' => 'Transit Point Type',
            ],
            'remarks',
        ],
    ]) ?>

</div>

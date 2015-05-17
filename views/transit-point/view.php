<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TransitPoint */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Transit Points', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transit-point-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->transit_point_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->transit_point_id], [
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
            // 'transit_point_id',
            'serial_number',
            'name',
            'short_name',
            'longitude',
            'altitude',
            'status',
            'transitPointType.transit_point_type_name',
            'remarks',
        ],
    ]) ?>

</div>

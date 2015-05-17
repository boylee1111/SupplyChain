<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Warehouse */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Warehouses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouse-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->warehouse_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->warehouse_id], [
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
            // 'warehouse_id',
            'serial_number',
            'name',
            'short_name',
            'longitude',
            'altitude',
            'status',
            'warehouseType.warehouse_type_name',
            'remarks',
            'area',
            'rent',
            'summary_salary',
            'max_quantity_limit',
            'max_cost_limit',
        ],
    ]) ?>

</div>

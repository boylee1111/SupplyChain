<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WarehouseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Warehouses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouse-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Warehouse', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'warehouse_id',
            'serial_number',
            'name',
            'short_name',
            'longitude',
            'altitude',
            'status',
            'warehouse_type_id',
            'remarks',
            'area',
            'rent',
            'summary_salary',
            'max_quantity_limit',
            'max_cost_limit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

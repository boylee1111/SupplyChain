<?php

use yii\helpers\Html;

use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RoadSectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Road Sections';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-section-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Html::a('Create Road Section', ['create'], ['class' => 'btn btn-success']) ?>
    <?= ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => [            
                    'serial_number',
                    'road_section_name',
                    'time_cost',
                    'basic_cost',
                    'volume_based_cost',
                    'weight_based_cost',
                    'minimum_volume_limit',
                    'maximum_volume_limit',
                    [
                        'attribute' => 'startDepot.name',
                        'label' => 'Start Depot',
                    ],
                    [
                        'attribute' => 'endDepot.name',
                        'label' => 'End Depot',
                    ],
                    [
                        'attribute' => 'roadSectionType.road_section_type_name',
                        'label' => 'Road Section Type',
                    ],
                    'remarks',
                ],
            'fontAwesome' => true,
        ]); ?>
        <p></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'serial_number',
            'road_section_name',
            'time_cost',
            'basic_cost',
            // 'volume_based_cost',
            // 'weight_based_cost',
            // 'minimum_volume_limit',
            // 'maximum_volume_limit',
            // 'remarks',
            [
                'attribute' => 'roadSectionType.road_section_type_name',
                'label' => 'Road Section Type',
            ],
            // 'start_depot_id',
            // 'end_depot_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

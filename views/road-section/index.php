<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RoadSectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Road Sections';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-section-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Road Section', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'road_section_id',
            'serial_number',
            'name',
            'roadSectionType.road_section_type_name',
            'time_cost',
            // 'basic_cost',
            // 'volume_based_cost',
            // 'weight_based_cost',
            // 'minimum_volume_limit',
            // 'maximum_volume_limit',
            // 'remarks',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

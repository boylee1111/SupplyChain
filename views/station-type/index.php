<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StationTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Station Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="station-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Station Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'station_type_id',
            'station_type_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

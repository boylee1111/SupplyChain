<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RoadSectionTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Road Section Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-section-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Road Section Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'road_section_type_id',
            'road_section_type_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

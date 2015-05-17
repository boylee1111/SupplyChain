<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TransitPointTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transit Point Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transit-point-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Transit Point Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'transit_point_type_id',
            'transit_point_type_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

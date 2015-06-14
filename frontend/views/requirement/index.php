<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Requirement;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RequirementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Requirements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requirement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Requirement', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'requirement_id',
            'requirement_time_limit',
            'requirement_cost',
            [
                'attribute' => 'startDepot.name',
                'label' => 'Start Depot',
            ],
            [
                'attribute' => 'endDepot.name',
                'label' => 'End Depot',
            ],
            // [
            //     'attribute' => 'depots',
            //     'value' => implode(', ', ArrayHelper::getColumn(Requirement::getPassDepotsById($searchModel->requirement_id), 'name')),
            // ],
            // 'requirement_path:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

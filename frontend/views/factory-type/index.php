<?php

use yii\helpers\Html;

use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FactoryTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Factory Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factory-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Html::a('Create Factory Type', ['create'], ['class' => 'btn btn-success']) ?>
    <?= ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => [            
                    'factory_type_name',
                ],
            'fontAwesome' => true,
        ]); ?>
    <p></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'factory_type_id',
            'factory_type_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

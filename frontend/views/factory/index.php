<?php

use yii\helpers\Html;

use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FactorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Factories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factory-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Html::a('Create Factory', ['create'], ['class' => 'btn btn-success']) ?>
    <?= ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => [            
                    'depot.serial_number',
                    'depot.name',
                    'depot.short_name',
                    [
                        'attribute' => 'factoryType.factory_type_name',
                        'label' => 'Factory Type',
                    ],
                ],
            'fontAwesome' => true,
        ]); ?>
        <p></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'depot_id',
            'depot.serial_number',
            'depot.name',
            'depot.short_name',
            [
                'attribute' => 'factoryType.factory_type_name',
                'label' => 'Factory Type',
            ],
            // 'remarks',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

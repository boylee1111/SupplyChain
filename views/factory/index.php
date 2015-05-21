<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FactorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Factories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factory-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Factory', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'factory_id',
            'serial_number',
            'name',
            'short_name',
            'longitude',
            // 'altitude',
            // 'status',
            'factoryType.factory_type_name',
            // 'remarks',
            'roadSection.name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

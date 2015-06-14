<?php

use yii\helpers\Html;

use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Client Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Html::a('Create Client Type', ['create'], ['class' => 'btn btn-success']) ?>
    <?= ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => [            
                    'client_type_name',
                ],
            'fontAwesome' => true,
        ]); ?>
        <p></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'client_type_id',
            'client_type_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

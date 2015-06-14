<?php

use yii\helpers\Html;

use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Html::a('Create Client', ['create'], ['class' => 'btn btn-success']) ?>
    <?= ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => [            
                    // 'client_id',
                    'serial_number',
                    'primary_name',
                    'secondary_name',
                    'short_name',
                    'remarks',
                    [
                        'attribute' => 'clientType.client_type_name',
                        'label' => 'Client Type',
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
    
                // 'client_id',
                'serial_number',
                'primary_name',
                'secondary_name',
                'short_name',
                // 'remarks',
                [
                    'attribute' => 'clientType.client_type_name',
                    'label' => 'Client Type',
                ],
    
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'product_id',
            'serial_number',
            'primary_name',
            'secondary_name',
            'short_name',
            [
                'attribute' => 'productType.product_type_name',
                'label' => 'Product Type',
            ],
            // 'length',
            // 'width',
            // 'height',
            // 'volume',
            // 'weight',
            // 'amount',
            // 'is_broken:boolean',
            // 'currency_id',
            // 'minimum_stock',
            // 'maximum_stock',
            // 'remarks',
            // 'client_id',
            // 'supplier_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->primary_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->product_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'product_id',
            'serial_number',
            'primary_name',
            'secondary_name',
            'short_name',
            [
                'attribute' => 'productType.product_type_name',
                'label' => 'Product Type',
            ],
            'length',
            'width',
            'height',
            'volume',
            'weight',
            'amount',
            'is_broken:boolean',
            [
                'attribute' => 'currency.currency_code',
                'label' => 'Currency',
            ],
            'minimum_stock',
            'maximum_stock',
            'remarks',
            [
                'attribute' => 'client.primary_name',
                'label' => 'Client',
            ],
            [
                'attribute' => 'supplier.primary_name',
                'label' => 'Supplier',
            ],
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Factory */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Factories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factory-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->factory_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->factory_id], [
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
            // 'factory_id',
            'serial_number',
            'name',
            'short_name',
            'longitude',
            'altitude',
            'status',
            'factoryType.factory_type_name',
            'remarks',
        ],
    ]) ?>

</div>

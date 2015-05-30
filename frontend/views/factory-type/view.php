<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FactoryType */

$this->title = $model->factory_type_name;
$this->params['breadcrumbs'][] = ['label' => 'Factory Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factory-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->factory_type_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->factory_type_id], [
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
            // 'factory_type_id',
            'factory_type_name',
        ],
    ]) ?>

</div>

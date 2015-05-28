<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WarehouseType */

$this->title = 'Update Warehouse Type: ' . ' ' . $model->warehouse_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Warehouse Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->warehouse_type_id, 'url' => ['view', 'id' => $model->warehouse_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="warehouse-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

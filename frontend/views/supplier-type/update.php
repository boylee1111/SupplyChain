<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SupplierType */

$this->title = 'Update Supplier Type: ' . ' ' . $model->supplier_type_name;
$this->params['breadcrumbs'][] = ['label' => 'Supplier Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->supplier_type_name, 'url' => ['view', 'id' => $model->supplier_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="supplier-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

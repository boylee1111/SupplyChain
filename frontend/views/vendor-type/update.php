<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VendorType */

$this->title = 'Update Vendor Type: ' . ' ' . $model->vendor_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Vendor Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vendor_type_id, 'url' => ['view', 'id' => $model->vendor_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vendor-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

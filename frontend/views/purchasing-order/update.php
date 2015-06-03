<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PurchasingOrder */

$this->title = 'Update Purchasing Order: ' . ' ' . $model->purchasing_order_id;
$this->params['breadcrumbs'][] = ['label' => 'Purchasing Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->purchasing_order_id, 'url' => ['view', 'id' => $model->purchasing_order_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="purchasing-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

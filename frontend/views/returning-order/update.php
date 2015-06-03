<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReturningOrder */

$this->title = 'Update Returning Order: ' . ' ' . $model->returning_order_id;
$this->params['breadcrumbs'][] = ['label' => 'Returning Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->returning_order_id, 'url' => ['view', 'id' => $model->returning_order_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="returning-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

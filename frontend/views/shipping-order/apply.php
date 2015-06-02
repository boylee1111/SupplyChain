<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ShippingOrder */

$this->title = 'New Shipping Order';
// $this->params['breadcrumbs'][] = ['label' => 'Shipping Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipping-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

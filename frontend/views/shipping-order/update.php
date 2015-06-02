<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

use common\models\User;
use app\models\ShippingOrder;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\ShippingOrder */

$this->title = 'Confirm Shipping Order: ' . ' ' . $model->shipping_order_code;
$this->params['breadcrumbs'][] = ['label' => 'Shipping Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->shipping_order_code, 'url' => ['view', 'id' => $model->shipping_order_id]];
$this->params['breadcrumbs'][] = 'Confirm';
?>
<div class="shipping-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PurchasingOrder */

$this->title = 'New Purchasing Order';
// $this->params['breadcrumbs'][] = ['label' => 'Purchasing Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchasing-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

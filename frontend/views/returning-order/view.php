<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ReturningOrder */

$this->title = $model->returning_order_id;
$this->params['breadcrumbs'][] = ['label' => 'Returning Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="returning-order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->returning_order_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->returning_order_id], [
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
            'returning_order_id',
            'purchasing_order_id',
            'apply_user',
            'approve_user',
            'quantity',
            'apply_date',
            'expect_returning_date',
            'returning_date',
            'status',
            'reason',
            'remarks',
        ],
    ]) ?>

</div>

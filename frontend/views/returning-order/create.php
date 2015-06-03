<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReturningOrder */

$this->title = 'Create Returning Order';
$this->params['breadcrumbs'][] = ['label' => 'Returning Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="returning-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

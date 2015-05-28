<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WarehouseType */

$this->title = 'Create Warehouse Type';
$this->params['breadcrumbs'][] = ['label' => 'Warehouse Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouse-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

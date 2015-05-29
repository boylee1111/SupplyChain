<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Factory */

$this->title = 'Update Factory: ' . ' ' . $model->depot_id;
$this->params['breadcrumbs'][] = ['label' => 'Factories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->depot_id, 'url' => ['view', 'id' => $model->depot_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="factory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'depot' => $depot,
    ]) ?>

</div>

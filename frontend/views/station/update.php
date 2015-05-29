<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Station */

$this->title = 'Update Station: ' . ' ' . $model->depot_id;
$this->params['breadcrumbs'][] = ['label' => 'Stations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->depot_id, 'url' => ['view', 'id' => $model->depot_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="station-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'depot' => $depot,
    ]) ?>

</div>

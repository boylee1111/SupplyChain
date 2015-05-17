<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StationType */

$this->title = 'Update Station Type: ' . ' ' . $model->station_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Station Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->station_type_id, 'url' => ['view', 'id' => $model->station_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="station-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TransitPoint */

$this->title = 'Update Transit Point: ' . ' ' . $model->depot->name;
$this->params['breadcrumbs'][] = ['label' => 'Transit Points', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->depot->name, 'url' => ['view', 'id' => $model->depot_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transit-point-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'depot' => $depot,
    ]) ?>

</div>

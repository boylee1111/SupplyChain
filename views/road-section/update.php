<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RoadSection */

$this->title = 'Update Road Section: ' . ' ' . $model->road_section_id;
$this->params['breadcrumbs'][] = ['label' => 'Road Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->road_section_id, 'url' => ['view', 'id' => $model->road_section_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="road-section-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

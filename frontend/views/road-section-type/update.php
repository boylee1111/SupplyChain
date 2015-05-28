<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RoadSectionType */

$this->title = 'Update Road Section Type: ' . ' ' . $model->road_section_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Road Section Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->road_section_type_id, 'url' => ['view', 'id' => $model->road_section_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="road-section-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

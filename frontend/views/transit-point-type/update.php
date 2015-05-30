<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TransitPointType */

$this->title = 'Update Transit Point Type: ' . ' ' . $model->transit_point_type_name;
$this->params['breadcrumbs'][] = ['label' => 'Transit Point Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->transit_point_type_name, 'url' => ['view', 'id' => $model->transit_point_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transit-point-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

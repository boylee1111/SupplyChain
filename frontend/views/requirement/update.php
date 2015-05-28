<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Requirement */

$this->title = 'Update Requirement: ' . ' ' . $model->requirement_id;
$this->params['breadcrumbs'][] = ['label' => 'Requirements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->requirement_id, 'url' => ['view', 'id' => $model->requirement_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="requirement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

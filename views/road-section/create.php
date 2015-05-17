<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RoadSection */

$this->title = 'Create Road Section';
$this->params['breadcrumbs'][] = ['label' => 'Road Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-section-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

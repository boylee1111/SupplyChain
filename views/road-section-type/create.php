<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RoadSectionType */

$this->title = 'Create Road Section Type';
$this->params['breadcrumbs'][] = ['label' => 'Road Section Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-section-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

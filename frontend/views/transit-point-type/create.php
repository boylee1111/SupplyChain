<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TransitPointType */

$this->title = 'Create Transit Point Type';
$this->params['breadcrumbs'][] = ['label' => 'Transit Point Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transit-point-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

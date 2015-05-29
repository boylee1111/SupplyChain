<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TransitPoint */

$this->title = 'Create Transit Point';
$this->params['breadcrumbs'][] = ['label' => 'Transit Points', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transit-point-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'depot' => $depot,
    ]) ?>

</div>

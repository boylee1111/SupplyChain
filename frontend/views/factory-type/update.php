<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FactoryType */

$this->title = 'Update Factory Type: ' . ' ' . $model->factory_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Factory Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->factory_type_id, 'url' => ['view', 'id' => $model->factory_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="factory-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

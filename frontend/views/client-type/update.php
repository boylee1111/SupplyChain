<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClientType */

$this->title = 'Update Client Type: ' . ' ' . $model->client_type_name;
$this->params['breadcrumbs'][] = ['label' => 'Client Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->client_type_name, 'url' => ['view', 'id' => $model->client_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="client-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VendorType */

$this->title = 'Create Vendor Type';
$this->params['breadcrumbs'][] = ['label' => 'Vendor Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendor-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

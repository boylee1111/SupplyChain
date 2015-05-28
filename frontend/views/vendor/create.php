<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Vendor */

$this->title = 'Create Vendor';
$this->params['breadcrumbs'][] = ['label' => 'Vendors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

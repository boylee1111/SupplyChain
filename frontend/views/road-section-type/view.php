<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RoadSectionType */

$this->title = $model->road_section_type_name;
$this->params['breadcrumbs'][] = ['label' => 'Road Section Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="road-section-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->road_section_type_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->road_section_type_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'road_section_type_id',
            'road_section_type_name',
        ],
    ]) ?>

</div>

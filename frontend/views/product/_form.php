<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use app\models\ProductType;
use app\models\Currency;
use app\models\Client;
use app\models\Supplier;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'serial_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primary_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'secondary_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_type_id')->dropdownList(
        ArrayHelper::map(ProductType::find()->all(), 'product_type_id', 'product_type_name'))->label('Product Type')
    ?>

    <?= $form->field($model, 'length')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'width')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'height')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_broken')->checkbox() ?>

    <?= $form->field($model, 'currency_id')->dropdownList(
        ArrayHelper::map(Currency::find()->all(), 'currency_id', 'currency_name'))->label('Currency')
    ?>

    <?= $form->field($model, 'minimum_stock')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maximum_stock')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'client_id')->dropdownList(
        ArrayHelper::map(Client::find()->all(), 'client_id', 'primary_name'))->label('Client')
    ?>

    <?= $form->field($model, 'supplier_id')->dropdownList(
        ArrayHelper::map(Supplier::find()->all(), 'supplier_id', 'primary_name'))->label('Supplier')
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

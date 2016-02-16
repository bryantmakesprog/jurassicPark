<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Package */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="package-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'adultPrice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'childPrice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'includesGeneticsTour')->dropDownList($model->getBooleanOptions()) ?>

    <?= $form->field($model, 'includesSafariTour')->dropDownList($model->getBooleanOptions()) ?>

    <?= $form->field($model, 'includesFood')->dropDownList($model->getBooleanOptions()) ?>

    <?= $form->field($model, 'includesHotel')->dropDownList($model->getBooleanOptions()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

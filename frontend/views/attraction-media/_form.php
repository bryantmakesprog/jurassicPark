<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AttractionMedia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attraction-media-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'attraction')->dropDownList($model->getAttractionOptions()) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

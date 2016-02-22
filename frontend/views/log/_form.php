<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Log */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ticket')->textInput() ?>

    <?= $form->field($model, 'action')->dropDownList($model->getActions_checkInOut()) ?>

    <?= $form->field($model, 'location')->dropDownList($model->getLocations_attractions()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Record Guest' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

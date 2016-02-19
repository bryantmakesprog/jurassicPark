<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AttractionMedia */

$this->title = 'Update Attraction Media: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Attraction Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="attraction-media-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

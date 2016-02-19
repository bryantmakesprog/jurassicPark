<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AttractionMedia */

$this->title = 'Create Attraction Media';
$this->params['breadcrumbs'][] = ['label' => 'Attraction Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attraction-media-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

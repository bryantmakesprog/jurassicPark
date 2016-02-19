<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Attraction */

$this->title = 'Create Attraction';
$this->params['breadcrumbs'][] = ['label' => 'Attractions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attraction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

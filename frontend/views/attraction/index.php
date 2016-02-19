<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Attractions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attraction-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Attraction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',
            'type',
            // 'duration',
            // 'maxOccupancy',
            // 'queueSize',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

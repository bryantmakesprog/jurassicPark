<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\DataColumn;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Attraction Media';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attraction-media-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Attraction Media', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'attraction',
            'url:url',
            [
                'class' => DataColumn::className(), // this line is optional
                'attribute' => 'url',
                'format' => 'image',
                //'value' => "<img src='url'/>",
                'label' => 'Image',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Guest */

// $error: Error message passed to this form.

$this->title = 'Redeem Ticket';
$this->params['breadcrumbs'][] = ['label' => 'Guests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guest-create">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php
        if($error != "")
        {
            echo "<div class='alert alert-danger'>";
                echo $error;
            echo "</div>";
        }
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

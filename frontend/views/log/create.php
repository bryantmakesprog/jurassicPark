<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Log */

$this->title = 'Create Log';
$this->params['breadcrumbs'][] = ['label' => 'Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        if($error != "")
        {
            if($error != "success")
            {
                echo "<div class='alert alert-danger'>";
                    echo $error;
                echo "</div>";
            }
            else 
            {
                echo "<div class='alert alert-success'>";
                    echo "Success!";
                echo "</div>";
            }
        }
    ?>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

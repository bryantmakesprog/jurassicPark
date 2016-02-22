<?php

/* 
 * Draw admin command buttons.
 */

use yii\helpers\Html;

echo "<tr><td><strong>Web Administrator</strong></td></tr>";
echo "<tr>";
    echo "<td>";
        echo Html::a("Modify Attractions", "@web/attraction/", ['class' => 'btn btn-success']);
    echo "</td>";
    echo "<td>";
        echo "<p>Modify, add, and delete attractions.</p>";
    echo "</td>";
echo "</tr>";
echo "<tr>";
    echo "<td>";
        echo Html::a("Modify Attraction Media", "@web/attraction-media", ['class' => 'btn btn-success']);
    echo "</td>";
    echo "<td>";
        echo "<p>Modify, add, and delete advertising media for attractions.</p>";
    echo "</td>";
echo "</tr>";

<?php

/* 
 * Draw buttons for an operator.
 */

use yii\helpers\Html;

echo "<tr><td><strong>Operator</strong></td></tr>";
echo "<tr>";
    echo "<td>";
        echo Html::a("Redeem Tickets", "@web/guest/redeem-ticket", ['class' => 'btn btn-success']);
    echo "</td>";
    echo "<td>";
        echo "<p>Scan a visitor's ticket to grant entry.</p>";
    echo "</td>";
echo "</tr>";
echo "<tr>";
    echo "<td>";
        echo Html::a("Check In/Out", "@web/log/check-in-out", ['class' => 'btn btn-success']);
    echo "</td>";
    echo "<td>";
        echo "<p>Set up POS for attraction queues.</p>";
    echo "</td>";
echo "</tr>";


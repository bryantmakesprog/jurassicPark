<?php

/* 
 * Display all tickets owned by user.
 * Pass the user's id in the form of $id.
 */

use app\models\Ticket;
use app\models\Package;

$id = Yii::$app->user->identity->id;

$allTickets = Ticket::find()->where(['owner' => $id])->all();

echo "<table class='table'>";
echo "<thead>";
    echo "<tr>";
        echo "<td>Package</td><td>Status</td><td>Date Purchased</td><td>Date Redeemed</td>";
    echo "</tr>";
echo "</thead>";
echo "<tbody>";
    foreach($allTickets as $ticket)
    {
        $package = Package::find()->where(['id' => $ticket->package])->one();
        echo "<tr>";
            echo "<td>" . $package->name . "</td>";
            echo "<td>" . strtoupper($ticket->status) . "</td>";
            echo "<td>" . date("m/d/Y", $ticket->issuedAt) . "</td>";
            echo "<td>";
                if($ticket->redeemedAt == 0)
                    echo "Not Redeemed";
                else 
                    echo date("m/d/Y", $ticket->redeemedAt);
            echo "</td>";
        echo "</tr>";
    }
echo "</tbody>";


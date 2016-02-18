<?php

/* 
 * Display all tickets owned by user.
 * Pass the user's id in the form of $id.
 */

use yii\helpers\Html;

use app\models\Ticket;
use app\models\Package;

$id = Yii::$app->user->identity->id;

$allTickets = Ticket::find()->where(['owner' => $id])->all();

if(count($allTickets) > 0)
{
    echo "<table class='table'>";
    echo "<thead>";
        echo "<tr>";
            echo "<td>Package</td><td>Status</td><td>Date Purchased</td><td>Date Redeemed</td><td></td>";
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
                echo "<td>" . Html::a("Print", ['/ticket/view-ticket', 'id' => $ticket->id], ['class' => 'btn btn-default']) . "</td>";
            echo "</tr>";
        }
    echo "</tbody>";
    echo "</table>";
}
else
{
    echo "<div class='jumbotron'>";
        echo "<h1>Your Have No Tickets!</h1>";
        echo "<p>Did a compy gobble all your tickets? Let us help you pick the perfect package.</p>";
        echo Html::a("Browse Packages", ['/package/view-all-packages'], ['class' => 'btn btn-success']);
    echo "</div>";
}


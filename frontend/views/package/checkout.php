<?php

/* 
 * Checkout user. Currently we don't checkout, we just spit out the tickets.
 */

use yii\helpers\Html;

//For ticket generation.
use app\models\Ticket;

echo "<div class='jumbotron'>";
    echo "<h2>Uh-oh!</h2>";
    echo "<p class='lead'>We've got Brachiosauri munchin' on our cables! Please try checking-out again later!</p>";
echo "</div>";

$generateTickets = false;

//So viewers don't actually have to purchase thousand-dollar tickets, we're going to just pretend there's an error :)
$generateTickets = true;
echo "<div class='alert alert-danger'>";
        echo "<strong>ERROR BRC-024</strong> Unable to verify purchase. Making tickets available.";
echo "</div>";

if($generateTickets)
{
    //Generate Tickets.
    $cart = Yii::$app->cart;
    $owner = Yii::$app->user->identity->id;
    //$firstName = Yii::$app->user->identity->firstName;
    $firstName = "John";
    //$lastName = Yii::$app->user->identity->lastName;
    $lastName = "Doe";
    foreach($cart->positions as $position){
        $i = 0;
        while($i < $position->getQuantity())
        {
            Ticket::generateTicket($owner, $position->id, $firstName, $lastName);
            $i++;
        }
    }
    //Empty Cart.
    $cart->removeAll();
    //Display ticket link.
    echo Html::a("View Tickets", ['/ticket/view-by-user'], ['class' => 'btn btn-success']);
}



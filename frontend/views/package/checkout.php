<?php

/* 
 * Checkout user. Currently we don't checkout, we just spit out the tickets.
 */

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
    echo "GENERATE TICKETS";
    echo "<br/>";
    echo "REDIRECT TO TICKETS";
}



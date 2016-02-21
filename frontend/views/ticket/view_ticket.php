<?php

/* 
 * View Printable Ticket. We use tables for formatting to make it printable.
 * ticket: Ticket Model
 */
use app\models\package;

echo "<div class='col-md-12 well' style='border:2px solid black;'>";
echo "<table style='width:100%;'>";
echo "<tr>";
        echo "<td>";
        //Draw Holder Info
        echo "<div>";
            echo "<p>Name: <strong>$ticket->firstName $ticket->lastName</strong></p>";
            echo "<p>Package: <strong>" . Package::findOne($ticket->package)->name . "</strong></p>";
        echo "</div>";
        echo "</td>";

        echo "<td>";
        //Draw Logo
        echo "<div>";
            $logoURL = "http://res.cloudinary.com/dxqmggd5a/image/upload/c_scale,h_128,w_128/v1456082054/jurassic/misc/logo.png";
            echo "<img src='$logoURL'/>";
        echo "</div>";
        echo "</td>";

        echo "<td>";
        //Draw Barcode
        echo "<div>";
            $barcodeType = "c128b";
            $barcodeValue = $ticket->id;
            $barcodeFormat = "png";
            echo "<img src='http://barcodes4.me/barcode/$barcodeType/$barcodeValue.$barcodeFormat?isTextDrawn=1'/>";
        echo "</div>";
        echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";

echo "<div class='col-md-12 well' style='border:2px solid black;'>";
echo "<table style='width:100%;'>";
echo "<tr>";
        echo "<td>";
        //Draw Waiver Info
        echo "<div>";
            echo "<p><strong>Be sure to bring the following items with you:</strong></p>";
            echo "<ul>";
                echo "<li>Valid Photo ID</li>";
                echo "<li>Seasonally-Appropriate Clothing</li>";
                echo "<li>Sunscreen</li>";
                echo "<li>Your Smile!</li>";
            echo "</ul>";
        echo "</div>";
        echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";

echo "<div class='col-md-12 well' style='border:2px solid black;'>";
echo "<table style='width:100%;'>";
echo "<tr>";
        echo "<td>";
        //Draw Waiver Info
        echo "<div>";
            echo "
                <p><strong>GUESTS MUST SIGN BELOW BEFORE BEING GRANTED PARK ENTRY.</strong></p>
                <p>I WAIVE, RELEASE, AND DISCHARGE from any and all liability, including but not limited to, liability arising from the negligence or fault of the entities or persons released, for my death, disability, personal injury, property damage, property theft, or actions of any kind which may hereafter occur to me including my traveling to and from this event, THE FOLLOWING ENTITIES OR PERSONS: International Genetics Incorporated and/or their directors, officers, employees, volunteers, representatives, and agents, the activity or event holders, activity or event sponsors, activity or event volunteers.</p>
                <p><strong>I CERTIFY THAT I HAVE READ THIS DOCUMENT, AND I FULLY UNDERSTAND ITS CONTENT. I AM AWARE THAT THIS IS A RELEASE OF LIABILITY AND A CONTRACT AND I SIGN IT OF MY OWN FREE WILL. </strong></p>
                <p>Signature: _______________________________ \t Date: ____________</p>
                ";
        echo "</div>";
        echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";



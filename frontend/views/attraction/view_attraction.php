<?php

/* 
 * View an individual attraction.
 * attraction: Attraction Model
 */

//Random Park Teaser Image - Stock Image
echo "<div>Park Image Here</div>";

//Description
$typeGlyphicon = "glyphicon glyphicon-remove";
switch($attraction->type)
{
    case 0: //Food
        $typeGlyphicon = 'glyphicon glyphicon-cutlery';
        break;
    case 1: //Ride
        $typeGlyphicon = 'glyphicon glyphicon-send';
        break;
    case 2: //Exhibit
        $typeGlyphicon = 'glyphicon glyphicon-education';
        break;
}
echo "<div>Name: $attraction->name <span class='$typeGlyphicon'></span></div>";
echo "<div>Description: $attraction->description</div>";


//Square grid.
echo "<div class='container-fluid'>";
    //Wait Time
    echo "<div>Wait Time: " . $attraction->getWaitTime() . " minutes</div>";
    //Images
    echo "We will put media connections here.";
echo "</div>";


<?php

/*
 * Displays an individual package for a customer.
 * $model = Holds the package model we want to display.
 */

use yii\helpers\Html;
use yii\helpers\BaseHtml;

//Random Park Teaser Image - Stock Image
echo "<div>Park Image Here</div>";

echo "<div>Name: $model->name</div>";
echo "<div>Description: $model->description</div>";

//Options
echo "<div class='container-fluid'>";
    //See what options we have.
    $packageAdditions = array();
    if($model->includesGeneticsTour)
    {
        $imageURL = "http://res.cloudinary.com/dxqmggd5a/image/upload/c_crop,r_20,w_586,x_245,y_78/v1455638865/jurassic/genetics.jpg";
        $description = "This package includes unlimited visits to our animal breeding facilities. See first-hand how we put the 'Jurassic' in Jurassic Park!";
        $infoURL = "";
        $packageAdditions[] = ['image' => $imageURL, 'description' => $description, 'url' => $infoURL,];
    }
    if($model->includesSafariTour)
    {
        $imageURL = "http://res.cloudinary.com/dxqmggd5a/image/upload/c_crop,h_330,r_20,w_586/v1455638865/jurassic/safari.jpg";
        $description = "This package includes unlimited access to our guided animal tours. Get up close and personal with our Jurassic friends. Sightings guaranteed!";
        $infoURL = "";
        $packageAdditions[] = ['image' => $imageURL, 'description' => $description, 'url' => $infoURL,];
    }
    if($model->includesFood)
    {
        $imageURL = "http://res.cloudinary.com/dxqmggd5a/image/upload/c_crop,h_330,r_20,w_586/v1455638865/jurassic/restaurant.jpg";
        $description = "This package includes lunch and dinner at our fine dining establishment. Sit back and relax as Chef Alejandro prepares a meal your whole family will enjoy!";
        $infoURL = "";
        $packageAdditions[] = ['image' => $imageURL, 'description' => $description, 'url' => $infoURL,];
    }
    if($model->includesHotel)
    {
        $imageURL = "http://res.cloudinary.com/dxqmggd5a/image/upload/c_crop,h_330,r_20,w_586/v1455638865/jurassic/hotel.jpg";
        $description = "This package includes overnight stay at our world-class hotel. After a long day of adventure and play, your family relax at our beautiful mountain-top resort!";
        $infoURL = "";
        $packageAdditions[] = ['image' => $imageURL, 'description' => $description, 'url' => $infoURL,];
    }
    //If our list of additions is boring, spice it up by adding more.
    switch(count($packageAdditions))
    {
        case 0: //If we have no additions, we are going to add two.
            $imageURL = "http://res.cloudinary.com/dxqmggd5a/image/upload/c_crop,h_330,r_20,w_586,x_46,y_27/v1455641264/jurassic/drive.jpg";
            $description = "All packages include unlimited access to our Park Drive Tour attraction. Enjoy a drive through our prehistoric reserve and see first-hand all wonders the Jurassic era has to offer!";
            $infoURL = "";
            $packageAdditions[] = ['image' => $imageURL, 'description' => $description, 'url' => $infoURL,];
        case 1: //If we have an odd number of additions (or are falling through from zero additions), add another to even it out.
        case 3:
            $imageURL = "http://res.cloudinary.com/dxqmggd5a/image/upload/c_crop,h_330,r_20,w_586,x_52,y_14/v1455641264/jurassic/petting.jpg";
            $description = "All packages include unlimited access to one of our many petting zoos. Take advantage, and grab adventure by the (dinosaur) horns!";
            $infoURL = "";
            $packageAdditions[] = ['image' => $imageURL, 'description' => $description, 'url' => $infoURL,];
            break;
    }
    //We now have either 2 or 4 park additions to display. We want to display them in two columns.
    $i = 0;
    foreach($packageAdditions as $addition)
    {
        //Check if we are the first addition in the row. If so, draw the start of our row.
        if($i == 0)
            echo "<div class='row-fluid'>";
        echo "<div class='col-md-6'>";
            echo "<img src='" . $addition['image'] . "' class='col-md-5' />";
            echo "<div class='col-md-7'>";
                echo "<p>" . $addition['description'] . "</p>";
                echo "<p>" . Html::a('More Info...', [$addition['url']]) . "</p>";
            echo "</div>";
        echo "</div>";
        //Iterate i. See if we are at the end of our row.
        $i++;
        if($i == 2)
        {
            echo "</div>";
            $i = 0;
        }
    }
echo "</div>";

//Prices
echo "<div>";
    echo "<div>Adult: $" . round($model->adultPrice,2) . "</div>";
    echo "<div>Child: $" . round($model->childPrice,2) . "</div>";
echo "</div>";

//Add Ticket Widget
echo BaseHtml::beginForm('@web/package/add-to-cart', 'GET');
    echo BaseHtml::hiddenInput("id", $model->id);
    echo BaseHtml::dropDownList("adultCount", "1", array(0,1,2,3,4,5,6,7,8,9,10));
    echo BaseHtml::dropDownList("childCount", "0", array(0,1,2,3,4,5,6,7,8,9,10));
    echo Html::submitButton("Add To Cart", ['class' => 'btn btn-primary']);
BaseHtml::endForm();




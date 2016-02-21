<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

use app\models\Attraction;
use app\models\AttractionMedia;
use yii\helpers\Html;
?>
<div class="site-index">

<?php
    echo $this->render('/widgets/_timer');
?>

    <div class="body-content">
        <div class="row">
            
            <?php
            $timeLocation = 0;
            $timeDisplayed = false;
            $logoLocation = 0;
            $logoDisplayed = false;
            $weatherLocation = 7;
            $weatherDisplayed = false;
            $ticketLocation = 1;
            $ticketDisplayed = false;
            
            //Array of background colors.
            $backgroundColors = ["#B01E00", "#E1B700", "#FE7C22"];
            
            $i = 0;
            foreach(Attraction::find()->all() as $attraction)
            {
                //Get standard thumbnail color.
                $thumbnailColor = "#880000";
                
                //Check for timer.
                if($i == $timeLocation)
                {
                    $timeDisplayed = true;
                    echo "<div class='col-md-6 col-sm-8 col-xs-12'>";
                        echo "<div class='dummy-double'></div>";
                        echo Html::a("<h2>Testing double</h2>", ['#'], ['class' => 'thumbnail-double', 'style' => "background:$thumbnailColor;"]);
                    echo "</div>";
                }
                
                //Check for logo.
                if($i == $timeLocation)
                {
                    $logoDisplayed = true;
                    $logoURL = "http://res.cloudinary.com/dxqmggd5a/image/upload/c_scale,e_negate,h_500,w_500/v1456082054/jurassic/misc/logo.png";
                    echo "<div class='col-md-3 col-sm-4 col-xs-6'>";
                        echo "<div class='dummy'></div>";
                        echo Html::a("", ['#'], ['class' => 'thumbnail', 'style' => "background:$thumbnailColor url('$logoURL'); background-size: 100% 100%;"]);
                    echo "</div>";
                }
                
                //Check for weather tile.
                if($i == $weatherLocation)
                {
                    //Echo our weather.
                    $weatherDisplayed = true;
                    echo $this->render('/widgets/_weather', ['tileColor' => $thumbnailColor]);
                }
                
                //Check for ticket tile.
                if($i == $ticketLocation)
                {
                    //Echo our ticket.
                    $ticketDisplayed = true;
                    $ticketURL = "http://res.cloudinary.com/dxqmggd5a/image/upload/e_negate/v1456075732/icons/ticket.png";
                    echo "<div class='col-md-3 col-sm-4 col-xs-6'>";
                        echo "<div class='dummy'></div>";
                        echo Html::a("<h2>Ticket Options</h2>", ['/package/view-all-packages'], ['class' => 'thumbnail', 'style' => "background:$thumbnailColor;"]);
                        echo Html::a("", ['/package/view-all-packages'], ['class' => 'thumbnail thumbnail-hover', 'style' => "background:$thumbnailColor url('$ticketURL') no-repeat center;"]);
                    echo "</div>";
                }
                
                //Get random thumbnail color.
                $randomThumbnailColor = $backgroundColors[array_rand($backgroundColors, 1)];
            
                //Get attraction image.
                $imageURL = "http://i.imgur.com/B2x3TTy.jpg";
                //Look for a random image representing the attraction. If none is found, use a placeholder.
                $mediaConnection = AttractionMedia::find()->where(['attraction' => $attraction->id])->orderBy('RAND()')->one();
                if($mediaConnection)
                    $imageURL = $mediaConnection->url;
                
                //Echo our attraction.
                echo "<div class='col-md-3 col-sm-4 col-xs-6'>";
                    echo "<div class='dummy'></div>";
                    echo Html::a("<h2>$attraction->name</h2>", ['/attraction/view-attraction', 'id' => $attraction->id], ['class' => 'thumbnail', 'style' => "background-color:$randomThumbnailColor;"]);
                    echo Html::a("", ['/attraction/view-attraction', 'id' => $attraction->id], ['class' => 'thumbnail thumbnail-hover', 'style' => "background-image:url('$imageURL');background-size:100% 100%;"]);
                echo "</div>";
                
                $i++;
            }
            
            //Check for any remaining widgets.
            if(!$weatherDisplayed)
            {
                //Echo our weather.
                $weatherDisplayed = true;
                echo "<div class='col-md-3 col-sm-4 col-xs-6'>";
                    echo "<div class='dummy'></div>";
                    echo "<a href='#' class='thumbnail'>";
                        echo $this->render('/widgets/_weather');
                    echo "</a>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</div>

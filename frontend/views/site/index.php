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
            $weatherLocation = 0;
            $weatherDisplayed = false;
            
            echo "<p>TODO: We are trying to display an image until we hover over the link. Then we want to see a solid color and the name of the attraction.</p>";
            
            $i = 0;
            foreach(Attraction::find()->all() as $attraction)
            {
                if($i == $weatherLocation)
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
            
                //Get attraction image.
                $imageURL = "http://i.imgur.com/B2x3TTy.jpg";
                //Look for a random image representing the attraction. If none is found, use a placeholder.
                $mediaConnection = AttractionMedia::find()->where(['attraction' => $attraction->id])->orderBy('RAND()')->one();
                if($mediaConnection)
                    $imageURL = $mediaConnection->url;
                
                //Echo our attraction.
                echo "<div class='col-md-3 col-sm-4 col-xs-6'>";
                    echo "<div class='dummy'></div>";
                    echo Html::a("<h2>$attraction->name</h2>", ['/attraction/view-attraction', 'id' => $attraction->id], ['class' => 'thumbnail', 'style' => 'background-color:#b91d47;']);
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

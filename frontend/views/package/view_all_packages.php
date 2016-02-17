<?php

/* 
 * Displays all packages. Can purchase packages from here.
 */
use app\models\Package;
use yii\helpers\BaseHtml;
use yii\helpers\Html;

function displayPackageSelection($index, $label, $name, $checked, $value)
{
    $return = "";             
    $model = Package::findOne($value);
    $return .= "<tr>";
        $return .= "<td><input type='radio' name='$name' value='$value' checked='$checked'></td>";
        $return .= "<td>$model->name</td>";
        $return .= "<td>" . Html::a("More Info...", ["view-package", 'id' => $model->id]) . "</td>";
        $return .= "<td>";
            if($model->includesGeneticsTour)
                $return .= "<span class='glyphicon glyphicon-ok'></span>";
            else
                $return .= "<span class='glyphicon glyphicon-remove'></span>";
        $return .= "</td>";
        $return .= "<td>";
            if($model->includesSafariTour)
                $return .= "<span class='glyphicon glyphicon-ok'></span>";
            else
                $return .= "<span class='glyphicon glyphicon-remove'></span>";
        $return .= "</td>";
        $return .= "<td>";
            if($model->includesFood)
                $return .= "<span class='glyphicon glyphicon-ok'></span>";
            else
                $return .= "<span class='glyphicon glyphicon-remove'></span>";
        $return .= "</td>";
        $return .= "<td>";
            if($model->includesHotel)
                $return .= "<span class='glyphicon glyphicon-ok'></span>";
            else
                $return .= "<span class='glyphicon glyphicon-remove'></span>";
        $return .= "</td>";
        $return .= "<td>$" . round($model->adultPrice, 2) . "</td>";
        $return .= "<td>$" . round($model->childPrice, 2) . "</td>";
    $return .= "</tr>";
    return $return;
}

//Generate package array.
$allPackages = Package::find()->all();
$packageOptions = array();
$defaultOption; //Will hold the last option available (ideally the most pricey).
foreach($allPackages as $package)
{
    $packageOptions[$package->id] = $package->name;
    $defaultOption = $package->id;
}

//Purchase ticket form.
echo BaseHtml::beginForm('@web/package/add-to-cart', 'GET');
    //Number of tickets.
    echo "<div>";
        echo "<p>Select the Number of Tickets</p>";
        echo BaseHtml::dropDownList("adultCount", "1", array(0,1,2,3,4,5,6,7,8,9,10));
        echo BaseHtml::dropDownList("childCount", "0", array(0,1,2,3,4,5,6,7,8,9,10));
    echo "</div>";
    //Package
    echo "<div>";
        echo "<p>Select Package</p>";
        echo "<table class='table'>";
            echo "<thead><tr>";
                echo "<td></td><td>Package</td><td></td><td>Genetics Tour</td><td>Safari Tour</td><td>Unlimited Food</td><td>Resort Stay</td><td>Adult Admission</td><td>Child Admission</td>";
            echo "</tr></thead>";
            echo "<tbody>";
            echo BaseHtml::radioList("id", $defaultOption, $packageOptions, ['item' => "displayPackageSelection"]);
            echo "</tbody>";
        echo "</table>";
    echo "</div>";
    //Submit Button
    echo Html::submitButton("Add To Cart", ['class' => 'btn btn-primary']);
BaseHtml::endForm();


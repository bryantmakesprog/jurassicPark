<?php
/*
 * Display all of our positions in the cart.
 */

use app\models\Package;
use yii\helpers\Html;

$cart = Yii::$app->cart;

if($cart->getCount() > 0)
{
    echo "<table class='table'>";
        echo "<thead><tr>";
            echo "<td class='col-md-7'>Package</td><td>Price</td><td>Quantity</td><td>Total</td><td></td>";
        echo "</tr></thead>";
        echo "<tbody>";
            foreach($cart->positions as $position){
                $model = Package::findOne($position->id);
                echo "<tr>";
                    echo "<td>" . $model->name . "</td>";
                    echo "<td>$" . round($position->getPrice(),2) . "</td>";
                    echo "<td>" . $position->getQuantity() . "</td>";
                    echo "<td>$" . round($position->getCost(),2) . "</td>";
                    //Remove Button
                    echo "<td>" . Html::a("<span class='glyphicon glyphicon-trash'></span> Delete", ['/package/remove-from-cart', 'id' => $position->id]) . "</td>";
                echo "</tr>";
            }
            echo "<tr></tr>";
            echo "<tr><td></td><td></td><td>Grand Total: </td><td>$" . round($cart->getCost(),2) . "</td><td></td></tr>";
        echo "</tbody>";
    echo "</table>";
    echo "<div class='jumbotron'>" . Html::a("Checkout", ['/package/checkout'], ['class' => 'btn btn-success']) . "</div>";
}
else
{
    echo "<div class='jumbotron'>";
        echo "<h1>Your Cart Is Empty!</h1>";
        echo "<p>Did a compy gobble all your tickets? Let us help you pick the perfect package.</p>";
        echo Html::a("Browse Packages", ['/package/view-all-packages'], ['class' => 'btn btn-success']);
    echo "</div>";
}

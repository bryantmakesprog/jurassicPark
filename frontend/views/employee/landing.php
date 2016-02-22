<?php

/* 
 * Draws the appropriate functions for the current employee.
 */

use common\models\User;

//Get our current user.
$user = User::find()->where(['username' => Yii::$app->user->identity->username])->one();

//Check against each role.
//Bryant - Everything.
$isBryant = User::userIsBryant();

echo "<table class='table'>";

//-Operations and Sales-------------------------------------------------------//
//Operator - Redeem Tickets, Check In/Out
//Ops Manager - Redeem Tickets, Check In/Out, Check Statistics
$isOperator = false; //TODO -------------------------------------------------------------------------------------/////
$isOpsManager = false;
if($isOperator || $isOpsManager || $isBryant)
{
    echo $this->render('_sales');
}

//-Web Administration---------------------------------------------------------//
//Admin - Modify Attractions, Modify Media, Modify Users
$isAdmin = User::userIsAdmin();
if($isAdmin || $isBryant)
{
    echo $this->render('_admin');
}

echo "</table>";
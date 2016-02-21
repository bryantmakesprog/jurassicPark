<?php

/* 
 * Display countdown to park opening.
 */

$openingDate = new DateTime('1990-09-24 08:10:00');
$currentDate = new DateTime();
$interval = date_diff($openingDate,$currentDate);
$dateString = "";
if($openingDate->getTimestamp() < $currentDate->getTimestamp())
    $dateString .= "-";
$dateString .= $interval->format('%yy:%mm:%dd:%hh');

echo $dateString;


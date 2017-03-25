<?php

$city_contest = 'Moscow';
$directions = 'IT';
$volume = 0;

if(isset($_GET["city_contest"])){
    $city_contest = $_GET["city_contest"];
}
if(isset($_GET["directions"])){
    $directions = $_GET["directions"];
}
if(isset($_GET["volume"])){
    $volume = $_GET["volume"];
}

include_once('Finvisor.php');

$obj = new FinancialServices();
$obj->displayFilterContest($city_contest, $directions, $volume);

?>
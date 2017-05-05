<?php

$round = 'preseed';
$directions = 'IT';

if(isset($_GET["round"])){
    $round = $_GET["round"];
}
if(isset($_GET["directions"])){
    $directions = $_GET["directions"];
}

include_once('Finvisor.php');

$obj = new FinancialServices();
$obj->displayFilterFund($round, $directions);

?>
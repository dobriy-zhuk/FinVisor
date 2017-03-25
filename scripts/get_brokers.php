<?php

$min_sum = 0;

if(isset($_GET["min_sum"])){
    $min_sum = $_GET["min_sum"];
}

include_once('Finvisor.php');

$obj = new FinancialServices();
$obj->displayFilterBrokers($min_sum);

?>
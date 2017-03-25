<?php

$type_fund = 'Государственный';
$directions = 'IT';

if(isset($_GET["type_fund"])){
    $type_fund = $_GET["type_fund"];
}
if(isset($_GET["directions"])){
    $directions = $_GET["directions"];
}

include_once('Finvisor.php');

$obj = new FinancialServices();
$obj->displayFilterFund($type_fund, $directions);

?>
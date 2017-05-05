<?php

$min_time = 0;
$currency = 'RUB';
$min_balance = 0;
$payment = 1;
$order_by = 'interest_rate';
$page = 10;

if(isset($_GET["min_time"])){
    $min_time = $_GET["min_time"];
}
if(isset($_GET["currency"])){
    $currency = $_GET["currency"];
}
if(isset($_GET["min_balance"])){
    $min_balance = $_GET["min_balance"];
}
if(isset($_GET["payment"])){
    $payment = $_GET["payment"];
}
if(isset($_GET["page"])){
    $page = $_GET["page"];
}

include_once('Finvisor.php');

$obj = new FinancialServices();
$obj->displayFilterDeposits($min_time, $currency, $min_balance, $payment,$order_by, $page);

?>
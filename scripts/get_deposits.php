<?php

$time = 0;
$currency = 'RUB';
$min_balance = 0;
$payment = 1;
$order_by = 'rate';
$page = 10;

if(isset($_GET["time"])){
    $time = $_GET["time"];
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
$obj->displayFilterDeposits($time, $currency, $min_balance, $payment,$order_by, $page);

?>
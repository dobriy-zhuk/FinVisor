<?php

$currency= 'RUB';
$interest_rate = 100;
$credit_time = 100;
$max_credit = 1000;
$order_by = 'interest_rate';
$page = 10;

if(isset($_GET["currency"])){
    $currency = $_GET["currency"];
}
if(isset($_GET["interest_rate"])){
    $interest_rate = $_GET["interest_rate"];
}
if(isset($_GET["credit_time"])){
    $credit_time = $_GET["credit_time"];
}

include_once('Finvisor.php');

$obj = new FinancialServices();
$obj->displayFilterCreditCapital($currency, $interest_rate, $credit_time, $max_credit, $order_by, $page);

?>
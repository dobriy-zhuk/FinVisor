<?php

$first_pay = 20;
$interest_rate = 100;
$credit_time = 48;
$max_credit = 100;
$order_by = 'interest_rate';
$page = 10;

if(isset($_GET["first_pay"])){
    $first_pay = $_GET["first_pay"];
}
if(isset($_GET["interest_rate"])){
    $interest_rate = $_GET["interest_rate"];
}
if(isset($_GET["credit_time"])){
    $credit_time = $_GET["credit_time"];
}

include_once('Finvisor.php');

$obj = new FinancialServices();
$obj->displayFilterCreditLeasing($first_pay, $interest_rate, $credit_time, $max_credit, $order_by, $page);

?>
<?php

$first_pay = 0;
$interest_rate = 100;
$credit_time = 720;
$max_credit = 1000;
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
$obj->displayFilterCreditMortgage($first_pay, $interest_rate, $credit_time, $max_credit, $order_by, $page);

?>
<?php

$pledge = 'no';
$interest_rate = 100;
$credit_time = 50;
$max_credit = 10000000;
$order_by = 'interest_rate';
$page = 10;

if(isset($_GET["pledge"])){
    $pledge = $_GET["pledge"];
}
if(isset($_GET["interest_rate"])){
    $interest_rate = $_GET["interest_rate"];
}
if(isset($_GET["credit_time"])){
    $credit_time = $_GET["credit_time"];
}
if(isset($_GET["max_credit"])){
    $max_credit = $_GET["max_credit"];
}

include_once('Finvisor.php');

$obj = new FinancialServices();
$obj->displayFilterCredit($pledge, $interest_rate, $credit_time, $max_credit, $order_by, $page);

?>
<?php

$type_acquiring = 'online';
$transfer_price = 5;
$transfer_speed = 5;
$min_income = 0;
$order_by = 'transfer_price';
$page = 10;

if(isset($_GET["type_acquiring"])){
    $type_acquiring = $_GET["type_acquiring"];
}
if(isset($_GET["transfer_price"])){
    $transfer_price = $_GET["transfer_price"];
}
if(isset($_GET["transfer_speed"])){
    $transfer_speed = $_GET["transfer_speed"];
}
if(isset($_GET["min_income"])){
    $min_income = $_GET["min_income"];
}
if(isset($_GET["connection_fee"])){
    $connection_fee = $_GET["connection_fee"];
}
if(isset($_GET["page"])){
    $page = $_GET["page"];
}

include_once('Finvisor.php');

$obj = new FinancialServices();
$obj->displayFilterAcquiring($type_acquiring, $transfer_price, $transfer_speed,$min_income, $order_by, $page);

?>
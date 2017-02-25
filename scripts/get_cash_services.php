<?php

$id = 0;
$cashback = 0;
$transfer_price = 0;
$subscription_fee = 0;
$remote_banking_price = 0;
$cash_out = 0;

if(isset($_GET["id"])){
    $id = $_GET["id"];
}
if(isset($_GET["cashback"])){
    $cashback = $_GET["cashback"];
}
if(isset($_GET["transfer_price"])){
    $transfer_price = $_GET["transfer_price"];
}
if(isset($_GET["subscription_fee"])){
    $subscription_fee = $_GET["subscription_fee"];
}
if(isset($_GET["remote_banking_price"])){
    $remote_banking_price = $_GET["remote_banking_price"];
}
if(isset($_GET["cash_out"])){
    $cash_out = $_GET["cash_out"];
}


include_once('Finvisor.php');

$obj = new CashServices();
$obj->displayFilter($cashback,$transfer_price,$subscription_fee,$remote_banking_price,$cash_out);

?>
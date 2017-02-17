<?php

$id = $_GET["id"];
$cashback = $_GET["cashback"];
$transfer_price = $_GET["transfer_price"];
$subscription_fee = $_GET["subscription_fee"];
$remote_banking_price = $_GET["remote_banking_price"];
$withdrawal_commission = $_GET["withdrawal_commission"];


include_once('Finvisor.php');

$obj = new CashServices();
$obj->displayFilter($cashback,$transfer_price,$subscription_fee,$remote_banking_price,$withdrawal_commission,$limit);


?>
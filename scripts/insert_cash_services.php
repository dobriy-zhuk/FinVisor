<?php

include_once('Finvisor.php');

$product = new Bank_Cash_Service();
$product->name_bank = $_POST["name_bank"];
$product->name_tariff = $_POST["name_tariff"];
$product->subscription_fee = $_POST["subscription_fee"];
$product->transfer_price = $_POST["transfer_price"];


$obj = new CashServices();
$obj->insertData($product);

?>
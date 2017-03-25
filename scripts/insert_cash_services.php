<?php

include_once('Finvisor.php');

$product = new Bank_Cash_Service();

if(isset($_POST["name_bank"])){
    $product->name_bank = $_POST["name_bank"];
}
if(isset($_POST["name_tariff"])){
    $product->name_tariff = $_POST["name_tariff"];
}
if(isset($_POST["subscription_fee"])){
    $product->subscription_fee = $_POST["subscription_fee"];
}
if(isset($_POST["transfer_price"])){
    $product->transfer_price = $_POST["transfer_price"];
}

$obj = new FinancialServices();
$obj->insertData($product);

?>
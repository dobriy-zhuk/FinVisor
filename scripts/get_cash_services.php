<?php

$id = $_GET["id"];
$subscription_fee = $_GET["subscription_fee"];


include_once('Finvision.php');

$obj = new CashServices();
$obj->displayParam();


?>
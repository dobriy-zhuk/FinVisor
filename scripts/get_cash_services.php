<?php

$id = $_GET["id"];
$subscription_fee = $_GET["subscription_fee"];


include_once('Finvisor.php');

$obj = new CashServices();
$obj->displayParam($subscription_fee);


?>
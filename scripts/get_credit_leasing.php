<?php

$object = 'transport';
$page = 100;

if(isset($_GET["object"])){
    $object = $_GET["object"];
}

include_once('Finvisor.php');

$obj = new FinancialServices();
$obj->displayFilterCreditLeasing($object, $order_by, $page);

?>
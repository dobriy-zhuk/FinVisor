<?php

$type_insurance = 'transport';

if(isset($_GET["type_insurance"])){
    $type_insurance = $_GET["type_insurance"];
}

include_once('Finvisor.php');

$obj = new FinancialServices();
$obj->displayFilterInsurance($type_insurance);

?>
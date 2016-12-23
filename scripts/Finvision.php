<?php

include_once ('config.php');

class Finvision {

    public $BankName;

    function __construct() {

    }

    public function displayBankName(){
        echo $this->$BankName;
    }
}


class CashServices extends Finvision {

     public static $banks =  array();

    function __construct(){

        $result = mysql_query( 'SELECT id, name_bank,name_tariff FROM cash_service' );

        if(! $result ) {
            die('Could not get data: ' . mysql_error());
        }

        $i = 0;
        while($row = mysql_fetch_array($result, MYSQL_ASSOC))
        {

            self::$banks[$i] = new Bank_Cash_Service();
            self::$banks[$i]->id = $row['id'];
            self::$banks[$i]->name_bank = $row['name_bank'];
            self::$banks[$i]->name_tariff = $row['name_tariff'];

            $i++;
        }

    }

    public function showAll(){

        foreach (self::$banks as &$bank) {
            echo "ID :{$bank->id}  <br> ".
                "Name Bank: {$bank->name_bank} <br> ".
                "Name Tariff: {$bank->name_tariff} <br> ".
                "--------------------------------<br>";
        }

    }
}

class Bank_Cash_Service {
    public $id;
    public $name_bank;
    public $name_tariff;
}

?>
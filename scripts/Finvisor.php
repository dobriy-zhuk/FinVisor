<?php

include_once('config.php');

class Finvisor {

    public $BankName;

    function __construct() {



    }

    public function displayBankName(){
        echo $this->$BankName;
    }
}


class CashServices extends Finvisor {

    public static $banks =  array();
    public static $bankCashService;
    private static $conn;


    function __construct(){

        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '787876';
        $dbname = 'FINVISION';

        self::$conn = mysql_connect($dbhost, $dbuser, $dbpass);

        if(! self::$conn ) {
            die('Could not connect: ' . mysql_error());
        }

        if (!mysql_select_db($dbname)) {
            die('Could not select database: ' . mysql_error());
        }

        mysql_set_charset('utf8');




        self::$bankCashService = new Bank_Cash_Service();

    }

    private function getAll(){


        $result = mysql_query( 'SELECT * FROM cash_service' );

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
            self::$banks[$i]->subscription_fee = $row['subscription_fee'];
            self::$banks[$i]->transfer_price = $row['transfer_price'];

            $i++;
        }
/*
        foreach (self::$banks as &$bank) {

            echo <<< END
                <tr style='height: 100px'>
                <th scope="row">$bank->id</th>
                <td>$bank->name_bank <br>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Button with data-target
                </button>
                <div class="collapse" id="collapseExample">
                <div class="card card-block">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </div>
                </td>
                <td>$bank->name_tariff</td>
                <td>$bank->subscription_fee</td>
                <td>$bank->subscription_fee</td>
                </tr>
END;

        }
*/
    }

    public function displayParam($subscription_fee){
        self::getAll();

        usort(self::$banks, function($a, $b) {
                if($a->subscription_fee == $b->subscription_fee) return 0;
                else if ($a->subscription_fee < $b->subscription_fee) return -1;
                else return 1;
        } );

        echo json_encode(self::$banks);

    }

    public function insertData($bankCashService){


        $sql = "INSERT INTO cash_service(name_bank, name_tariff, subscription_fee, transfer_price)
        VALUES ('$bankCashService->name_bank', '$bankCashService->name_tariff', '$bankCashService->subscription_fee', '$bankCashService->transfer_price')";

        $retval = mysql_query( $sql, self::$conn );

        if(! $retval ) {
            die('Could not enter data: ' . mysql_error());
        }

        echo "Entered data successfully\n";

    }


}

class Bank_Cash_Service {
    public $id;
    public $name_bank;
    public $name_tariff;
    public $subscription_fee;
    public $transfer_price;
}

?>
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
        $dbname = 'kursokrf_fin';

        self::$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

        if (self::$conn->connect_errno) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

        if(! self::$conn ) {
            die('Could not connect: ' . mysql_error());
        }

        if (!self::$conn->set_charset("utf8")) {
            printf("Error loading character set utf8: %s\n", self::$conn->error);
            exit();
        }

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

    public function displayFilter($cashback, $transfer_price, $subscription_fee, $remote_banking_price, $cash_out){


         if($cashback == 1){
             $result = self::$conn->query("SELECT * FROM cash_service WHERE cashback > 0");
         }
         else if($transfer_price == 1){
             $result = self::$conn->query("SELECT * FROM cash_service WHERE transfer_price = 0");
         }
         else if($subscription_fee == 1){
             $result = self::$conn->query("SELECT * FROM cash_service WHERE subscription_fee = 0");
         }
         else if($remote_banking_price == 1){
             $result = self::$conn->query("SELECT * FROM cash_service WHERE remote_banking_price = 0");
         }
         else if($cash_out == 1){
             $result = self::$conn->query("SELECT * FROM cash_service WHERE cash_out = 0");
         }
         else
         {
             $result = self::$conn->query("SELECT * FROM cash_service");
         }

         $i = 0;
         while($row = $result->fetch_assoc())
         {

             self::$banks[$i] = new Bank_Cash_Service();
             self::$banks[$i]->id = $row['id'];
             self::$banks[$i]->name_bank = $row['name_bank'];
             self::$banks[$i]->logo_bank = $row['logo_bank'];
             self::$banks[$i]->name_tariff = $row['name_tariff'];
             self::$banks[$i]->subscription_fee = $row['subscription_fee'];
             self::$banks[$i]->transfer_price = $row['transfer_price'];
             self::$banks[$i]->remote_banking_price = $row['remote_banking_price'];
             self::$banks[$i]->cash_out = $row['cash_out'];
             self::$banks[$i]->details = $row['details'];
             self::$banks[$i]->open_fee = $row['open_fee'];

             $i++;
         }

        $result->free();

        echo json_encode(self::$banks);

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


        $sql = "INSERT INTO cash_service(name_bank, name_tariff, subscription_fee, transfer_price) VALUES ('$bankCashService->name_bank', '$bankCashService->name_tariff', '$bankCashService->subscription_fee', '$bankCashService->transfer_price')";

        mysqli_query(self::$conn, $sql);

        printf ("New Record has id %d.\n", mysqli_insert_id(self::$conn));

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
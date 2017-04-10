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


class FinancialServices extends Finvisor {

    public static $banks =  array();
    public static $bankCashService;
    private static $conn;


    function __construct(){

        $dbhost = 'localhost';
        $dbuser = 'kursokrf_fin';
        $dbpass = 'dobriy76';
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
    }

    public function displayFilterCashService($cashback, $transfer_price, $subscription_fee, $remote_banking_price, $cash_out){


         if($cashback == 1){
             $result = self::$conn->query("SELECT * FROM cash_service LEFT JOIN financial_institution using(id_institution) WHERE cashback > 0");
         }
         else if($transfer_price == 1){
             $result = self::$conn->query("SELECT * FROM cash_service LEFT JOIN financial_institution using(id_institution) WHERE transfer_price = 0");
         }
         else if($subscription_fee == 1){
             $result = self::$conn->query("SELECT * FROM cash_service LEFT JOIN financial_institution using(id_institution) WHERE subscription_fee = 0");
         }
         else if($remote_banking_price == 1){
             $result = self::$conn->query("SELECT * FROM cash_service LEFT JOIN financial_institution using(id_institution) WHERE remote_banking_price = 0");
         }
         else if($cash_out == 1){
             $result = self::$conn->query("SELECT * FROM cash_service LEFT JOIN financial_institution using(id_institution) WHERE cash_service.cash_out=0;");
         }
         else
         {
             $result = self::$conn->query("SELECT * FROM cash_service LEFT JOIN financial_institution using(id_institution)");
         }

         $i = 0;
         while($row = $result->fetch_assoc())
         {

             self::$banks[$i] = new Bank_Cash_Service();
             self::$banks[$i]->id = $row['id'];
             self::$banks[$i]->name_institution = $row['name_institution'];
             self::$banks[$i]->logo_institution = $row['logo_institution'];
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

    public function displayFilterAcquiring($type_acquiring,$transfer_price, $transfer_speed, $min_income, $order_by, $page){

        $query = "SELECT * FROM acquiring LEFT JOIN financial_institution using(id_institution)
                    WHERE type_acquiring = '$type_acquiring' AND transfer_price <= '$transfer_price'
                    AND transfer_speed <= '$transfer_speed' AND min_income >= '$min_income' order by $order_by LIMIT $page";

        $result = self::$conn->query($query);



        $i = 0;
        while($row = $result->fetch_assoc())
        {

            self::$banks[$i] = new Bank_Acquiring();
            self::$banks[$i]->id = $row['id'];
            self::$banks[$i]->name_institution = $row['name_institution'];
            self::$banks[$i]->logo_institution = $row['logo_institution'];
            self::$banks[$i]->name_tariff = $row['name_tariff'];
            self::$banks[$i]->type_acquiring = $row['type_acquiring'];
            self::$banks[$i]->transfer_price = $row['transfer_price'];
            self::$banks[$i]->transfer_speed = $row['transfer_speed'];
            self::$banks[$i]->connection_fee = $row['connection_fee'];
            self::$banks[$i]->min_income = $row['min_income'];
            self::$banks[$i]->details = $row['details'];

            $i++;
        }

        $result->free();

        echo json_encode(self::$banks);

    }

    public function displayFilterDeposits($min_time, $currency, $min_balance,$payment, $order_by, $page){

        $query = "SELECT * FROM deposits LEFT JOIN financial_institution using(id_institution)
                    WHERE min_time >= '$min_time' AND currency LIKE '%$currency%'
                    AND min_balance >= '$min_balance' AND payment = '$payment' order by $order_by DESC LIMIT $page";

        $result = self::$conn->query($query);



        $i = 0;
        while($row = $result->fetch_assoc())
        {

            self::$banks[$i] = new Bank_Deposit();
            self::$banks[$i]->id = $row['id'];
            self::$banks[$i]->name_institution = $row['name_institution'];
            self::$banks[$i]->logo_institution = $row['logo_institution'];
            self::$banks[$i]->name_deposit = $row['name_deposit'];
            self::$banks[$i]->rate = $row['rate'];
            self::$banks[$i]->min_time = $row['min_time'];
            self::$banks[$i]->currency = $row['currency'];
            self::$banks[$i]->min_balance = $row['min_balance'];
            self::$banks[$i]->payment = $row['payment'];
            self::$banks[$i]->details = $row['details'];

            $i++;
        }

        $result->free();

        echo json_encode(self::$banks);

    }


    public function displayFilterCredit($pledge, $interest_rate, $credit_time, $max_credit, $order_by, $page){

        $query = "SELECT * FROM credit LEFT JOIN financial_institution using(id_institution)
                    WHERE pledge = '$pledge' AND interest_rate <= '$interest_rate'
                    AND credit_time <= '$credit_time' AND max_credit <= '$max_credit' order by $order_by LIMIT $page";

        $result = self::$conn->query($query);

        $i = 0;
        while($row = $result->fetch_assoc())
        {

            self::$banks[$i] = new Credit();
            self::$banks[$i]->id = $row['id'];
            self::$banks[$i]->name_institution = $row['name_institution'];
            self::$banks[$i]->logo_institution = $row['logo_institution'];
            self::$banks[$i]->name_tariff = $row['name_tariff'];
            self::$banks[$i]->pledge = $row['pledge'];
            self::$banks[$i]->interest_rate = $row['interest_rate'];
            self::$banks[$i]->credit_time = $row['credit_time'];
            self::$banks[$i]->max_credit = $row['max_credit'];
            self::$banks[$i]->details = $row['details'];

            $i++;
        }

        $result->free();

        echo json_encode(self::$banks);

    }

    public function displayFilterCreditMortgage($first_pay, $interest_rate, $credit_time, $max_credit, $order_by, $page){

        $query = "SELECT * FROM credit_mortgage LEFT JOIN financial_institution using(id_institution)
                    WHERE first_pay = '$first_pay' AND interest_rate <= '$interest_rate'
                    AND credit_time <= '$credit_time' order by $order_by LIMIT $page";

        $result = self::$conn->query($query);

        $i = 0;
        while($row = $result->fetch_assoc())
        {

            self::$banks[$i] = new CreditMortgage();
            self::$banks[$i]->id = $row['id'];
            self::$banks[$i]->name_institution = $row['name_institution'];
            self::$banks[$i]->logo_institution = $row['logo_institution'];
            self::$banks[$i]->first_pay = $row['first_pay'];
            self::$banks[$i]->currency = $row['currency'];
            self::$banks[$i]->interest_rate = $row['interest_rate'];
            self::$banks[$i]->credit_time = $row['credit_time'];
            self::$banks[$i]->max_credit = $row['max_credit'];
            self::$banks[$i]->postponement = $row['postponement'];
            self::$banks[$i]->details = $row['details'];

            $i++;
        }

        $result->free();

        echo json_encode(self::$banks);

    }

    public function displayFilterCreditCapital($currency, $interest_rate, $credit_time, $max_credit, $order_by, $page){

        $query = "SELECT * FROM credit_capital LEFT JOIN financial_institution using(id_institution)
                    WHERE currency LIKE '%$currency%' AND interest_rate <= '$interest_rate'
                    AND credit_time <= '$credit_time' order by $order_by LIMIT $page";

        $result = self::$conn->query($query);

        $i = 0;
        while($row = $result->fetch_assoc())
        {

            self::$banks[$i] = new CreditCapital();
            self::$banks[$i]->id = $row['id'];
            self::$banks[$i]->name_institution = $row['name_institution'];
            self::$banks[$i]->logo_institution = $row['logo_institution'];
            self::$banks[$i]->currency = $row['currency'];
            self::$banks[$i]->interest_rate = $row['interest_rate'];
            self::$banks[$i]->credit_time = $row['credit_time'];
            self::$banks[$i]->max_credit = $row['max_credit'];
            self::$banks[$i]->details = $row['details'];

            $i++;
        }

        $result->free();

        echo json_encode(self::$banks);

    }

    public function displayFilterCreditLeasing($first_pay, $interest_rate, $credit_time, $max_credit, $order_by, $page){

        $query = "SELECT * FROM credit_leasing LEFT JOIN financial_institution using(id_institution)
                    WHERE first_pay <= '$first_pay' AND interest_rate <= '$interest_rate'
                    AND credit_time <= '$credit_time' order by $order_by LIMIT $page";

        $result = self::$conn->query($query);

        $i = 0;
        while($row = $result->fetch_assoc())
        {

            self::$banks[$i] = new CreditLeasing();
            self::$banks[$i]->id = $row['id'];
            self::$banks[$i]->name_institution = $row['name_institution'];
            self::$banks[$i]->logo_institution = $row['logo_institution'];
            self::$banks[$i]->first_pay = $row['first_pay'];
            self::$banks[$i]->currency = $row['currency'];
            self::$banks[$i]->interest_rate = $row['interest_rate'];
            self::$banks[$i]->credit_time = $row['credit_time'];
            self::$banks[$i]->max_credit = $row['max_credit'];
            self::$banks[$i]->details = $row['details'];

            $i++;
        }

        $result->free();

        echo json_encode(self::$banks);

    }


    public function displayFilterInsurance($type_insurance){

        $query = "SELECT * FROM insurance LEFT JOIN financial_institution using(id_institution)
                    WHERE type_insurance = '$type_insurance'";

        $result = self::$conn->query($query);

        $i = 0;
        while($row = $result->fetch_assoc())
        {

            self::$banks[$i] = new Insurance();
            self::$banks[$i]->id = $row['id'];
            self::$banks[$i]->name_institution = $row['name_institution'];
            self::$banks[$i]->logo_institution = $row['logo_institution'];
            self::$banks[$i]->type_insurance = $row['type_insurance'];
            self::$banks[$i]->risks = $row['risks'];
            self::$banks[$i]->rating = $row['rating'];
            self::$banks[$i]->price = $row['price'];

            $i++;
        }

        $result->free();

        echo json_encode(self::$banks);

    }

    public function displayFilterFund($type_fund, $directions){

        $query = "SELECT * FROM fund LEFT JOIN financial_institution using(id_institution)
                    WHERE type_fund = '$type_fund' AND directions LIKE '%$directions%'";

        $result = self::$conn->query($query);

        $i = 0;
        while($row = $result->fetch_assoc())
        {

            self::$banks[$i] = new Fund();
            self::$banks[$i]->id = $row['id'];
            self::$banks[$i]->name_institution = $row['name_institution'];
            self::$banks[$i]->logo_institution = $row['logo_institution'];
            self::$banks[$i]->type_fund = $row['type_fund'];
            self::$banks[$i]->directions = $row['directions'];
            self::$banks[$i]->volume = $row['volume'];

            $i++;
        }

        $result->free();

        echo json_encode(self::$banks);

    }

    public function displayFilterContest($city_contest, $directions, $volume){

        $query = "SELECT * FROM contest LEFT JOIN financial_institution using(id_institution)
                    WHERE city_contest = '$city_contest' AND  directions LIKE '%$directions%' AND volume >= '$volume' order by date_begin";

        $result = self::$conn->query($query);

        $i = 0;
        while($row = $result->fetch_assoc())
        {

            self::$banks[$i] = new Fund();
            self::$banks[$i]->id = $row['id'];
            self::$banks[$i]->name_institution = $row['name_institution'];
            self::$banks[$i]->logo_institution = $row['logo_institution'];
            self::$banks[$i]->city_contest = $row['city_contest'];
            self::$banks[$i]->directions = $row['directions'];
            self::$banks[$i]->volume = $row['volume'];

            $date_begin = strtotime($row['date_begin']);
            $date_begin = date("d.m.Y",$date_begin);

            $date_end = strtotime($row['date_end']);
            $date_end = date("d.m.Y",$date_end);

            self::$banks[$i]->date_begin = $date_begin;
            self::$banks[$i]->date_end = $date_end;

            $i++;
        }

        $result->free();

        echo json_encode(self::$banks);

    }

    public function displayFilterBrokers($min_sum){

        $query = "SELECT * FROM brokers LEFT JOIN financial_institution using(id_bank)
                    WHERE min_sum >= '$min_sum'";

        $result = self::$conn->query($query);

        $i = 0;
        while($row = $result->fetch_assoc())
        {

            self::$banks[$i] = new Fund();
            self::$banks[$i]->id = $row['id'];
            self::$banks[$i]->name_broker = $row['name_broker'];
            self::$banks[$i]->logo_bank = $row['logo_bank'];
            self::$banks[$i]->commission = $row['commission'];
            self::$banks[$i]->min_sum = $row['min_sum'];
            self::$banks[$i]->instruments = $row['instruments'];
            self::$banks[$i]->rating = $row['rating'];

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
    public $name_institution;
    public $name_tariff;
    public $subscription_fee;
    public $transfer_price;
}

class Bank_Acquiring {
    public $id;
    public $name_institution;
    public $type_acquiring;
    public $transfer_price;
    public $transfer_speed;
    public $connection_fee;
    public $min_income;
}

class Bank_Deposit {
    public $id;
    public $name_institution;
    public $name_deposit;
    public $rate;
    public $min_time;
    public $currency;
    public $min_balance;
    public $payment;
}

class Credit {
    public $id;
    public $name_institution;
    public $logo_institution;
    public $type;
    public $interest_rate;
    public $credit_time;
    public $max_credit;
}

class CreditMortgage {
    public $id;
    public $name_institution;
    public $logo_institution;
    public $interest_rate;
    public $credit_time;
    public $max_credit;
    public $postponement;
    public $details;
}

class CreditCapital {
    public $id;
    public $name_institution;
    public $logo_institution;
    public $currency;
    public $interest_rate;
    public $credit_time;
    public $max_credit;
    public $details;
}

class CreditLeasing {
    public $id;
    public $name_institution;
    public $logo_institution;
    public $interest_rate;
    public $credit_time;
    public $max_credit;
    public $details;
}

class Insurance {
    public $id;
    public $name_institution;
    public $logo_institution;
    public $type_insurance;
    public $risks;
    public $rating;
    public $price;
}

class Fund {
    public $id;
    public $name_fund;
    public $type_fund;
    public $directions;
    public $volume;
}

class Contest {
    public $id;
    public $name_institution;
    public $logo_institution;
    public $city_contest;
    public $directions;
    public $volume;
    public $date_begin;
    public $date_end;
}


?>
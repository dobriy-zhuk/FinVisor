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

            $i++;
        }

    }

    public function showAll(){

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
                </tr>
END;

        }

    }

    public function displayParam(){

        usort(self::$banks, function($a, $b) {
            if($a->subscription_fee == $b->subscription_fee) return 0;
            else if ($a->subscription_fee > $b->subscription_fee) return -1;
            else return 1;
        } );

  /*      foreach (self::$banks as $bank) {
            echo <<< END
                <tr style='height: 100px'>
                <th scope="row">$bank->id</th>
                <td>$bank->name_bank <br>
                <a data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Button with data-target
                </button>
                <div class="collapse" id="collapseExample">
                <div class="card card-block">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </div>
                </td>
                <td>$bank->name_tariff</td>
                <td>$bank->subscription_fee</td>
                </tr>
END;

        }*/
        echo json_encode(self::$banks);




    }


}

class Bank_Cash_Service {
    public $id;
    public $name_bank;
    public $name_tariff;
    public $subscription_fee;
}

?>
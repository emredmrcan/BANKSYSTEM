<?php
/**
 * Created by PhpStorm.
 * User: Emre
 * Date: 27.5.2017
 * Time: 15:23
 */
session_start();
if (isset($_POST['submitPayment'])){
    $json_url = file_get_contents('http://banksystem.tk/BusinessLayer/credit.txt');
    echo $json_url;
    $obj = json_decode($json_url,true);
    $item = $obj;

    if($_POST['card-number-1'] = $item['credits'][0]['CardNumber1']){
        $purchasedTicket = array();
        $c = $_SESSION['takeTicket'];
        array_push( $purchasedTicket, array("ButtonId"=>$c));
        $arr = json_encode(array('purchasedTicket' => $purchasedTicket));
        file_put_contents("creditFile.txt", "");
        $file = 'creditFile.txt';
        $içerik = file_get_contents($file);
        $içerik = $arr;
        file_put_contents($file, $içerik);

        //------------------------------------------------Purchased  Ticket---------------------------------------------

        $json_url = file_get_contents('http://tiyatrodunyasi.tk/PresentationLayer/webService.txt');
        $json_url2 = file_get_contents('http://banksystem.tk/BusinessLayer/ticket.txt');
        //echo $json_url;
        $obj = json_decode($json_url,true);
        $obj2 = json_decode($json_url2,true);
        $item = $obj;

        $category = "Theatre";
        $quantity = $obj2['tickets'][0]['TicketId'];
        $tName = $item['activities'][0]['name'];
        $tEmail = $item['activities'][0]['email'];
        $tDate = $item['activities'][0]['date'];
        $tPlace = $item['activities'][0]['place'];
        $tPrice = $item['activities'][0]['price'];
        echo "merhaba : ".$category.$quantity.$tName.$tEmail.$tDate.$tPlace.$tPrice;
        require_once('../LogicLayer/TicketManagement.php');
        TicketManagement::insertNewTicket($tEmail,$category,$tPlace,$tDate,$tPrice,$quantity);
        //--------------------------------------------------------------------------------------------------------------
    }
   /* echo $_POST['card-number-1']."\n";
    echo $_POST['card-number-2']."\n";
    echo $_POST['card-number-3']."\n";
    echo $_POST['card-number-4']."\n";
    echo $_POST['card-holder-name']."\n";
    echo $_POST['card-exp-month']."\n";
    echo $_POST['card-exp-year']."\n";
    echo $_POST['card-ccv']."\n";*/

}
?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Project #002: Checkout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="../css/styleCC.css">


</head>

<body background="../img/SlideShowUser/Rome.jpg">

<!-- Checkout-->
<div class="checkout">
    <!-- Checkout content-->
    <div class="checkout__inner">
        <!-- Credit card-->
        <div class="card">
            <!-- Flip container-->
            <div class="flip">
                <!-- Flip front-->
                <div class="flip__front shown">
                    <!-- Card front-->
                    <div class="card__front">
                        <!-- Card logo-->
                        <div class="card__logo top-right"></div>
                        <!-- Card chip-->
                        <div class="card__chip"></div>
                        <!-- Card number-->
                        <div class="card__number"></div>
                        <!-- Card name-->
                        <div class="card__holder-name"></div>
                        <!-- Card expiration-->
                        <div class="card__exp"></div>
                    </div>
                </div>
                <!-- Flip back-->
                <div class="flip__back">
                    <!-- Card back-->
                    <div class="card__back">
                        <!-- Card strip-->
                        <div class="card__strip"></div>
                        <!-- Card ccv-->
                        <div class="card__ccv"></div>
                        <!-- Card logo-->
                        <div class="card__logo bottom-right"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Checkout form  http://tiyatrodunyasi.tk/LogicLayer/reservation.php -->
        <form class="form" method="post" action="http://tiyatrodunyasi.tk/LogicLayer/reservation.php">
            <!-- Card number-->
            <fieldset>
                <label class="form__label" for="card-number-1">Card number</label>
                <input class="form__input small" name="card-number-1" id="card-number-1"  type="tel" minlength="4" maxlength="4" placeholder="1234"/>
                <input class="form__input small" name="card-number-2" id="card-number-2" type="tel" maxlength="4" placeholder="5678"/>
                <input class="form__input small" name="card-number-3" id="card-number-3" type="tel" maxlength="4" placeholder="9000"/>
                <input class="form__input small" name="card-number-4" id="card-number-4" type="tel" maxlength="4" placeholder="4321"/>
            </fieldset>
            <!-- Card name-->
            <fieldset>
                <label class="form__label" for="card-holder-name">Card Holder</label>
                <input class="form__input large" name="card-holder-name" id="card-holder-name" type="text" placeholder="Name"/>
            </fieldset>
            <!-- Card expiration-->
            <fieldset>
                <label class="form__label" for="card-exp-month">Expiration Date</label>
                <select class="form__select small" name="card-exp-month" id="card-exp-month">
                    <option value="">MM</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                <select class="form__select small" name="card-exp-year" id="card-exp-year">
                    <option value="">YYYY</option>
                    <option value="17">2017</option>
                    <option value="18">2018</option>
                    <option value="19">2019</option>
                    <option value="20">2020</option>
                    <option value="21">2021</option>
                    <option value="22">2022</option>
                    <option value="23">2023</option>
                    <option value="24">2024</option>
                    <option value="25">2025</option>
                </select>
            </fieldset>
            <!-- Card ccv-->
            <fieldset>
                <label class="form__label" for="card-ccv">CCV</label>
                <input class="form__input small" name="card-ccv" id="card-ccv" type="tel" maxlength="3" placeholder="123"/>
            </fieldset>
            <!-- Form submit-->
            <fieldset>
                <button class="form__btn submit" name="submitPayment" id="submitPayment">Submit Payment<i class="fa fa-lock"></i></button>
            </fieldset>
        </form>
    </div>
</div>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>

<script src="../js/jsCC.js"></script>

</body>
</html>


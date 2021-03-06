<?php

include './config/Database.php';
include './models/Order.php';
$database = new Database();
$code = $_GET['code'];

$address='';

if (!empty($code)) {
    $db = $database->connect();
    $stmt = $db->prepare("SELECT COUNT(*) as total FROM `order` WHERE code=:userCode");
    $stmt->bindParam(':userCode', $code, PDO::PARAM_STR);
    $stmt->execute();
    // Check if any categories
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if($row['total'] == '1'){

            
            $stmt = $db->prepare("SELECT `address`.`address` FROM `order` INNER JOIN `address` ON `order`.idAddress = `address`.idAddress WHERE code = :user_Code");
            $stmt->bindParam(':user_Code', $code, PDO::PARAM_STR);
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $address = $row['address'];
            }
        } else {
            header('Location: invalidDeliveryCode.php');
        }
    }
}



?>


<!DOCTYPE html>
<html>

<head lang="it" dir="ltr">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="content-language" content="it">
    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
    <meta name="revisit-after" content="1 Day">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TODO">
    <meta name="keywords" content="TODO">
    <meta name="robots" content="index, follow">
    <meta name="title" content="TODO">
    <meta property="og:type" content="website">
    <meta property="og:url" content="TODO">
    <meta property="og:title" content="TODO">
    <meta property="og:description" content="TODO">
    <meta property="og:image" content="TODO">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="TODO">
    <meta property="twitter:title" content="TODO">
    <meta property="twitter:description" content="TODO">
    <meta property="twitter:image" content="TODO">

    <title>Magazzino - Verify Delivery Address</title>
    <link rel="shortcut icon" href="TODO" />
    <link rel="icon" href="assets/img/logo-salotto.png">
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body id="verifyDeliveryAddress">
    <div class="container">
        <div class="card principalCard col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 col-12 mx-auto pl-0 pr-0">
            <div class="card-body-header">
                <p class="d-inline"><b>Verifica indirizzo di consegna</b></p>
            </div>
            <p class="mb-1 mt-1 title">Il tuo ordine risulta essere <b>ancora in consegna</b>, nonostante siano passati più di 14 giorni. Ti preghiamo di <b>confermare</b> o <b>modificare</b> l’indirizzo di spedizione.</p>
            <p class="mb-1 mt-3 title2"><b>L'attuale indirizzo di consegna è:</b></p>
            <div class="card-body-header d-flex justify-content-center">
                <p class="d-inline mt-2"><b><?php echo $address ?></b></p>
            </div>

            <div class="row">
                <div class="col-12">
                    <p class="mt-3 title">Se è sbagliato inserisci il nuovo indirizzo qua sotto e poi premi <span style="color:var(--first-color);">"<b>Conferma</b>"</span> </p>
                    <p class="mt-3 title">In caso tontrario premi <span style="color:var(--first-color);"> "<b>Torna alla Home<b>"</span> </p> 
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <input id="delivery-address" class="input mt-1 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12" placeholder="Nuovo indirizzo" type="text">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button id="submit-delivery-address" class="button btn-light btn-secondary btn  mt-4 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 col-12 float-right"  onclick="window.location.href='newAddress.php'"
                    ><b>Conferma</b></button>
                    <button class="button btn btn-light btn-secondary  mt-4 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 col-12" onclick="window.location.href='deliveryCode.php'">
                            <span><b>Torna alla home</b></span>
                        </button>
                </div>
            </div>

        </div>
    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.1/socket.io.min.js"></script>
    <script src="https://kit.fontawesome.com/667eeb8441.js" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
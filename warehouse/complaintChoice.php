<?php

include './config/Database.php';
include './models/Order.php';
$database = new Database();
$code = $_GET['code'];

if (empty($code)) {
    header('Location: deliveryCode.php');
} else {
    $db = $database->connect();
    $stmt = $db->prepare("SELECT COUNT(*) as total FROM `order` WHERE code=:userCode");
    $stmt->bindParam(':userCode', $code, PDO::PARAM_STR, 8);
    $stmt->execute();
    $num = $stmt->rowCount();
    // Check if any categories
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($row['total'] == '0') {
            header('Location: invalidDeliveryCode.php');
        }
    }



    if (isset($_POST['eid'])) {
        ob_clean();
        $eid = $_POST['eid'];
        echo $eid;
    }

    //algoritmo pagina
    $type = $_GET['type'];
    //echo isset($type) ;
    if (isset($type) && $type == "missing_product") {
        $stmt = $db->prepare("SELECT orderDate FROM `order` WHERE code=:anotherUserCode");
        $stmt->bindParam(':anotherUserCode', $code, PDO::PARAM_STR, 8);
        $stmt->execute();
        // Check if any categories
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $date = new DateTime();
            $orderDate = new DateTime($row['orderDate']);
            $interval = $date->diff($orderDate);
            $elapsed = $interval->format('%a');
            if ($elapsed < 14) {
                header('Location: earlyRequest.php');
            } else {
                $stmt = $db->prepare("SELECT `status`.name FROM `order` INNER JOIN `status` ON `status`.idStatus = `order`.idStatus WHERE code=:anotherAnotherUserCode");
                $stmt->bindParam(':anotherAnotherUserCode', $code, PDO::PARAM_STR, 8);
                $stmt->execute();
                // Check if any categories
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    if ($row['name'] == 'in preparazione' || $row['name'] == 'spedito') {
                        header('Location: neverDeliveredOrder.php');
                    } else if ($row['name'] == 'consegnato') {
                        header('Location: alreadyDeliveredOrder.php');
                    } else if ($row['name'] == 'in consegna') {
                        header('Location: verifyDeliveryAddress.php?code='.$code);
                    } else if ($row['name'] == 'in restituzione' || $row['name'] == 'restituito') {
                        header('Location: alreadyResentOrder.php');
                    }
                }
            }
        }
    } else if (isset($type) && $type == "wrong_product") {
        $stmt = $db->prepare("SELECT `status`.name FROM `order` INNER JOIN `status` ON `status`.idStatus = `order`.idStatus WHERE code=:anotherUserCode");
        $stmt->bindParam(':anotherUserCode', $code, PDO::PARAM_STR, 8);
        $stmt->execute();
        // Check if any categories
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($row['name'] == 'consegnato') {
                $stmt = $db->prepare("SELECT orderDate FROM `order` WHERE code=:userCode");
                $stmt->bindParam(':userCode', $code, PDO::PARAM_STR, 8);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $date = new DateTime();
                    $orderDate = new DateTime($row['orderDate']);
                    $interval = $date->diff($orderDate);
                    $elapsed = $interval->format('%a');
                    if ($elapsed > 14) {
                        header('Location: lateRequest.php?type=wrong_product');
                    } else {
                        header('Location: wrongOrderChoice.php?code='.$code);
                    }
                }
                
            } else if ($row['name'] == 'in restituzione' || $row['name'] == 'restituito') {
                header('Location: alreadyResentOrder.php');
            } else {
                header('Location: earlyRequest.php');
            }
        }
    } else if (isset($type) && $type == "damaged_product") {
        $stmt = $db->prepare("SELECT `status`.name FROM `order` INNER JOIN `status` ON `status`.idStatus = `order`.idStatus WHERE code=:user_code");
        $stmt->bindParam(':user_code', $code, PDO::PARAM_STR, 8);
        $stmt->execute();
        // Check if any categories
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($row['name'] == 'consegnato') {
                $stmt = $db->prepare("SELECT orderDate FROM `order` WHERE code=:user_code");
                $stmt->bindParam(':user_code', $code, PDO::PARAM_STR, 8);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $date = new DateTime();
                    $orderDate = new DateTime($row['orderDate']);
                    $interval = $date->diff($orderDate);
                    $elapsed = $interval->format('%a');
                    if ($elapsed > 5) {
                        header('Location: lateRequest.php?type=damaged_product');
                    } else {
                        header('Location: damagedOrderChoice.php?code='.$code);
                    }
                }
                
            } else if ($row['name'] == 'in restituzione' || $row['name'] == 'restituito') {
                header('Location: alreadyResentOrder.php');
            } else {
                header('Location: earlyRequest.php');
            }
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

    <title>Magazzino - Complaint Choice</title>
    <link rel="shortcut icon" href="TODO" />
    <link rel="icon" href="assets/img/logo-salotto.png">
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body id="complaintChoice">
    <div class="container">
        <div class="card principalCard col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 col-12 mx-auto pl-0 pr-0">
            <div class="card-body-header">
                <p class="d-inline"><b>Che tipo di reclamo vuoi sottoporre?</b></p>
            </div>
            <div id='missingDeliveryForm' class="card col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 pl-3 pr-0 mt-4 pt-3 pb-2 cardChoice">
                <div class="row mb-1" type="submit">
                    <div class="col-xl-11 col-lg-11 col-md-11 col-sm-10 col-xs-10 col-10">
                        <p class="mb-1">Mancata consegna del prodotto</p>
                    </div>
                    <div>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            <div id='damagedArticleForm' class="card col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 pl-3 pr-0 mt-4 pt-3 pb-2 cardChoice">
                <div class="row mb-1">
                    <div class="col-xl-11 col-lg-11 col-md-11 col-sm-10 col-xs-10 col-10">
                        <p class="mb-1">Articolo danneggiato</p>
                    </div>
                    <div class="mr-2">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            <div id='wrongArticleForm' class="card col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 pl-3 pr-0 mt-4 pt-3 pb-2 cardChoice">
                <div class="row mb-1">
                    <div class="col-xl-11 col-lg-11 col-md-11 col-sm-10 col-xs-10 col-10">
                        <p class="mb-1">Articolo errato</p>
                    </div>
                    <div>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.1/socket.io.min.js"></script>
    <script src="https://kit.fontawesome.com/667eeb8441.js" crossorigin="anonymous"></script>
    <script src="./assets/js/script.js"></script>


</body>

</html>
<?php

    include './config/Database.php';
    include './models/Order.php';
    $database = new Database();
    $code = $_GET['code'];
    $type = $_GET['type'];
    $phrase = '';
    if (isset($type) && $type == "refund") {
        $phrase = 'Hai scelto di ricevere un <b>rimborso</b>, è necessario che tu ci <b>rispedisca</b> l’articolo errato, cosicché possiamo verificare che esso sia realmente sbagliato ed effettuare il rimborso. Provvedi alla spedizione del vecchio articolo <b>entro 14 giorni</b> al seguente indirizzo e destinatario.';
    } else if (isset($type) && $type == "change_version") {
        $phrase = 'Hai scelto il tuo <b>nuovo prodotto</b>, è necessario che tu ci <b>rispedisca</b> quello che ti è arrivato, cosicché possiamo verificare che esso sia realmente sbagliato e spedirti quello nuovo. Provvedi alla spedizione dell’articolo errato <b>entro 14 giorni</b> al seguente indirizzo e destinatario.';
    } else if (isset($type) && $type == "money") {
        $phrase = 'Hai scelto di ricevere un <b>rimborso</b>, è necessario che tu ci <b>rispedisca</b> l’articolo danneggiato, cosicché possiamo verificare che esso sia realmente danneggiato ed effettuare il rimborso. Provvedi alla spedizione dell’articolo danneggiato <b>entro 14 giorni</b> al seguente indirizzo e destinatario.';
    } else if (isset($type) && $type == "product") {
        $phrase = 'Hai scelto il tuo <b>nuovo prodotto</b>, è necessario che tu ci <b>rispedisca</b> quello che ti è arrivato, cosicché possiamo verificare che esso sia realmente danneggiato e spedirti quello nuovo. Provvedi alla spedizione dell’articolo danneggiato <b>entro 14 giorni</b> al seguente indirizzo e destinatario.';
    }
    if (!empty($code)) {
        $db = $database->connect();
        $stmt = $db->prepare("SELECT COUNT(*) as total FROM `order` WHERE code=:userCode");
        $stmt->bindParam(':userCode', $code, PDO::PARAM_STR);
        $stmt->execute();
        // Check if any categories
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if($row['total'] == '1'){
                $type = $_GET['type'];
                $goOn = $_GET['goon'];
                if($goOn == 'true') {

                    $delayReturn = rand(0,1) == 1; //TODO 
                    $valid = rand(0,1) == 1; //TODO
                
                
                    //echo isset($type) ;
                    if (isset($type) && $type == "refund") {
                        $phrase = 'Hai scelto di ricevere un <b>rimborso</b>, è necessario che tu ci <b>rispedisca</b> l’articolo errato, cosicché possiamo verificare che esso sia realmente sbagliato ed effettuare il rimborso. Provvedi alla spedizione del vecchio articolo <b>entro 14 giorni</b> al seguente indirizzo e destinatario.';
                        if($delayReturn){
                            $db = $database->connect();
                            $stmt = $db->prepare("UPDATE `order` SET idStatus = 7 WHERE code = :user_Code");
                            $stmt->bindParam(':user_Code', $code, PDO::PARAM_STR);
                            $stmt->execute();
                            if($valid){
                                header('Location: refund.php');
                            } else {
                                header('Location: invalidComplaint.php');
                            }
                        } else {
                            header('Location: lateReturn.php');
                        }
                    } else if (isset($type) && $type == "change_version") {
                        $phrase = 'Hai scelto il tuo <b>nuovo prodotto</b>, è necessario che tu ci <b>rispedisca</b> quello che ti è arrivato, cosicché possiamo verificare che esso sia realmente sbagliato e spedirti quello nuovo. Provvedi alla spedizione dell’articolo errato <b>entro 14 giorni</b> al seguente indirizzo e destinatario.';
                        if($delayReturn){
                            $db = $database->connect();
                            $stmt = $db->prepare("UPDATE `order` SET idStatus = 7 WHERE code = :user_Code");
                            $stmt->bindParam(':user_Code', $code, PDO::PARAM_STR);
                            $stmt->execute();
                            if($valid){
                                header('Location: verifiedComplaint.php');
                            } else {
                                header('Location: invalidComplaint.php');
                            }
                        } else {
                            header('Location: lateReturn.php');
                        }
                    } else if (isset($type) && $type == "money") {
                        $phrase = 'Hai scelto di ricevere un <b>rimborso</b>, è necessario che tu ci <b>rispedisca</b> l’articolo danneggiato, cosicché possiamo verificare che esso sia realmente danneggiato ed effettuare il rimborso. Provvedi alla spedizione dell’articolo danneggiato <b>entro 14 giorni</b> al seguente indirizzo e destinatario.';
                        if($delayReturn){
                            $db = $database->connect();
                            $stmt = $db->prepare("UPDATE `order` SET idStatus = 7 WHERE code = :user_Code");
                            $stmt->bindParam(':user_Code', $code, PDO::PARAM_STR);
                            $stmt->execute();
                            if($valid){
                                header('Location: refund.php');
                            } else {
                                header('Location: invalidComplaint.php');
                            }
                        } else {
                            header('Location: lateReturn.php');
                        }
                    } else if (isset($type) && $type == "product") {
                        $phrase = 'Hai scelto il tuo <b>nuovo prodotto</b>, è necessario che tu ci <b>rispedisca</b> quello che ti è arrivato, cosicché possiamo verificare che esso sia realmente danneggiato e spedirti quello nuovo. Provvedi alla spedizione dell’articolo danneggiato <b>entro 14 giorni</b> al seguente indirizzo e destinatario.';
                        if($delayReturn){
                            $db = $database->connect();
                            $stmt = $db->prepare("UPDATE `order` SET idStatus = 7 WHERE code = :user_Code");
                            $stmt->bindParam(':user_Code', $code, PDO::PARAM_STR);
                            $stmt->execute();
                            if($valid){
                                header('Location: verifiedComplaint.php');
                            } else {
                                header('Location: invalidComplaint.php');
                            }
                        } else {
                            header('Location: lateReturn.php');
                        }
                    }
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
    <meta property="twitter:description" cosntent="TODO">
    <meta property="twitter:image" content="TODO">

    <title>Magazzino - Confirmed Return</title>
    <link rel="shortcut icon" href="TODO" />
    <link rel="icon" href="assets/img/logo-salotto.png">
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body id="confirmedReturn">

    <div class="container" style="height: 100vh;">
        <div class="row content">
            <div class="col-5">
                <div class="row">
                    <div class="col-12">
                        <h6 class="content-header">Conferma restituzione</h6>
                        <hr class="content-line">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1 class="content-title">Ora tocca a te.</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="content-description">
                            <?php echo $phrase; ?>
                         </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h6 class="content-header"><b>Indirizzo:</b></h6>
                        <h3 class="content-title">Via Gattamelata 65, Mestre (VE)</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h6 class="content-header"><b>Destinatario:</b></h6>
                        <h3 class="content-title">Salotto S.P.A</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button class="button btn btn-light btn-secondary" id="confirmed-return">
                            <span><b>Ricevuto!</b></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-7"><img class="image" src="./assets/img/confirmed-return.svg" alt="" draggable='false'></div>
        </div>
    </div>
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.1/socket.io.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
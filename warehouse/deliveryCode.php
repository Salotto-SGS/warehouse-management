<?php

    include './config/Database.php';
    include './models/Order.php';
    $database = new Database();

    $code = '';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $code = $_POST['code'];
        
        if (!empty($code)) {
            $db = $database->connect();
            $stmt = $db->prepare("SELECT COUNT(*) as total FROM `order` WHERE code=:userCode");
            $stmt->bindParam(':userCode', $code, PDO::PARAM_STR);
            $stmt->execute();
            // Check if any categories
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if($row['total'] == '1'){
                    header('Location: complaintChoice.php?code='.$code.'&type=');
                } else {
                    header('Location: invalidDeliveryCode.php');
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
    <meta property="twitter:description" cosntent="TODO">
    <meta property="twitter:image" content="TODO">

    <title>Magazzino - Delivery Code</title>
    <link rel="shortcut icon" href="TODO" />
    <link rel="icon" href="assets/img/logo-salotto.png">
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body id="deliveryCode">
    <div class="container">
        <div class="card col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 col-12 mx-auto pl-0 pr-0">
        <div class="card-body-header">
            <p class="d-inline">Inserisci il tuo <b>codice spedizione</b></p>
            </div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
            <input id="delivery-code" name="code" required class="input mt-4 ml-4 mr-4 col-11" placeholder="Codice spedizione" type="text">
            <button id="submit-delivery-code" type="submit" class="btn ml-4 mt-4 mb-5 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 col-6"><b>Sottoponi</b></button>
        </form>

            
        </div>
    </div>



    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.1/socket.io.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
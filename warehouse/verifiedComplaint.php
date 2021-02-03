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

    <title>Magazzino - Verified Complaint</title>
    <link rel="shortcut icon" href="TODO" />
    <link rel="icon" href="assets/img/logo-salotto.png">
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body id="verifiedComplaint">

    <div class="container" style="height: 100vh;">
        <div class="row content">
            <div class="col-5">
                <div class="row">
                    <div class="col-12">
                        <h6 class="content-header">Restituzione validata</h6>
                        <hr class="content-line">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1 class="content-title">Ha detto si!</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="content-description">
                            Il tuo ordine è stato <b>validato</b>, provvederemo quanto prima alla <b>spedizione</b> del tuo <b>nuovo ordine</b>.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="content-new-code"><b>Il tuo nuovo codice ordine è:</b></p>
                        <p class="content-title text-center" style="font-size: 50px;"><b>3BH5OU78</b></p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <button class="button btn btn-light btn-secondary" onclick="window.location.href='deliveryCode.php'">
                            <span><b>Torna alla home</b></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-7"><img class="image" src="./assets/img/validated-resent.svg" alt="" draggable='false'></div>
        </div>
    </div>
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.1/socket.io.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
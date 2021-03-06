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

    <title>Magazzino - Wrong Order Choice</title>
    <link rel="shortcut icon" href="TODO" />
    <link rel="icon" href="assets/img/logo-salotto.png">
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body id="wrongOrderChoice">
    <div class="container">
        <div class="card principalCard col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 col-12 mx-auto pl-0 pr-0">
            <div class="card-body-header">
                <p class="d-inline"><b>Reclamo per ordine errato</b></p>
            </div>
            <p class="mb-1 mt-1 title"><b>Cosa intendi fare?</b></p>
            <div id="money" class="card col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 pl-3 pr-0 mt-4 pt-3 pb-2 cardChoice">
                <div class="row mb-1">
                    <div class="col-xl-11 col-lg-11 col-md-11 col-sm-10 col-xs-10 col-10">
                        <p class="mb-1">Cambiare la versione del prodotto</p>
                    </div>
                    <div class="mr-2">
                        <i id="money-check" class="fas fa-check" style="display: none;"></i>
                    </div>
                </div>
            </div>
            <div id="product" class="card col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 pl-3 pr-0 mt-4 pt-3 pb-2 cardChoice">
                <div class="row mb-1">
                    <div class="col-xl-11 col-lg-11 col-md-11 col-sm-10 col-xs-10 col-10">
                        <p class="mb-1">Cambiare completamente prodotto</p>
                    </div>
                    <div>
                        <i id="product-check" class="fas fa-check" style="display: none;"></i>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <button id="submit-wrongOrderChoice" style="display: none;" type="button" class="btn col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 col-6 float-right"><b>Avanti</b></button>
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